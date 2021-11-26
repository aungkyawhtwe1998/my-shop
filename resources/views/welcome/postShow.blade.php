@extends('layouts.host')

@section('title')
    {{ $post->name }}
@endsection

@section('style')

@endsection

@section('header')
    @include('layouts.host-header')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="container ">
                <div class="row mt-5">
                    {{-- Left Side bar --}}
                   {{-- <div class="col-12 col-lg-3 d-none d-lg-block">
                        <div class="p-1 mt-2 text-center"><h5 class="font-weight-bold">Advertise here</h5></div>
                        <div class="card mb-1">

                            <div class="card-body">
                                <img src="https://www.ctrlclickcast.com/images/your-ad-here.png" width="100%" class="rounded" ;
                                     height="200px;" alt="">
                            </div>
                        </div>
                    </div>--}}
                    {{-- end Left side bar --}}

                    {{-- Middle --}}
                    <div class="col-12 col-lg-8 col-md-8">
                        {{-- breadcrumb --}}
                        <div class="row">
                            <div class="font-weight-bold">
                                <x-host-bread-crumb>
                                    <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">all blog</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ Str::substr($post->name, 0, 30) }} ...</li>
                                </x-host-bread-crumb>
                            </div>
                        </div>
                        {{-- end breadcrumb --}}

                        {{-- main post --}}
                        <div class="bg-white mb-1">
                          <h4 class="text-primary font-weight-bold px-4 pt-4">{{ $post->name }}</h4>
                            <div class="">
                                    <span class="badge badge-pill badge-success">
                                <i class="feather-user"></i>@isset($post->getUser->name ) {{$post->getUser->name }} @endisset
                            </span>
                                <span class="badge badge-pill badge-info">
                                <i class="feather-calendar"></i>
                                {{ $post->created_at->diffForHumans() }}
                            </span>
                                <span class="badge badge-pill badge-secondary">
                                <i class="feather-eye"></i>
                                1.4K
                            </span>
                                <div class="my-2">
                                    @isset($post->thumbnail->location)
                                        <div class="cover-thumbnail"
                                             style="background-image:url('{{ asset('storage/post-cover/' . $post->thumbnail->location) }}');">
                                        </div>
                                    @endisset
                                </div>
                                <p >
                                    {!!html_entity_decode($post->description)!!}
                                </p>
                            </div>
                        </div>

                        {{-- end main post --}}

                        {{-- comments --}}
                        <div class="row p-1 rounded">
                            <div class="col-12">
                                <h4>Comments</h4>
                                @isset($post->getComments)
                                    @foreach ($post->getComments as $comment)
                                        <div class="card border border-secondary shadow-sm mb-1 rounded">
                                            <div class="row d-flex p-2 justify-content-center align-items-center">
                                                <div class="col-2">
                                                    <div class="circle">
                                                        <i class=" fas fa-user fa-2x"></i>
                                                    </div>

                                                </div>
                                                <div class="col-10">
                                                    <span class="text-primary">{{ $comment->user_name }}</span> <span
                                                        class="badge badge-primary">{{ $comment->created_at->diffForHumans() }}
                                            </span>
                                                    <p class="text-secondary">{{ $comment->message }}
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
                        <div class="row mt-1 p-1 rounded">
                            <div class="col-12">
                                <div class="card border border-secondary shadow-sm">
                                    <div class="card-header"> <h4>Write your comment here</h4></div>
                                    <div class="card-body">
                                        <form action="{{ route('comment.store') }}" class="" method="POST">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $post->id }}" id="">
                                            <div class="row d-flex mb-2">
                                                <div class="col-12 col-md-6 col-lg-6 mb-2">
                                                    <input type="text" name="email" class="form-control " placeholder="Enter email">
                                                    @error('email')
                                                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6 mb-2">
                                                    <input type="text" name="name" class="form-control" placeholder="Enter name">
                                                    @error('name')
                                                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                    <textarea name="message" class="form-control" rows="5" id=""
                                              placeholder="Enter comment"></textarea>
                                                    @error('message')
                                                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <button class="btn w-100 btn-primary">Send</button>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- end write comment --}}

                        {{-- end comment box --}}
                    </div>
                    {{-- End Middle --}}

                    {{-- Right Side bar --}}
                    <div class="col-12 col-lg-4 col-md-4 p-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-1 mt-2 text-center">
                                    <h5 class="font-weight-bold">Articles, you may like</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($related_posts as $post)
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="rounded show-thumbnail"
                                                 style="background-image:url('{{ asset('storage/post-cover/' . $post->thumbnail->location) }}'); width:100%; height:100px">
                                            </div>
                                            <div>
                                        <span class="badge badge-pill badge-success">
                                            <i class="feather-user"></i>
                                           @isset($post->getUser->name ) {{$post->getUser->name }} @endisset
                                        </span>
                                                <span class="badge badge-pill badge-info">
                                            <i class="feather-calendar"></i>
                                            {{ $post->created_at->diffForHumans() }}
                                        </span>
                                                <span class="badge badge-pill badge-secondary">
                                            <i class="feather-eye"></i>
                                            1.4K
                                        </span>
                                            </div>
                                            <div class="my-2 text-left">
                                                <i class="fas fa-blog text-dark "></i>
                                                <span class="mytext text-dark fw-bold">{{ Str::substr($post->name, 0, 45) }} ...
                                            <a
                                                href="{{ route('blogs.show', ['category' => $post->categories->title, 'id' => $post->id]) }}">Read
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

        </div>
    </div>
