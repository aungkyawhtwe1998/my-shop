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
                <div class="card-header">Add Post</div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <form action="{{ route('post.update', $post->id) }}" id="post-form" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <label class="text-primary font-weight-bold" for="name">
                                            Post Title
                                        </label>
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ $post->name }}">
                                        @error('name')
                                            <small class="font-weight-bold text-danger">{{ $message }}</small>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="category_id" class="font-weight-bold text-primary">Choose
                                            Categories</label>
                                        <select name="category_id" class="custom-select">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                                    {{ $category->title }}
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-primary font-weight-bold" for="description">Description</label>
                                        <textarea name="description" id="description" cols="" rows="5"
                                            class="form-control @error('description') is-invalid @enderror">
                                                {{ html_entity_decode($post->description, ENT_QUOTES) }}
                                            </textarea>

                                        @error('description')
                                            <small class="font-weight-bold text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary float-left my-3" form="post-form">Update Item</button>
                                </form>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="d-inline-block">
                                    @isset($post->getPhoto)
                                        <div class="item-thumbnail shadow"
                                            style="background-image:url('{{ asset('storage/post-cover/' . $post->getPhoto->location) }}'); width:150px; height:150px">
                                        </div>
                                        <form action="{{ route('post-cover-photo.destroy', $post->getPhoto->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" style="margin-top:-100; margin-left:5px">
                                                <i class="feather-delete"></i>
                                            </button>
                                        </form>
                                    @endisset
                                </div>
                                <hr>
                                @if (!isset($post->getPhoto))
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
