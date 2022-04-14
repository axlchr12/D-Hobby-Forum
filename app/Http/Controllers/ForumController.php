<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Posts;
use App\Models\Type;
use App\Http\Controllers\CloudinaryStorage;

class ForumController extends Controller
{
    public function index(Request $request) {
        if (request('sort') === 'oldest') {
            $posts = Posts::with('comments')->oldest('updated_at')->filter(request(['q', 'c']))->paginate(5)->withQueryString();
            $title = 'oldest';
        } else {
            $posts = Posts::with('comments')->latest('updated_at')->filter(request(['q', 'c']))->paginate(5)->withQueryString();
            $title = 'latest';
        } 

        if (request('c')) {
            $type = Type::firstWhere('type_description', request('c'));
            $title = $type->type_name;
        }

        if (request('q')) {
            $titlePost = Posts::firstWhere('title_discussion', request('q'));
            if($titlePost) {
                $title = $titlePost->title_discussion;
            } else {
                return redirect()->to('/')->with('error', 'Data not found!');
            }
        }
        
        $data = [
            'title' => 'All posts in ' . $title,
            'posts' => $posts,
        ];
        
        return view('forum.index', $data);
    }

    public function detail($id) {
        $detailPosts = Posts::firstWhere('id_post', $id);
        $comments = Posts::find($id)->comments()->paginate(3)->withQueryString();
        $data = [
            'title' => $detailPosts->title_discussion,
            'posts' => $detailPosts,
            'comments' => $comments,
        ];
        
        return view('forum.detail', $data);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'title_discussion' => 'required|max:70|unique:posts,title_discussion',
            'detail_discussion' => 'required|max:1000',
            'image_discussion' => 'image|file|max:5120',
            'type_discussion' => 'required',
        ]);
        // Upload Image
        if ($request->file('image_discussion')) {
            $response = $request->file('image_discussion')->storeOnCloudinary("forum/img-posted");
            $validatedData['image_discussion'] = $response->getSecurePath();
        }

        if (auth()->user()) {
            $validatedData['id_user'] = 1;
        } else {
            $validatedData['id_user'] = 2;
        }

        Posts::create($validatedData);
        return redirect()->back()->with('success', 'Discussion has been created!');

    }

    public function storeComments(Request $request) {
        $validatedData = $request->validate([
            'reply_text' => 'required|max:1000',
            'reply_image' => 'image|file',
        ]);
        $validatedData['id_post'] = $request->input('id_post');
        if ($request->file('reply_image')) {
            $response = $request->file('reply_image')->storeOnCloudinary("forum/user-img-reply");
            $validatedData['reply_image'] = $response->getSecurePath();
        }

        if (auth()->user()) {
            $validatedData['id_user'] = 1;
        } else {
            $validatedData['id_user'] = 2;
        }

        Comments::create($validatedData);
        return redirect()->back()->with('success', 'Reply Success!');
    }

    public function delete(Request $request) {
        if ($request->input('type') === 'posts') {
            $id_post = $request->input('id_post');
            $posts = Posts::find($id_post);
            $comments = Comments::where('id_post', $id_post)->get();
            // Fix jika hapus 1 postingan, maka hapus semua gambar yang ada
            // jika post ada gambar & komen ada gambar 1 -> positif, kehapus
            // jika post ada gambar & komen ada gambar lebih dari 1 -> positif, kehapus
            // jika post ada gambar & komen ada gambar & no gambar -> positif, kehapus
            // jika post no gambar & komen no gambar -> positif, kehapus
            // jika post no gambar & komen banyak no gambar -> positif, kehapus
            // jika post no gambar & komen ada gambar 1 -> positif, kehapus
            // jika post no gambar & komen ada gambar lebih dari 1 -> positif, kehapus
            // jika post no gambar & komen ada gambar & no gambar -> positif, kehapus

            foreach ($comments as $data) {
                if ($data->count() >= 1) {
                    if ($posts->image_discussion && $data->reply_image) {
                        $data->delete();
                    } else if ($data->reply_image) {
                        Storage::delete($data->reply_image);
                        $data->delete();
                    } else {
                        $data->delete();
                    }
                } else {
                    if ($posts->image_discussion && $data[0]->reply_image) {
                        $data[0]->delete();
                    } else if ($data[0]->reply_image) {
                        $data[0]->delete();
                    } else {
                        $data[0]->delete();
                    }
                }
            }
           
            $posts->delete();
            

            return redirect()->to('/')->with('success', 'Success Delete Discussion!');
        }

        if ($request->input('type') === 'comments') {
            $id_comments = $request->input('id_comments');
            $comments = Comments::find($id_comments);
            $comments->delete();
            return redirect()->back()->with('success', 'Success Delete Reply!');
        }
    }
}
