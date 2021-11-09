@extends('layouts.app')
@section('title')
    Add Post
@endsection
@section('content')

    <div class="row">
        <x-bread-crumb>
            <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Post</li>
        </x-bread-crumb>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class=""><i class="fa fa-plus-circle"></i>Add Post</h4>
                        <a class="btn btn-outline-primary btn-lg" href="{{route('post.index')}}">View Posts </a>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ route('post.store') }}" method="post" id="post-form" enctype="multipart/form-data">
                        @csrf
                    </form>
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="form-group">

                                        <span class="font-weight-bold text-primary">Choose Categories</span>
                                        @error('category_id')
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                        @enderror
                                        @foreach ($post_categories as $category)
                                            <div class="custom-control custom-radio">
                                                <input type="radio" form="post-form" id="customRadio{{ $category->id }}" name="category_id"
                                                       value="{{ $category->id }}" class="custom-control-input">
                                                <label class="custom-control-label"
                                                       for="customRadio{{ $category->id }}">{{ $category->title }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="form-group mr-1 mb-2">
                                        <label class="text-primary font-weight-bold" for="name">
                                            Post Title
                                        </label>
                                        <input type="text" form="post-form" name="name" id="name" placeholder="Enter Title"
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name') }}">
                                        @error('name')
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="text-primary font-weight-bold"
                                               for="description">Description</label>
                                        <textarea name="description" form="post-form" id="description" cols="" rows="5"
                                                  class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                        @error('description')
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="photo" class="font-weight-bold text-primary">Thumbnail</label>
                                        <input type="file" form="post-form" id="photo" name="photo" class="form-control">
                                        @error('photo')
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <button class="btn btn-primary w-100" form="post-form">Save Article</button>

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
