<div class="container-fluid home-nav  ">
    <div class="row m-sm-0">
        <div class="container-xl ">
            <div class="row m-sm-0">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-dark justify-content-between">
                        <a class="navbar-brand" href="#">
                            <img src="{{asset(\App\Base::$logo)}}" width="50px" alt="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu-icon fa fa-bars fa-2x"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                                <li class="nav-item active">
                                    <a class="nav-link rounded" href="{{ route('welcome') }}">Home <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                @if (Auth::user()!=null && Auth::user()->role == 0)
                                    <li class="nav-item">
                                        <a class="nav-link rounded" href="{{ route('home') }}">Dashboard</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link rounded" href="https://aungkyawhtwe1998.github.io/">About</a>
                                </li>

                            </ul>
                            {{--<form class="form-inline d-none d-lg-block justify-content-md-center align-items-center just"
                                  action="{{ route('welcome') }}" method="get">
                                <div class="form-row d-flex">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                                </div>

                            </form>--}}

                        </div>

                    </nav>
                </div>
            </div>
        </div>

    </div>
</div>
