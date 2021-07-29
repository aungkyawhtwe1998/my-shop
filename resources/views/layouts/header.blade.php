<div class="row header mb-3">
    <div class="col-12">
        <div class="p-2 bg-primary rounded d-flex justify-content-between align-items-center">
            <button class="show-sidebar-btn btn btn-primary btn-link d-lg-none">
                <i class="feather-menu text-light" style="font-size: 2em;"></i>
            </button>

            <form action="" method="post" class="d-none d-md-block">
                <div class="form-inline d-flex">
                    <input type="text" class="form-control mr-2">
                    <button class="btn btn-light">
                        <i class="feather-search"></i>
                    </button>
                </div>
            </form>

            <div class="dropdown">
                <a class="btn btn-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="{{ isset(Auth::user()->photo) ? asset('storage/profile/' . Auth::user()->photo) : asset('dashboard/img/user/default-user.png') }}"
                        class="userimg" alt="">
                    <span class="ml-0 ml-md-2 d-none d-md-inline-block">
                        {{ Auth::user()->name }}
                    </span>
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                </div>
            </div>
            <form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
