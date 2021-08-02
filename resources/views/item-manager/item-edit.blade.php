@extends('layouts.app')
@section('title')
    Add Item
@endsection
@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('item.index') }}">Items</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Item</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12">
            <div class="card shadow rounded">
                <div class="d-flex m-2">
                    <a href="{{ route('item.show', $item->id) }}" class="btn btn-outline-secondary rounded"><i
                            class="feather-arrow-left-circle"></i> </a>
                    <h3 class="font-weight-bold text-primary ml-2"> Update Item</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('item.update', $item->id) }}" id="item-form" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="title">
                                        Item Title
                                    </label>
                                    <input type="text" name="title" id="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        value="{{ $item->title }}">
                                    @error('title')
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" cols="" rows="5"
                                        class="form-control @error('description') is-invalid @enderror">{{ $item->description }}</textarea>
                                    @error('description')
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category_id" class="font-weight-bold text-primary">Choose Categories</label>
                                    <select name="category_id" class="custom-select">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $item->category_id ? 'selected' : '' }}>
                                                {{ $category->title }}
                                        @endforeach
                                    </select>

                                </div>
                                <button class="btn btn-primary float-left my-3" form="item-form">Update Item</button>
                            </form>
                        </div>

                        <div class="col-md-6">
                            @foreach ($item->getPhotos as $img)
                                <div class="d-inline-block">
                                    <div class="item-thumbnail shadow"
                                        style="background-image:url('{{ asset('storage/items/' . $img->location) }}'); width:150px; height:150px">
                                    </div>
                                    <form action="{{ route('item-photo.destroy', $img->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" style="margin-top:-100; margin-left:5px">
                                            <i class="feather-delete"></i>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                            <hr>
                            <form action="{{ route('item-photo.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                                <label for="photo" class="font-weight-bold text-primary">Upload
                                    Photo</label>
                                <div class="form-group">
                                    <input type="file" id="photo" name="photo[]" multiple class="form-control p-1">
                                    @error('photo.*')
                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button class="btn btn-primary">Upload New Photo</button>
                            </form>
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
