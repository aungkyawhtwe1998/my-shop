<div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar">
    <div class="d-flex justify-content-between align-items-center py-2 mt-3 nav-brand">
        <div class="d-flex align-items-center">
            <span class="bg-primary p-2 rounded d-flex justify-content-center align-items-center mr-2">
                <i class="feather-shopping-bag text-white h4 mb-0"></i>
            </span>
            <span class="font-weight-bolder h4 mb-0 text-uppercase text-primary">My Shop</span>
        </div>
        <button class="hide-sidebar-btn btn btn-light d-block d-lg-none">
            <i class="feather-x text-primary" style="font-size: 2em;"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul>
            <x-menu-spacer></x-menu-spacer>
            <x-menu-item name="Home" class="fas fa-home" link="{{ route('home') }}" counter=""></x-menu-item>

            {{-- Category --}}
            @if (Auth::user()->role == 0)
                <x-menu-title title="Categories Manager"></x-menu-title>
                <x-menu-item name="Manage Item Categories" class="fas fa-plus-circle"
                    link="{{ route('category-manager.index') }}" counter=""></x-menu-item>
                <x-menu-item name="Manage Posts Categories" class="fas fa-plus-circle"
                    link="{{ route('post-category.index') }}" counter=""></x-menu-item>
                <x-menu-spacer></x-menu-spacer>
            @endif



            {{-- Item --}}
            <x-menu-title title="Items Manager"></x-menu-title>
            <x-menu-item name="Create New Item" class="fas fa-plus-circle" link="{{ route('item.create') }}"
                counter=""></x-menu-item>
            <x-menu-item name="Item Lists" class="fas fa-server" link="{{ route('item.index') }}" counter="57">
            </x-menu-item>
            <x-menu-spacer></x-menu-spacer>

            {{-- Post --}}
            <x-menu-title title="Post Manager"></x-menu-title>
            <x-menu-item name="Create New post" class="fas fa-plus-circle" link="{{ route('post.create') }}"
                counter=""></x-menu-item>
            <x-menu-item name="Post Lists" class="fab fa-blogger" link="{{ route('post.index') }}" counter="57">
            </x-menu-item>
            <x-menu-spacer></x-menu-spacer>

            {{-- User Manager --}}
            @if (Auth::user()->role == 0)
                <x-menu-title title="User Management"></x-menu-title>
                <x-menu-item name="User Lists" class="feather-users" link="{{ route('user-manager.index') }}">
                </x-menu-item>
                <x-menu-spacer></x-menu-spacer>
            @endif

            {{-- User Profile --}}
            <x-menu-title title="User Profile"></x-menu-title>
            <x-menu-item name="Your Profile" class="fas fa-user" link="{{ route('profile') }}"></x-menu-item>
            <x-menu-item name="Change Password" class="fas fa-lock" link="{{ route('profile.edit.password') }}">
            </x-menu-item>
            <x-menu-item name="Update User Info" class="fas fa-envelope"
                link="{{ route('profile.edit.user.info') }}">
            </x-menu-item>
            <x-menu-item name="Update photo" class="fas fa-image" link="{{ route('profile.edit.photo') }}">
            </x-menu-item>
            <x-menu-spacer></x-menu-spacer>


            {{-- Quit to home --}}
            <x-menu-title title="Back to front end"></x-menu-title>
            <x-menu-item name="User View" class="fas fa-image" link="{{ route('welcome') }}">
            </x-menu-item>
            <x-menu-spacer></x-menu-spacer>
            <li class="menu-item">
                <a href="{{ route('logout') }}" class="btn btn-outline-primary btn-block" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                    logout
                </a>
            </li>

        </ul>
    </div>
</div>
