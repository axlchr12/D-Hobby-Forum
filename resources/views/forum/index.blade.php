@extends('forum.layouts.main')
@section('layout')
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-1">
            <h1 class="display-5 fw-bold text-center">{{ $title }}</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mt-5 mr-5 sidebar">
                {{-- <a href="/register"><button type="button" class="btn btn-dark col-lg-7">Login</button></a> --}}
                <button type="button" class="btn btn-secondary col-lg-7" data-bs-toggle="modal"
                    data-bs-target="#startDiscussion">Start a
                    Discussion</button>
                <hr>
                <div class="categories mt-3">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-items">
                            <a class="badge badge-secondary text-secondary text-decoration-none rounded-pill {{ Request::getRequestUri() == '/' ? 'activePage' : '' }}"
                                href="/">All
                                Discussion</a>
                        </li>
                        <div class="category mt-4">
                            <li class="nav-items mb-2">
                                <span class="badge text-secondary">By Category:</span>
                            </li>
                            <li class="nav-items mb-2">
                                <a class="badge text-secondary text-decoration-none rounded-pill {{ request('c') === 'SHFiguarts' ? 'activePage' : '' }}"
                                    href="/?c=SHFiguarts">SHFiguarts</a>
                            </li>
                            <li class="nav-items mb-2">
                                <a class="badge text-secondary text-decoration-none rounded-pill {{ request('c') === 'SCM' ? 'activePage' : '' }}"
                                    href="/?c=SCM">Saint Seiya
                                    Cloth Myth</a>
                            </li>
                            <li class="nav-items mb-2">
                                <a class="badge text-secondary text-decoration-none rounded-pill {{ request('c') === 'Gunpla' ? 'activePage' : '' }}"
                                    href="/?c=Gunpla">Gunpla/Gundam</a>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 mt-5 mr-5">
                <div class="col-lg-2">
                    <form action="" method="GET">
                        Filter discussion by:
                        <select class="form-select" id="sort" name="sort" onchange="form.submit()">
                            <option value="latest" {{ request('sort') === 'latest' ? 'selected' : '' }}>
                                Latest</option>
                            <option value="oldest" {{ request('sort') === 'oldest' ? 'selected' : '' }}>
                                Oldest</option>
                        </select>
                    </form>
                </div>
                {{-- SHFiguarts pake bg-success, Saint Seiya Cloth Myth pake bg-primary, Gundam/Gunpla pake bg-danger --}}
                @foreach ($posts as $data)
                    <div class="forum-items mt-4 p-2 d-flex">
                        <img src="img/user.png" alt="testing" class="img-user p-3" data-bs-toggle="tooltip"
                            data-bs-placement="right"
                            title="{{ $data->id_user === 1 ? 'Admin' : 'Anon' }} started {{ $data->created_at->diffForHumans(['parts' => 2]) }}">
                        <div class="title-forum mx-2">
                            <a href="/d/{{ $data->id_post }}" class="text-decoration-none text-black">
                                @if ($data->type->type_name == 'SHFiguarts')
                                    <span class="badge bg-success mb-1 rounded-pill">{{ $data->type->type_name }}</span>
                                @elseif ($data->type->type_name == 'Saint Seiya Cloth Myth')
                                    <span class="badge bg-primary mb-1 rounded-pill">{{ $data->type->type_name }}</span>
                                @else
                                    <span class="badge bg-danger mb-1 rounded-pill">{{ $data->type->type_name }}</span>
                                @endif
                                <h5>{{ $data->title_discussion }}
                                </h5>
                                <div class="replied-forum">
                                    <p class="latest-replied">
                                        <ion-icon name="arrow-undo"></ion-icon>
                                        @if ($data->comments()->latest()->first() &&
    $data->comments()->latest()->first()->id_user === 1)
                                            <strong>Admin</strong> replied
                                            {{ $data->comments()->latest()->first()->created_at->diffForHumans() }}
                                        @elseif ($data->comments()->latest()->first() &&
    $data->comments()->latest()->first()->id_user === 2)
                                            <strong>Anon</strong> replied
                                            {{ $data->comments()->latest()->first()->created_at->diffForHumans() }}
                                        @else
                                            <strong>No reply yet bro.</strong>
                                        @endif
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="totalc-forum ms-auto">
                            <a href="/d/{{ $data->id_post }}" class="text-decoration-none text-black">
                                <ion-icon name="chatbubble-outline" class="mx-1"></ion-icon>
                                {{ $data->comments->count() }}
                            </a>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-end mt-5">
                    {{ $posts->links() }}
                </div>
                {{-- <div class="forum-items mt-4 p-2 d-flex">
                    <img src="img/user.png" alt="testing" class="img-user p-3" data-bs-toggle="tooltip"
                        data-bs-placement="right" title="Anon started 8 hours ago">
                    <div class="title-forum mx-2">
                        <a href="/d/1" class="text-decoration-none text-black">
                            <span class="badge bg-success mb-1 rounded-pill">SHFiguarts</span>
                            <h5>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit, velit!
                            </h5>
                            <div class="replied-forum">
                                <p class="latest-replied">
                                    <ion-icon name="arrow-undo"></ion-icon>
                                    <strong>Anon</strong> replied 2 hours ago
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="totalc-forum ms-auto">
                        <a href="/d/" class="text-decoration-none text-black">
                            <ion-icon name="chatbubble-outline" class="mx-1"></ion-icon>12
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    {{-- Modal Start A Discussion --}}
    <div class="modal fade" id="startDiscussion" tabindex="-1" aria-labelledby="startDiscussionLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="startDiscussionLabel">Start a Discussion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/startDiscussion" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Title Discussion</label>
                            <input type="text" class="form-control @error('title_discussion') is-invalid @enderror"
                                name="title_discussion" autocomplete="off" required autofocus>
                            @error('title_discussion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Detail Discussion</label>
                            <textarea class="form-control @error('detail_discussion') is-invalid @enderror" rows="3" name="detail_discussion"
                                autocomplete="off" required></textarea>
                            @error('detail_discussion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Type Discussion</label>
                            <select class="form-select @error('type_discussion') is-invalid @enderror"
                                name="type_discussion">
                                <option value="1">SHFiguarts</option>
                                <option value="2">Saint Seiya Cloth Myth</option>
                                <option value="3">Gunpla/Gundam</option>
                            </select>
                            @error('type_discussion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image Discussion</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                name="img_discussion">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
