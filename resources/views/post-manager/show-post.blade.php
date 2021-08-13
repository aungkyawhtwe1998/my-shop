@extends('layouts.app')
@section('title')
    Post Detail
@endsection
@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Posts</a></li>
        <li class="breadcrumb-item active" aria-current="page">Post Detail</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card rounded shadow">
                <div class="card-header">Post Detail</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-primary font-weight-bold">{{ $post->name }}</h4>
                        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-outline-success rounded"><i
                                class="feather-edit-2"></i></a>
                    </div>
                    <hr>

                    <span class="badge badge-pill badge-success">
                        <i class="feather-user"></i>
                        {{ $post->getUser->name }}
                    </span>
                    <span class="badge badge-pill badge-info">
                        <i class="feather-calendar"></i>
                        {{ $post->created_at->format('d M Y') }}
                    </span>
                    <hr>
                    <div class="d-inline-block">
                        <div class="mb-2">
                            @isset($post->getPhoto)
                                <div class="cover-thumbnail"
                                    style="background-image:url('{{ asset('storage/post-cover/' . $post->getPhoto->location) }}');">
                                </div>
                            @endisset
                        </div>
                        <div>
                            <?php
                            echo html_entity_decode($post->description, ENT_QUOTES);
                            ?>
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