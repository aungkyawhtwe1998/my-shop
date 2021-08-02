<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <a class="navbar-brand" href="#"><img src="{{ asset('') }}" alt="" class="">MyShop</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" tabindex="-1"
                                    aria-disabled="true">Register</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 colt-lg-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Item Detail</li>

                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card rounded shadow">
                <div class="card-header">Item Detail</div>
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
                    <p class="text-">{{ $item->description }}</p>
                    <div class="my-5">
                        @foreach ($item->getPhotos as $img)
                            <img src="{{ asset('storage/items/' . $img->location) }}" class="d-block w-100 my-1">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('js/app.js') }}" <script src="{{ asset('js/app.js') }}"></script>


</html>
