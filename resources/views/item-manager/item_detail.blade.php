@extends('layouts.app')
@section('title')
    Item Detail
@endsection
@section('content')
<div class="container-xl bg-light rounded">
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('item.index') }}">Items</a></li>
        <li class="breadcrumb-item active" aria-current="page">Item Detail</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12 col-lg-2 col-md-2"></div>
        <div class="col-12 col-md-8">
            <div class="card rounded shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="">Item Detail</h4>
                    <a href="{{ route('item.edit', $item->id) }}" class="btn btn-outline-primary rounded"><i
                            class="feather-edit-2"></i></a>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="text-primary font-weight-bold">{{ $item->title }}</h4>

                    </div>

                    <span class="badge badge-pill badge-success">
                        <i class="feather-user"></i>
                        {{ $item->getUser->name }}
                    </span>
                    <span class="badge badge-pill badge-info">
                        <i class="feather-calendar"></i>
                        {{ $item->created_at->format('d M Y') }}
                    </span>
                    <hr>
                    <span class="badge badge-pill badge-secondary">
                        <i class="fas fa-money-bill"></i>
                        {{ $item->original_price }}
                    </span>
                    <span class="badge badge-pill badge-warning">
                        <i class="fas fa-money-bill"></i>
                        {{ $item->promotion_price }}
                    </span>
                    <p class="text-">{{ $item->description }}</p>
                    <div class="">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            {{-- <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol> --}}
                            <div class="carousel-inner">
                                @foreach ($item->getPhotos as $key => $img)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/items/' . $img->location) }}" class="d-block w-100">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-2 col-md-2"></div>
    </div>
</div>

@endsection
@section('foot')
    <script>

    </script>
@endsection
