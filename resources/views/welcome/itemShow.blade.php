@extends('layouts.host')
@section('title')
    {{ $item->title }}
@endsection
@section('style')
    <style>
        body {
            background-color: #090C10;
        }

    </style>
@endsection
@section('header')
    <div class="row header mt-0">
        @include('layouts.host-header')
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <x-host-bread-crumb>
                    <li class="breadcrumb-item active" aria-current="page">{{ $item->title }}</li>
                </x-host-bread-crumb>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card bg-dark rounded shadow">
                    <div class="card-header text-light">Item Detail</div>
                    <div class="card-body">
                        <h4 class="text-primary font-weight-bold">{{ $item->title }}</h4>

                        <span class="badge badge-pill badge-success">
                            <i class="feather-user"></i>
                            {{ $item->getUser->name }}
                        </span>
                        <span class="badge badge-pill badge-info">
                            <i class="feather-calendar"></i>
                            {{ $item->created_at->format('d M Y') }}
                        </span>
                        <hr>
                        <p class="text-light">{{ $item->description }}</p>

                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="row">
                    <div class="card bg-dark rounded shodow-sm">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($item->getPhotos as $img)
                                    <div class="col-6">
                                        <img src="{{ asset('storage/items/' . $img->location) }}"
                                            class="rounded d-block w-100 my-1">
                                    </div>

                                @endforeach
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
