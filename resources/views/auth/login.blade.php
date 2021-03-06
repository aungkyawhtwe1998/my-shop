@extends('layouts.app')
@section('title')
    Sign In
@endsection
@section('content')
<section class="main container">
    <div class="row min-vh-100 justify-content-center align-items-center">
        <div class="col-12 col-mg-6 col-lg-5">
            <div class="my-5">
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <span class="p-2 rounded d-flex justify-content-center align-items-center mr-2">
                         <img src="{{asset(\App\Base::$logo)}}" width="50px" alt="Logo">
                    </span>
                    <span class="font-weight-bolder h4 mb-0 text-uppercase text-primary"></span>
                </div>
                <div class="card rounded bg-white shadow">
                    <div class="card-body p-3">
                        <h2 class="text-center font-weight-normal">Sign In</h2>
                        <p class="text-center text-black-50 mb-4">
                            Don't have an account yet?
                            <a href="{{ route('register') }}">Sign up here</a>
                        </p>
                        <a href="#" class="btn btn btn-outline-primary btn-block">
                            <i class="fab fa-google"></i>
                            Sign in with Google
                        </a>
                        <hr class="mb-1">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-lg btn-block btn-primary rounded">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
