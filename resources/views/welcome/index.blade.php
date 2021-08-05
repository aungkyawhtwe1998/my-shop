<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','My Shop')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    {{-- Nav bar --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-primary shadow-sm rounded my-3">
                    <a class="navbar-brand" href="#"><img src="{{ asset('') }}" alt="" class="">MyShop</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('welcome') }}">Home <span
                                        class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Categories
                                </a>
                                <div class="dropdown-menu p-2" aria-labelledby="navbarDropdown">
                                    @foreach ($categories as $category)
                                        <a class="dropdown-item rounded"
                                            href="{{ route('welcome.category', $category->id) }}">{{ $category->title }}</a>
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('portfolio') }}">About</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    {{-- home --}}
    <div class="container" id="home">
        <div class="row min-vh-100 py-5">
            <div class="col-12 col-md-6">
                <div class="my-3 justify-content-center">
                    <h1 class="text-primary font-weight-bolder">Ecommerce Myanmar</h1>
                    <p class="font-weight-bold">Lorem ipsum dolor sit amet consectetur adipisicing
                        elit.
                        Veritatis accusantium fuga nisi unde
                        labore! Laudantium recusandae est dolorum iure harum nam nobis magnam provident
                        aliquam, dolorem at sapiente incidunt.</p>
                </div>
                <div class="">
                    <a href="{{ route('register') }}" class="btn btn-primary">Register as Seller</a>
                    <a href="#item" class="btn btn-outline-primary">Explore Items</a>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <img src="{{ asset('dashboard/img/item/ecom.svg') }}" class="w-75" alt="">
            </div>
        </div>
    </div>

    {{-- Category --}}
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- item --}}
    <div class="container-fluid" id="item">
        <div class="row">
            <div class="col-12">
                <h2 class="mt-3 text-primary text-center font-weight-bolder">Find Items</h2>
                <h4 class="mb-3 text-primary text-center font-weight-bold"><i class="feather-arrow-down"></i></h4>
                <div class="row">

                    @foreach ($items as $item)
                        <div class="col-12 col-md-3">
                            <div class="card rounded shadow mb-3">
                                <div class="card-body">
                                    <span class="text-primary font-weight-bold">{{ $item->title }}</span>
                                    <hr>
                                    <div class="">
                                        <span class="badge badge-pill badge-success">
                                            <i class="feather-user"></i>
                                            {{ $item->getUser->name }}
                                        </span>
                                        <span class="badge badge-pill badge-secondary">
                                            <i class="feather-calendar"></i>
                                            {{ $item->created_at->format('d M Y') }}
                                        </span>
                                    </div>
                                    <div class="text-center">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                                            <div class="carousel-inner">
                                                @foreach ($item->getPhotos as $key => $img)
                                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                        <div class="show-thumbnail rounded"
                                                            style="background-image:url('{{ asset('storage/items/' . $img->location) }}');">
                                                        </div>
                                                        {{-- <img src="{{ asset('storage/items/' . $img->location) }}"
                                                            class="item-thumbnial d-block w-100"> --}}
                                                    </div>
                                                @endforeach
                                            </div>
                                            {{-- <a class="carousel-control-prev" href="#carouselExampleIndicators"
                                                role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators"
                                                role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a> --}}
                                        </div>
                                        <p class="text-justify">
                                            {{ substr($item->description, 0, 50) }} ...
                                            <a class="text-success font-weight-bold"
                                                href="{{ route('welcome.show', $item->id) }}">View Detail</a>
                                        </p>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="text-black-50 font-weight-bold"><strike>{{ 1000 }}
                                                    KS</strike> </span>
                                            <span class="font-weight-bold"> {{ 900 }} KS </span>
                                            <span class="badge badge-danger badge-pill p-1 m-0">10%</span>
                                        </div>
                                        <button
                                            class="btn btn-warning rounded shadow-sm btn-sm justify-content-center"><i
                                                class="fas fa-shopping-basket"></i></button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- footer --}}

    <script src="{{ asset('js/app.js') }}" <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
