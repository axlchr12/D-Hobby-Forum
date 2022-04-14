@extends('forum.layouts.main')
@section('layout')
    <div class="p-5 mb-4 bg-light rounded-3">
        <a href="/">
            <ion-icon name="arrow-back-outline" size="large"></ion-icon>
        </a>
        <div class="container-fluid py-1">
            <h1 class="fw-bold text-center display-6">{{ $title }}</h1>
            <p class="text-center">in a category of <a class="text-decoration-none"
                    href="/?c={{ $posts->type->type_description }}">{{ $posts->type->type_name }}</a></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            {{-- Detail Post --}}
            <div class="col-lg-10">
                <div class="forum-post mt-4 d-flex">
                    <img src="/img/user.png" alt="testing" class="img-user p-3">
                    <div class="detail-post mx-2">
                        @if ($posts->id_user === 2)
                            <span><strong>Anon</strong> {{ $posts->created_at->diffForHumans() }}</span>
                        @else
                            <span><strong>Admin</strong>
                                {{ $posts->created_at->diffForHumans() }}</span>
                        @endif
                        <p class="mt-3">
                            @if ($posts->image_discussion)
                                <a href="{{ $posts->image_discussion }}" data-toggle="lightbox">
                                    <img src="{{ $posts->image_discussion }}" alt="img-posted-user"
                                        class="img-posted">
                                </a>
                                <br>
                            @endif
                            {{ $posts->detail_discussion }}
                        </p>
                        @auth
                            <form action="/delete" method="POST" class="d-inline">
                                <input type="hidden" name="type" value="posts">
                                <input type="hidden" name="id_post" value="{{ $posts->id_post }}">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="confirm('Are you sure?')">Delete</button>
                            </form>
                        @endauth
                    </div>
                </div>
                {{-- Comments Starts Here --}}
                @foreach ($comments as $data)
                    <hr>
                    <div class="forum-post mt-4 d-flex">
                        <img src="/img/user.png" alt="testing" class="img-user p-3">
                        <div class="detail-post mx-2">
                            @if ($data->id_user === 2)
                                <span><strong>Anon</strong> {{ $data->created_at->diffForHumans() }}</span>
                            @else
                                <span><strong>Admin</strong> {{ $data->created_at->diffForHumans() }}</span>
                            @endif
                            <p class="mt-3">
                                @if ($data->reply_image)
                                    <a href="{{ $data->reply_image }}" data-toggle="lightbox">
                                        <img src="{{ $data->reply_image }}" alt="img-posted-user"
                                            class="img-posted">
                                    </a>
                                    <br>
                                @endif
                                {{ $data->reply_text }}
                            </p>
                            @auth
                                <form action="/delete" method="POST" class="d-inline">
                                    <input type="hidden" name="type" value="comments">
                                    <input type="hidden" name="id_comments" value="{{ $data->id_comments }}">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="confirm('Are you sure?')">Delete</button>
                                </form>
                            @endauth
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-end mt-5">
                    {{ $comments->links() }}
                </div>
                {{-- <hr>
                <div class="forum-post mt-4 d-flex">
                    <img src="/img/user.png" alt="testing" class="img-user p-3">
                    <div class="detail-post mx-2">
                        <span><strong>Anon</strong> 11 hours ago</span>
                        <p class="mt-3">
                            <a href="/img/img-posted-user/2.jpg" data-toggle="lightbox">
                                <img src="/img/img-posted-user/2.jpg" alt="img-posted-user" class="img-posted">
                            </a>
                            <br>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta atque
                            sint quidem, repudiandae non odio tempore sunt laboriosam! Nulla molestias labore culpa placeat
                            impedit consectetur libero voluptates! Voluptas natus expedita iste esse labore. Fuga debitis
                            neque praesentium sunt cupiditate dolore, aperiam aliquid aliquam omnis corporis qui cumque
                            provident molestiae dolor corrupti quisquam odit, adipisci sint non quaerat ipsa ad! Maxime rem
                            quibusdam at consequuntur voluptatum optio aperiam distinctio quisquam, deserunt mollitia
                            necessitatibus adipisci iure ut delectus perferendis saepe labore officiis odio dolorum! Ut vel
                            nemo temporibus maxime commodi enim quia nostrum expedita exercitationem, omnis autem
                            consectetur neque architecto. Repellat, nesciunt?
                        </p>
                    </div>
                </div>
                <hr>
                <div class="forum-post mt-4 d-flex">
                    <img src="/img/user.png" alt="testing" class="img-user p-3">
                    <div class="detail-post mx-2">
                        <span><strong>Anon</strong> 11 hours ago</span>
                        <p class="mt-3">
                            <a href="/img/img-posted-user/4.jpg" data-toggle="lightbox">
                                <img src="/img/img-posted-user/4.jpg" alt="img-posted-user" class="img-posted">
                            </a>
                            <br>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta atque
                            sint quidem, repudiandae non odio tempore sunt laboriosam! Nulla molestias labore culpa placeat
                            impedit consectetur libero voluptates! Voluptas natus expedita iste esse labore. Fuga debitis
                            neque praesentium sunt cupiditate dolore, aperiam aliquid aliquam omnis corporis qui cumque
                            provident molestiae dolor corrupti quisquam odit, adipisci sint non quaerat ipsa ad! Maxime rem
                            quibusdam at consequuntur voluptatum optio aperiam distinctio quisquam, deserunt mollitia
                            necessitatibus adipisci iure ut delectus perferendis saepe labore officiis odio dolorum! Ut vel
                            nemo temporibus maxime commodi enim quia nostrum expedita exercitationem, omnis autem
                            consectetur neque architecto. Repellat, nesciunt?
                        </p>
                    </div>
                </div>
                <hr>
                <div class="forum-post mt-4 d-flex">
                    <img src="/img/user.png" alt="testing" class="img-user p-3">
                    <div class="detail-post mx-2">
                        <span><strong>Anon</strong> 11 hours ago</span>
                        <p class="mt-3">
                            <a href="/img/img-posted-user/5.jpg" data-toggle="lightbox">
                                <img src="/img/img-posted-user/5.jpg" alt="img-posted-user" class="img-posted">
                            </a>
                            <br>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta atque
                            sint quidem, repudiandae non odio tempore sunt laboriosam! Nulla molestias labore culpa placeat
                            impedit consectetur libero voluptates! Voluptas natus expedita iste esse labore. Fuga debitis
                            neque praesentium sunt cupiditate dolore, aperiam aliquid aliquam omnis corporis qui cumque
                            provident molestiae dolor corrupti quisquam odit, adipisci sint non quaerat ipsa ad! Maxime rem
                            quibusdam at consequuntur voluptatum optio aperiam distinctio quisquam, deserunt mollitia
                            necessitatibus adipisci iure ut delectus perferendis saepe labore officiis odio dolorum! Ut vel
                            nemo temporibus maxime commodi enim quia nostrum expedita exercitationem, omnis autem
                            consectetur neque architecto. Repellat, nesciunt?
                        </p>
                    </div>
                </div>
                <hr>
                <div class="forum-post mt-4 d-flex">
                    <img src="/img/user.png" alt="testing" class="img-user p-3">
                    <div class="detail-post mx-2">
                        <span><strong>Anon</strong> 11 hours ago</span>
                        <p class="mt-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta atque
                            sint quidem, repudiandae non odio tempore sunt laboriosam! Nulla molestias labore culpa placeat
                            impedit consectetur libero voluptates! Voluptas natus expedita iste esse labore. Fuga debitis
                            neque praesentium sunt cupiditate dolore, aperiam aliquid aliquam omnis corporis qui cumque
                            provident molestiae dolor corrupti quisquam odit, adipisci sint non quaerat ipsa ad! Maxime rem
                            quibusdam at consequuntur voluptatum optio aperiam distinctio quisquam, deserunt mollitia
                            necessitatibus adipisci iure ut delectus perferendis saepe labore officiis odio dolorum! Ut vel
                            nemo temporibus maxime commodi enim quia nostrum expedita exercitationem, omnis autem
                            consectetur neque architecto. Repellat, nesciunt?
                        </p>
                    </div>
                </div> --}}
                {{-- <button type="button" class="btn btn-secondary col-lg-1" data-bs-toggle="modal"
                    data-bs-target="#replyDiscussion">Reply</button>
                <br>
                Tampilkan 5 post, lalu lakukan pagination --}}
            </div>
            <div class="col-lg-2">
                {{-- <a class="btn btn-secondary col-lg-7 mx-5" href="#" role="button" data-bs-toggle="modal"
                    data-bs-target="#startDiscussion">Reply</a> --}}
                <button type="button" class="btn btn-secondary col-lg-7 mx-5" data-bs-toggle="modal"
                    data-bs-target="#replyDiscussion">Reply</button>
                <!-- Example split danger button -->
                {{-- Admin --}}
                {{-- <div class="btn-group">
                    <button type="button" class="btn btn-secondary">Reply</button>
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Edit Post</a></li>
                        <li><a class="dropdown-item" href="#">Delete Post</a></li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
    {{-- Modal Reply Forum --}}
    <div class="modal fade" id="replyDiscussion" tabindex="-1" aria-labelledby="replyDiscussionLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyDiscussionLabel">Reply Discussion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/replyDiscussion" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_post" value="{{ $posts->id_post }}">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Comments</label>
                            <textarea class="form-control @error('reply_text') is-invalid @enderror" rows="3" name="reply_text" autocomplete="off"
                                required></textarea>
                            @error('reply_text')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control @error('reply_image') is-invalid @enderror"
                                name="reply_image">
                            @error('reply_image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Reply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
