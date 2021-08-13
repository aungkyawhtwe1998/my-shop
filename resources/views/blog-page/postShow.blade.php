@extends('layouts.host')

@section('title')
    Post
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
                    <li class="breadcrumb-item"><a href="{{ route('blogs') }}">all blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                </x-host-bread-crumb>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card bg-dark rounded shadow">
                    <div class="card-header text-light">Item Detail</div>
                    <div class="card-body">
                        <h4 class="text-warning font-weight-bold">{{ $post->name }}</h4>

                        <span class="badge badge-pill badge-success">
                            <i class="feather-user"></i>
                            {{ $post->getUser->name }}
                        </span>
                        <span class="badge badge-pill badge-info">
                            <i class="feather-calendar"></i>
                            {{ $post->created_at->format('d M Y') }}
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
        </div>
    </div>
@endsection
@section('foot')
    <script>

    </script>
@endsection
