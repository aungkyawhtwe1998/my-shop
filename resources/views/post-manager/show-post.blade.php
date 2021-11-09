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
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4><i class="fa fa-info-circle"></i> Post Detail</h4>
                       <div>
                           <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary rounded"><i
                                   class="feather-edit-2"></i>Edit This Post</a>
                           <a class="btn btn-outline-primary rounded" href="{{route('post.index')}}">View All </a>
                       </div>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="card rounded shadow">
                                <div class="card-header">{{ $post->name }}</div>
                                <div class="card-body">
                                    <span class="badge badge-pill badge-success"><i class="feather-user"></i>{{ $post->getUser->name }}</span>
                                    <span class="badge badge-pill badge-info"><i class="feather-calendar"></i>{{ $post->created_at->format('d M Y') }}</span>
                                    <hr>
                                    <div class="d-inline-block">
                                        <div>
                                            <?php
                                            echo html_entity_decode($post->description, ENT_QUOTES);
                                            ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card">
                                <div class="card-header">Thumbnail</div>
                                <div class="card-body">
                                    <div class="mb-2">
                                        @isset($post->getPhoto)
                                            <div class="cover-thumbnail rounded"
                                                 style="background-image:url('{{ asset('storage/post-cover/' . $post->getPhoto->location) }}');">
                                            </div>
                                        @endisset
                                    </div>
                                </div>
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
