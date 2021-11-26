<nav class="navbar navbar-expand-lg navbar-light border-bottom shadow-sm position-fixed top-0 w-100">
    <div class="container">
        <a class="navbar-brahnd" href="{{route('blogs.index')}}">
            <img  src="{{asset(\App\Base::$logo)}}" width="40px" class="me-1" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="menu-icon fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul id="menu-top-right-menu" class="navbar-nav ms-auto mb-2 mb-md-0 ">
                <li class="nav-item">
                    <a class="nav-link rounded active" href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded" href="{{route('blogs.index')}}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link rounded" href="{{route('about')}}">About</a>
                </li>
                @if (Auth::user()!=null && Auth::user()->role == 0)
                    <li class="nav-item">
                        <a class="nav-link rounded" href="{{ route('home') }}">Dashboard</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
