@extends('layouts.host')

@section('title')
    {{ $post->name }}
@endsection

@section('style')
    <style>
        body {
            background-color: black;
        }

    </style>
@endsection

@section('header')
    <div class="row header mt-0">
        @include('layouts.host-header')
    </div>
@endsection

@section('content')
    <div class="container-fluid">


        <div class="row my-3">
            {{-- Left Side bar --}}
            <div class="col-lg-3 d-none d-lg-block">
                <div class="card blog-card mb-1">
                    <div class="card-header">Advertise here</div>
                    <div class="card-body">
                        <img src="https://www.ctrlclickcast.com/images/your-ad-here.png" style="width: 100%" ;
                            height="200px;" alt="">
                    </div>
                </div>
            </div>
            {{-- end Left side bar --}}

            {{-- Middle --}}
            <div class="col-12 col-lg-6 col-md-8 ">
                {{-- breadcrumb --}}
                <div class="row">
                    <div class="col-12 blog-card rounded mb-1">
                        <x-host-bread-crumb>
                            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">all blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ Str::substr($post->name, 0, 30) }} ...</li>
                        </x-host-bread-crumb>
                    </div>
                </div>
                {{-- end breadcrumb --}}

                {{-- main post --}}
                <div class="row">
                    <div class="card blog-card rounded shadow mb-1">
                        <div class="card-header text-light">Item Detail</div>
                        <div class="card-body">
                            <h4 class="text-warning font-weight-bold">{{ $post->name }}</h4>

                            <span class="badge badge-pill badge-success">
                                <i class="feather-user"></i>
                                {{ $post->getUser->name }}
                            </span>
                            <span class="badge badge-pill badge-info">
                                <i class="feather-calendar"></i>
                                {{ $post->created_at->diffForHumans() }}
                            </span>
                            <span class="badge badge-pill badge-secondary">
                                <i class="feather-eye"></i>
                                1.4K
                            </span>
                            <hr>
                            <div class="mb-2">
                                @isset($post->getPhoto)
                                    <div class="cover-thumbnail"
                                        style="background-image:url('{{ asset('storage/post-cover/' . $post->getPhoto->location) }}');">
                                    </div>
                                @endisset
                            </div>
                            <div class="text-light">
                                <?php
                                echo html_entity_decode($post->description, ENT_QUOTES);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- end main post --}}

                {{-- comments --}}
                <div class="row p-1 bg-secondary rounded">
                    <div class="col-12">
                        <h4 class="text-light">Comments</h4>
                        @isset($post->getComments)
                            @foreach ($post->getComments as $comment)
                                <div class="card bg-dark mb-1 rounded">
                                    <div class="row d-flex p-2 justify-content-center align-items-center">
                                        <div class="col-2">
                                            <img src="{{ asset('dashboard/img/user/avatar9.jpg') }}"
                                                style="width:50px; height: 50px; border-radius: 50%" alt="">
                                        </div>
                                        <div class="col-10">
                                            <span class="text-primary">{{ $comment->user_name }}</span> <span
                                                class="badge badge-primary">{{ $comment->created_at->diffForHumans() }}
                                            </span>
                                            <p class="text-light">{{ $comment->message }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>

                {{-- comment box --}}

                {{-- write comment --}}

                <div class="row mt-1 p-1 bg-secondary rounded">
                    <div class="col-12">
                        <h4 class="text-light">Write your comment here</h4>
                        <form action="{{ route('comment.store') }}" class="" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}" id="">
                            <div class="row d-flex mb-2">
                                <div class="col-12 col-md-6 col-lg-6 mb-1">
                                    <input type="text" name="email" class="form-control my-input" placeholder="Enter email">
                                    @error('email')
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 mb-1">
                                    <input type="text" name="name" class="form-control my-input" placeholder="Enter name">
                                    @error('name')
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="my-input" rows="5" id=""
                                        placeholder="Enter comment"></textarea>
                                    @error('message')
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <button class="btn btn-outline-info">Send</button>
                        </form>
                    </div>
                </div>

                {{-- end write comment --}}

                {{-- end comment box --}}
            </div>
            {{-- End Middle --}}

            {{-- Right Side bar --}}
            <div class="col-lg-3 col-md-4 p-1">
                <div class="row">
                    <div class="col-12">
                        <div class="card blog-card p-2">
                            <div class="text-light">Articles, you may like</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-12">
                            <div class="card blog-card">
                                <div class="card-body">
                                    <div class="rounded show-thumbnail"
                                        style="background-image:url('{{ asset('storage/post-cover/' . $post->getPhoto->location) }}'); width:100%; height:200px">
                                    </div>
                                    <div>
                                        <span class="badge badge-pill badge-success">
                                            <i class="feather-user"></i>
                                            {{ $post->getUser->name }}
                                        </span>
                                        <span class="badge badge-pill badge-info">
                                            <i class="feather-calendar"></i>
                                            {{ $post->created_at->diffForHumans() }}
                                        </span>
                                        <span class="badge badge-pill badge-secondary">
                                            <i class="feather-eye"></i>
                                            1.4K
                                        </span>
                                        <hr>
                                    </div>
                                    <div class="my-2 text-left">
                                        <i class="fas fa-blog text-dark text-primary "></i>
                                        <span class="mytext fw-bold">{{ Str::substr($post->name, 0, 45) }} ...
                                            <a
                                                href="{{ route('blogs.show', ['category' => $post->getCategoryName->title, 'id' => $post->id]) }}">Read
                                                more
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            {{-- End right side bar --}}
        </div>
    </div>
    <hr>
    <br>
@endsection
@section('footer')
    <div class="container-fluid footer">
        <div class="row">
            <footer class="col-12">
                <div class="container">
                    <div class="row my-3 align-items-center justify-content-center ">
                        <div class="col-12 col-lg-6 ">
                            <div class="text-center d-flex flex-column text-warning mb-5">
                                <h3 class="fs-3 fw-bolder mb-3 fw-bolder">Contact</h3>
                                <span>Aung Kyaw Htwe</span>
                                <span>No3,Between 51 & 52, 113 street, Mandalay</span>
                                <span>Phone: <a href="tel:09798802184" class="text">09798802184</a></span>
                                <span>Email: aungkyawhtwe.mdy49@gmail.com</span>
                            </div>

                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="d-flex flex-column text-center fs-5 text-warning">
                                <h3 class="fs-3 fw-bolder fw-bolder">My Social Media platform</h3>
                                <div class="social-icon p-5 d-flex justify-content-center mt-3">
                                    <a href="https://www.facebook.com/alex.akh1998/">
                                        <i class="mx-3 fab fa-facebook-f  fa-2x "></i>
                                    </a>
                                    <a href="https://www.linkedin.com/in/aung-kyaw-htwe-851a48187/">
                                        <i class="fab mx-3 fa-linkedin fa-2x"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fab mx-3 fa-instagram fa-2x"></i>
                                    </a>
                                    <a href="https://twitter.com/AlexAlexAKH">
                                        <i class="fab mx-3 fa-twitter fa-2x"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="pb-5 fw-boler d-flex flex-column text-center fs-5">
                                <span class="text-white"> © Copyright Myanmar. All Right Reserved</span>
                                <span class="text-white"> Designed by<a href="#" class="text-light"> Aung Kyaw
                                        Htwe</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

@endsection
@section('foot')
    <script>

    </script>
@endsection
