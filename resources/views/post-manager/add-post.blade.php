@extends('layouts.app')
@section('title')
    Add Post
@endsection
@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Posts</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Post</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12">
            <div class="card shadow rounded">
                <div class="card-header">Add Post</div>

                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <div class="">
                                        <div class="mr-1 mb-2">
                                            <label class="text-primary font-weight-bold" for="name">
                                                Post Title
                                            </label>
                                            <input type="text" name="name" id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label class="text-primary font-weight-bold"
                                                for="description">Description</label>
                                            <textarea name="description" id="description" cols="" rows="5"
                                                class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                            @error('description')
                                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <span class="font-weight-bold text-primary">Choose Categories</span>
                                        @error('category_id')
                                            <small class="font-weight-bold text-danger">{{ $message }}</small>
                                        @enderror
                                        @foreach ($categories as $category)
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio{{ $category->id }}" name="category_id"
                                                    value="{{ $category->id }}" class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="customRadio{{ $category->id }}">{{ $category->title }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label for="photo" class="font-weight-bold text-primary">Upload
                                            Cover Photo</label>
                                        <input type="file" id="photo" name="photo" class="form-control p-1">
                                        @error('photo')
                                            <small class="font-weight-bold text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary float-left my-3">Save Article</button>
                                </div>
                            </div>
                        </form>
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
