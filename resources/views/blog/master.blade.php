<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{asset(\App\Base::$logo)}}" />
    <title>@yield('title',\App\Base::$name)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;500;600;700&family=Padauk:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/userview.css')}}">
    @yield('head')
</head>
<body>
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
                    <li class="nav-item active">
                        <a class="nav-link rounded" href="{{ route('welcome') }}" >Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded {{request()->url() == route('blogs.index') ? 'active' : ''}}" href="{{route('blogs.index')}}" >Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded {{request()->url() == route('about') ? 'active' : ''}}" href="{{route('about')}}">About</a>
                    </li>
                    @if (Auth::user()!=null && Auth::user()->role == 0)
                        <li class="nav-item">
                            <a class="nav-link rounded" href="{{ route('home') }}"><i class="fa fa-user-shield"></i></a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <main class="container-fluid">
       <div class="container-xl mt-5 pt-5">
           <div class="row justify-content-center">
               <div class="col-12 col-lg-8">
                   @yield('content')
               </div>
               <div class="col-12 col-lg-4 border-start" id="sidebarColumn">
                   <div class="position-sticky" style="top: 100px">
                       <div class="mb-5 sidebar">
                           <div id="search" class="mb-5">
                               <form action="" method="get">
                                   <div class="d-flex search-box">
                                       <input name="search" type="text" value="{{request()->search}}" class="form-control flex-shrink-1 me-2 search-input" placeholder="Search Anything" required>
                                       <button class="btn btn-primary search-btn">
                                           <i class="fa fa-search d-block d-xl-none"></i>
                                           <span class="d-none d-xl-block">Search</span>
                                       </button>
                                   </div>

                               </form>

                           </div>

                           <div id="category" class="mb-3">
                               <h4 class="fw-bolder">Category Lists</h4>
                               <ul class="list-group">
                                   <li class="list-group-item">
                                       <a href="{{route('blogs.index')}}" class="{{request()->url() == route('blogs.index') ? 'active' : ''}}">All</a>
                                   </li>
                                   @foreach($post_categories as $category)
                                       <li class="list-group-item">
                                           <a href="{{route('blogs.showByCategory',$category->slug)}}" class="{{request()->url() == route('blogs.showByCategory',$category->slug) ? 'active' : ''}}">{{$category->title}}</a>
                                       </li>
                                   @endforeach

                               </ul>
                           </div>

                           @yield('pagination-place')

                       </div>
                       <div class="d-none d-lg-block">
                       </div>
                   </div>
               </div>
               <div class="col-12 border-bottom mb-0 mt-3">
               </div>
           </div>

       </div>
        <a href="#" class="btn-up d-none bg-light p-2 border border-secondary shadow"><i class="fa fa-arrow-alt-circle-up"></i></a>
       <div class="container-xl bg-dark rounded mt-5 pt-3" id="contact">
           <div class="row mt-5 pt-3 align-items-center justify-content-center">
               <div class="col-12 text-center">
                   <div class="d-flex flex-column justify-content-center align-items-center">
                       <span class="h3 home-text">Contact or suggest me</span>
                       <div class="divider bg-white"></div>
                   </div>
               </div>
               <div class="col-12 col-md-6 col-lg-6 p-3 ">
                   <div class="bg-light rounded p-3">
                       <form action="{{ route('message.store') }}" method="POST">
                           @csrf
                           <div class="form-group mb-3">
                               <input type="text" name="name" class="form-control" placeholder="Enter your name">
                               @error('name')
                               <small class="fw-bold text-danger">{{ $message }}</small>
                               @enderror
                           </div>
                           <div class="form-group mb-3">
                               <input type="email" name="email" class="form-control" placeholder="Enter your Email">
                               @error('email')
                               <small class="fw-bold text-danger">{{ $message }}</small>

                               @enderror
                           </div>
                           <div class="form-group mb-3">
                                        <textarea type="text" name="message" class="form-control" rows="5"
                                                  placeholder="message"></textarea>
                               @error('message')
                               <small class="fw-bold text-danger">{{ $message }}</small>
                               @enderror
                           </div>
                           <button class="btn btn-primary fw-bolder">Send
                               Message</button>
                       </form>
                   </div>
               </div>
               <div class="col-12 col-md-6 col-lg-6">
                   <iframe class="rounded"
                           src="
                                            https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3701.237767292931!2d96.12430261432397!3d21.925409011940438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30cb7273d6d0f81d%3A0x27d920dcc9b4b56d!2s52nd%20St%2C%20Mandalay%2C%20Myanmar%20(Burma)!5e0!3m2!1sen!2ssg!4v1621066874005!5m2!1sen!2ssg"
                           width="100%" height="335px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

               </div>
               <div class="col-12 col-lg-6 my-3">
                   <div class="text-center d-flex flex-column mb-5 text-white">
                       <h3 class="text-success fw-bolder mb-3 fw-bolder">Contact</h3>
                       <span>Aung Kyaw Htwe</span>
                       <span>No3,Between 51 & 52, 113 street, Mandalay</span>
                       <span>Phone: <a href="tel:09798802184">09798802184</a></span>
                       <span>Email: aungkyawhtwe.mdy49@gmail.com</span>
                   </div>

               </div>
               <div class="col-12 col-lg-6 my-3 ">
                   <div class="d-flex flex-column text-center fs-5">
                       <h3 class="text-success fw-bolder fw-bolder">My Social Media platform</h3>
                       <div class="p-5 d-flex text-light justify-content-center align-items-center">
                           <a href="https://www.facebook.com/codeLex.mm">
                               <i class="mx-3 fab social-icon fa-facebook-f  "></i>
                           </a>
                           <a href="https://www.youtube.com/channel/UCIwB3osrjw9mjX9Heny2V9Q">
                               <i class="fab mx-3 social-icon fa-youtube "></i>
                           </a>
                           <a href="https://github.com/aungkyawhtwe1998">
                               <i class="fab mx-3 social-icon fa-github "></i>
                           </a>
                           <a href="https://www.linkedin.com/in/aung-kyaw-htwe-851a48187/">
                               <i class="fab mx-3 social-icon fa-linkedin "></i>
                           </a>
                       </div>
                   </div>
               </div>

           </div>
       </div>
       <div class="container">
           <div class="d-flex justify-content-center align-items-center my-4">
               <div class="text-center">
                   © Copyright Myanmar. All Right Reserved by <a href="#" class="text-secondary fw-bold">Codelex</a>
               </div>
           </div>
       </div>
   </main>
    <script src="{{asset('js/userview.js')}}"></script>
    @include('layouts.toasts')
    @include('layouts.alert')
</body>
</html>
