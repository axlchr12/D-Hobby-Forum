<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Posts;
use App\Models\Type;

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
            'image' => 'image|file',
            'type_discussion' => 'required',
        ]);
        // Upload Image
        if ($request->file('image')) {
            $validatedData['image_discussion'] = $request->file('image')->store('post-images');
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
        if ($request->file('image')) {
            $validatedData['reply_image'] = $request->file('image')->store('post-images');
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
            Posts::find($id_post)->delete();
            Comments::where('id_post', $id_post)->delete();
            return redirect()->to('/')->with('success', 'Success Delete Discussion!');
        }

        if ($request->input('type') === 'comments') {
            $id_comments = $request->input('id_comments');
            Comments::find($id_comments)->delete();
            return redirect()->back()->with('success', 'Success Delete Reply!');
        }
    }
}
