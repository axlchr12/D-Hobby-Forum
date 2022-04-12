@extends('forum.layouts.main')
@section('layout')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center">Check Input</h1>
                <form method="POST" action="/process">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="input1" class="form-control"  autofocus autocomplete="off" value="ABBCD">
                        <label for="input1">Input 1</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control"
                            name="input2" value="Gallant Duck">
                        <label for="text">Input 2</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Check</button>
                </form>
            </main>
        </div>
    </div>
@endsection
