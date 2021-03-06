@extends('layouts.app')
@section('title')
    Edit Post
@endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Posts</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12">
            <div class="card shadow rounded">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class=""><i class="fa fa-edit"></i>Edit Post</h4>
                        <a class="btn btn-outline-primary btn-lg" href="{{route('post.index')}}">View Posts </a>
                    </div>
                </div>
                <form action="{{ route('post.update', $post->id) }}" id="post-form" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('put')
                </form>
                <div class="card-body bg-light">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="card m-0">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="category_id" class="font-weight-bold text-primary">Choose
                                            Categories</label>
                                        <select name="category_id" form="post-form" class="custom-select">
                                            @foreach ($post_categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="card m-0">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="text-primary font-weight-bold" for="name">
                                            Post Title
                                        </label>
                                        <input type="text" name="name" id="name" form="post-form"
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{ $post->name }}">
                                        @error('name')
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary font-weight-bold" for="description">Description</label>
                                        <textarea name="description" id="description" cols="" rows="5" form="post-form"
                                                  class="form-control @error('description') is-invalid @enderror">
                                                {{ html_entity_decode($post->description, ENT_QUOTES) }}
                                            </textarea>

                                        @error('description')
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card m-0 p-1">
                                <div class="card-body">
                                    <span class="font-weight-bold text-primary">Thumbnail</span><br>
                                    <div class="d-inline-block">
                                        @isset($post->thumbnail)
                                            <div class="item-thumbnail shadow">
                                                <img src="{{ asset('storage/post-cover/' . $post->thumbnail->location) }} " class="rounded" width="150px" height=100px" alt="thumbnail">
                                            </div>
                                            <form action="{{ route('post-cover-photo.destroy', $post->thumbnail->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm rounded text-center" style="margin-top:2px; margin-left:5px">
                                                    <i class="feather-delete"></i>
                                                </button>
                                            </form>
                                        @endisset
                                    </div>
                                    @if (!isset($post->thumbnail))
                                        <form action="{{ route('post-cover-photo.store') }}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="item_id" value="{{ $post->id }}">
                                            <label for="photo" class="font-weight-bold text-primary">Upload
                                                Photo</label>
                                            <div class="form-group">
                                                <input type="file" id="photo" name="photo" class="form-control p-1">
                                                @error('photo')
                                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <button class="btn btn-primary">Upload New Photo</button>
                                        </form>
                                    @endif
                                    <div class="form-group mt-5">
                                        <hr>
                                        <button class="btn btn-primary mt-3 w-100 float-left my-3" form="post-form">Update Item</button>
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
        $('#description').summernote({
            placeholder: 'Write content here',
            tabsize: 2,
            height: 300,
        });
    </script>
@endsection
