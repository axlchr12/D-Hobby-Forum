@extends('forum.layouts.main')
@section('layout')
    <div class="p-5 mb-4 bg-light rounded-3">
        <a href="/">
            <ion-icon name="arrow-back-outline" size="large"></ion-icon>
        </a>
        <div class="container-fluid py-1">
            <h1 class="fw-bold text-center display-6">{{ $title }}</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <div class="forum-post mt-4 d-flex">
                    <img src="/img/user.png" alt="testing" class="img-user p-3">
                    <div class="detail-post mx-2">
                        <span><strong>Anon</strong> 11 hours ago</span>
                        <p class="mt-3">
                            <a href="/img/img-posted-user/3.jpg" data-toggle="lightbox">
                                <img src="/img/img-posted-user/3.jpg" alt="img-posted-user" class="img-posted">
                            </a>
                            <br>
                            {{-- Add Lightbox --}}
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam qui tempore
                            dolore quae, tenetur culpa recusandae voluptate sed facere accusantium deleniti molestiae sequi
                            rem, porro nesciunt sapiente exercitationem! Expedita accusamus vero rem perspiciatis.
                            Voluptates voluptatum similique ex laborum neque, provident perspiciatis non quos iste quia
                            iusto veritatis porro totam, impedit adipisci? Fugiat eum labore et. Quae tenetur perferendis,
                            accusantium fuga est voluptate commodi ex sint asperiores maiores quos quo explicabo voluptatum
                            in, minus facere vero? Perferendis repudiandae neque officiis dicta suscipit maxime id nisi,
                            magni velit accusantium dolorem praesentium illo corporis dolorum! Quasi, dolores reiciendis
                            facere a ipsa quibusdam dolor!
                        </p>
                        <button type="button" class="btn btn-danger btn-sm">Delete</button>
                    </div>
                </div>
                <hr>
                <div class="forum-post mt-4 d-flex">
                    <img src="/img/user.png" alt="testing" class="img-user p-3">
                    <div class="detail-post mx-2">
                        <span><strong>Anon</strong> 11 hours ago</span>
                        <p class="mt-3">
                            <a href="/img/img-posted-user/1.jpg" data-toggle="lightbox">
                                <img src="/img/img-posted-user/1.jpg" alt="img-posted-user" class="img-posted">
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
                        <button type="button" class="btn btn-danger btn-sm">Delete</button>
                    </div>
                </div>
                <hr>
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
                            <img src="/img/img-posted-user/4.jpg" alt="img-posted-user" class="img-posted">
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
                            <img src="/img/img-posted-user/5.jpg" alt="img-posted-user" class="img-posted">
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
                </div>
                Tampilkan 5 post, lalu lakukan pagination
            </div>
            <div class="col-lg-2">
                <a class="btn btn-secondary col-lg-7 mx-5" href="#" role="button">Reply</a>
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
@endsection
