@extends('layouts.app')
@section('title')
    Add Item
@endsection
@section('content')
<div class="container-fluid bg-light rounded">
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('item.index') }}">Items</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Item</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12">
            <div class="card shadow rounded">
                <div class="card-header d-flex m-2">
                    <a href="{{ route('item.show', $item->id) }}" class="btn btn-outline-primary rounded"><i
                            class="feather-arrow-left-circle"></i> </a>
                    <h3 class="font-weight-bold text-primary ml-2"> Update Item</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('item.update', $item->id) }}" id="item-form" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                    </form>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="title">
                                    Item Title
                                </label>
                                <input type="text" name="title" id="title" form="item-form"
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{ $item->title }}">
                                @error('title')
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                            <div class="form-row">
                                <div class="mb-2 col-md-6">
                                    <label class="text-primary font-weight-bold" for="original_price">
                                        Normal
                                    </label>
                                    <input type="text" name="original_price" id="original_price" form="item-form"
                                           class="form-control @error('original_price') is-invalid @enderror"
                                           value="{{ $item->original_price }}">
                                    @error('original_price')
                                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-2 col-md-6">
                                    <label class="text-primary font-weight-bold" for="promotion_price">
                                        Promotion Price
                                    </label>
                                    <input type="text" name="promotion_price" id="promotion_price" form="item-form"
                                           class="form-control @error('promotion_price') is-invalid @enderror"
                                           value="{{ $item->promotion_price }}">
                                    @error('promotion_price')
                                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-primary font-weight-bold" for="stock">
                                    Item stock
                                </label>
                                <input type="number" name="stock" id="stock" form="item-form"
                                       class="form-control @error('stock') is-invalid @enderror"
                                       value="{{ $item->stock }}">
                                @error('stock')
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="" rows="5" form="item-form"
                                          class="form-control @error('description') is-invalid @enderror">{{ $item->description }}</textarea>
                                @error('description')
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_id" class="font-weight-bold text-primary">Choose Categories</label>
                                <select name="category_id" form="item-form" class="custom-select">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $item->category_id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    @endforeach
                                </select>

                            </div>

                        </div>

                        <div class="col-12 col-lg-5 col-md-5">
                            @foreach ($item->getPhotos as $img)
                                <div class="d-inline-block">
                                    <div class="item-thumbnail shadow"
                                         style="background-image:url('{{ asset('storage/items/' . $img->location) }}'); width:150px; height:150px">
                                    </div>
                                    <form action="{{ route('item-photo.destroy', $img->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm" style="margin-top:-100px; margin-left:5px">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                            <form action="{{ route('item-photo.store') }}" class="bg-light p-2 rounded" method="POST" enctype="multipart/form-data">
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
                                <button class="btn btn-outline-primary">Upload New Photo</button>
                            </form>
                           <div class="form-group">
                               <button class="btn btn-primary w-100 float-left my-3" form="item-form">Update Item</button>
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
