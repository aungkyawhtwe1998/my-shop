@extends('layouts.host')
@section('title')
    Blog
@endsection
@section('style')
    <style>
        body {
            background-color: black;
        }

    </style>
@endsection
@section('header')
    @include('layouts.host-header')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <x-host-bread-crumb>
                    <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                </x-host-bread-crumb>
            </div>
        </div>
        <div class="row">
            <div class="col-9">
                <div class="">
                    {{ $posts->appends(Request::all())->links() }}
                </div>
                <div class="row m-2">
                    @foreach ($posts as $post)
                        <div class="col-12 col-md-6 m-0">
                            <div
                                class="blog-card wow slideInLeft ani-delay-1 p-1 justify-content-center align-content-center">
                                <div class="rounded show-thumbnail"
                                    style="background-image:url('{{ asset('storage/post-cover/' . $post->getPhoto->location) }}'); width:100%; height:200px">
                                </div>
                                <div class="">
                                    <span class="badge badge-pill badge-success">
                                        <i class="feather-user"></i>
                                        {{ $post->getUser->name }}
                                    </span>
                                    <span class="badge badge-pill badge-secondary"><i class="fas fa-clock text-light mr-2">
                                        </i>{{ $post->created_at->format('d M Y') }}
                                    </span>
                                </div>
                                <div class="my-2 text-left">
                                    <i class="fas fa-blog text-dark text-primary "></i>
                                    <span class="mytext fw-bold">{{ Str::substr($post->name, 0, 45) }} ... </span>
                                    <p class="text-justify" style="color: black">
                                        <?php
                                        echo Str::substr(html_entity_decode($post->description, ENT_QUOTES), 0, 150);
                                        ?>
                                        <a class="text-warning" href="{{ route('blogs.show', $post->id) }}">...read
                                            more</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
            <div class="col-3">
                <div class="">
                    <label for="category_id" class="font-weight-bold text-warning">Choose
                        Categories</label>
                    <select name="category_id" class="custom-select" onchange="window.location.href=this.value;">
                        @foreach ($categories as $category)
                            <option value="{{ route('blogs.showbyCategory', $category->id) }}"
                                {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                {{ $category->title }}
                        @endforeach
                    </select>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('foot')
    <script>

    </script>
@endsection
