{{-- <h1>Welcome</h1>
<a href="{{ route('login') }}" >Login</a> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    {{-- Nav bar --}}
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

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Categories
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach ($categories as $category)
                                        <a class="dropdown-item"
                                            href="{{ route('welcome.category', $category->id) }}">{{ $category->title }}</a>
                                    @endforeach

                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 colt-lg-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent">
                        <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @foreach ($items as $item)
                        <div class="col-12 col-md-3">
                            <div class="card rounded shadow">
                                <div class=" card-header text-primary font-weight-bold" class="card-header">
                                    {{ $item->title }}</div>
                                <div class="card-body">
                                    <span class="badge badge-pill badge-success">
                                        <i class="feather-user"></i>
                                        {{ $item->getUser->name }}
                                    </span>
                                    <span class="badge badge-pill badge-info">
                                        <i class="feather-calendar"></i>
                                        {{ $item->created_at->format('d M Y') }}
                                    </span>
                                    <hr>
                                    <div class="">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                                            <div class="carousel-inner">
                                                @foreach ($item->getPhotos as $key => $img)
                                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                        <div class="show-thumbnail shadow"
                                                            style="background-image:url('{{ asset('storage/items/' . $img->location) }}');">
                                                        </div>
                                                        {{-- <img src="{{ asset('storage/items/' . $img->location) }}"
                                                            class="item-thumbnial d-block w-100"> --}}
                                                    </div>
                                                @endforeach
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators"
                                                role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators"
                                                role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                        <p class="text-">{{ substr($item->description, 0, 100) }} ... <a
                                                class="text-success"
                                                href="{{ route('welcome.show', $item->id) }}">Read
                                                More</a></p>

                                    </div>


                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}" <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