@endsection
@section('footer-layout')
    <div class="container-fluid rounded bg-dark">
        <div class="row">
            <div class="container-xl  mt-5 pt-3" id="contact">
                <div class="row mt-5 pt-3 align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <h2 class="text-success font-weight-bolder">Contact or suggest me</h2>
                            <div class="divider bg-white"></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 p-3 ">
                        <div class="bg-light rounded p-3">
                            <form action="{{ route('message.store') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Enter your name">
                                    @error('name')
                                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Enter your Email">
                                    @error('email')
                                    <small class="font-weight-bold text-danger">{{ $message }}</small>

                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <textarea type="text" name="message" class="form-control" rows="5"
                                              placeholder="message"></textarea>
                                    @error('message')
                                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button class="btn btn-primary fw-bolder">Send
                                    Message</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">
                        <iframe class="rounded"
                                src="
                                        https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3701.237767292931!2d96.12430261432397!3d21.925409011940438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30cb7273d6d0f81d%3A0x27d920dcc9b4b56d!2s52nd%20St%2C%20Mandalay%2C%20Myanmar%20(Burma)!5e0!3m2!1sen!2ssg!4v1621066874005!5m2!1sen!2ssg"
                                width="100%" height="335px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                    </div>
                    <div class="col-12 col-lg-6 my-3">
                        <div class="text-center d-flex flex-column mb-5 text-white">
                            <h3 class="text-success fw-bolder mb-3 fw-bolder">Contact</h3>
                            <span>Aung Kyaw Htwe</span>
                            <span>No3,Between 51 & 52, 113 street, Mandalay</span>
                            <span>Phone: <a href="tel:09798802184">09798802184</a></span>
                            <span>Email: aungkyawhtwe.mdy49@gmail.com</span>
                        </div>

                    </div>
                    <div class="col-12 col-lg-6 my-3 ">
                        <div class="d-flex flex-column text-center fs-5">
                            <h3 class="text-success fw-bolder fw-bolder">My Social Media platform</h3>
                            <div class="p-5 d-flex justify-content-center align-items-center mt-3">
                                <a href="https://www.facebook.com/codeLex.mm">
                                    <i class="mx-3 fab social-icon fa-facebook-f fa-2x "></i>
                                </a>
                                <a href="https://www.youtube.com/channel/UCIwB3osrjw9mjX9Heny2V9Q">
                                    <i class="fab mx-3 social-icon fa-youtube fa-2x"></i>
                                </a>
                                <a href="https://github.com/aungkyawhtwe1998">
                                    <i class="fab mx-3 social-icon fa-github fa-2x"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="col-12 bg-dark rounded mb-2">
                            <div class="py-5 d-flex flex-column text-center fs-5">
                                <span class="text-white"> © Copyright Myanmar. All Right Reserved</span>
                                <span class="text-white"> Designed by<a href="#" class="text-light"> Aung Kyaw Htwe</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('foot')
    <script>

    </script>
@endsection
