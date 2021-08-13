@extends('layouts.app')
@section('title')
    Add Item
@endsection
@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('item.index') }}">Items</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Item</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12">
            <div class="card shadow rounded">
                <div class="card-header">Add Item</div>

                <div class="card-body">
                    @if (session('status'))
                        <p class="alert alert-success">
                            {!! session('status') !!}
                        </p>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('item.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="">
                                        <div class="mr-1 mb-2">
                                            <label class="text-primary font-weight-bold" for="title">
                                                Item Title
                                            </label>
                                            <input type="text" name="title" id="title"
                                                class="form-control @error('title') is-invalid @enderror"
                                                value="{{ old('title') }}">
                                            @error('title')
                                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-row">
                                            <div class="mb-2 col-md-6">
                                                <label class="text-primary font-weight-bold" for="normal_price">
                                                    Normal
                                                </label>
                                                <input type="text" name="normal_price" id="normal_price"
                                                    class="form-control @error('normal_price') is-invalid @enderror"
                                                    value="{{ old('original_price') }}">
                                                @error('normal_price')
                                                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-2 col-md-6">
                                                <label class="text-primary font-weight-bold" for="promotion_price">
                                                    Promotion Price
                                                </label>
                                                <input type="text" name="promotion_price" id="promotion_price"
                                                    class="form-control @error('promotion_price') is-invalid @enderror"
                                                    value="{{ old('promotion_price') }}">
                                                @error('promotion_price')
                                                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mr-1 mb-2">
                                            <label class="text-primary font-weight-bold" for="stock">
                                                Item stock
                                            </label>
                                            <input type="text" name="stock" id="stock"
                                                class="form-control @error('stock') is-invalid @enderror"
                                                value="{{ old('stock') }}">
                                            @error('stock')
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
                                <div class="col-12 col-md-6">
                                    <div class="">
                                        <div class="form-group">
                                            <span class="font-weight-bold text-primary">Choose Categories</span>
                                            @error('category_id')
                                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                            @enderror
                                            @foreach ($categories as $category)
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio{{ $category->id }}"
                                                        name="category_id" value="{{ $category->id }}"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label"
                                                        for="customRadio{{ $category->id }}">{{ $category->title }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="from-row">
                                                <div class="col-12 col-md-6">
                                                    <label for="photo" class="font-weight-bold text-primary">Upload
                                                        Photo</label>
                                                    <input type="file" id="photo" name="photo[]" multiple
                                                        class="form-control p-1">
                                                    @error('photo.*')
                                                        <small class="font-weight-bold text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary float-left my-3">Save Article</button>
                        </form>
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
