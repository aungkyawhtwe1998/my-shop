<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <i class="fab fa-blogger-b"></i>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="menu-icon fa fa-bars"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item active">
                            <a class="nav-link rounded" href="{{ route('welcome') }}">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded" href="{{ route('home') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded" href="#">About</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0 d-none d-lg-block">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            {{--<nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand btn btn-outline-secondary" href="#"><img src="{{ asset('') }}" alt="" class=""><i
                        class="fab fa-blogger-b text-light"></i></a>
                <button class="navbar-toggler border-0" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fa fa-bars menu-icon"></i>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link rounded" href="{{ route('welcome') }}">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded" href="{{ route('home') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link rounded" href="#">About</a>
                        </li>
                    </ul>
                    <form class="form-inline d-none d-lg-block justify-content-md-center align-items-center just"
                        action="{{ route('welcome') }}" method="get">
                        <div class="form-row d-flex">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                        </div>

                    </form>
                </div>
            </nav>--}}
        </div>
    </div>
</div>

