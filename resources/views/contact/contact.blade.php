@extends('layouts.host')
@section('title')
    Frame
@endsection
@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Contact</i>
    </x-bread-crumb>
    <div class="row">
        <div class="container-fluid">
            <div class="row mt-5 pt-3 align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <span class="text-title wow bounce">Contact or suggest me</span>
                </div>
                <div class="divider"></div>
            </div>

            <div class="row m-0 p-0">
                <div class="col-12 col-lg-6 wow slideInLeft ani-delay-1">
                    <form action="{{ route('message.store') }}" method="POST"
                        class="my-card d-flex flex-column align-items-center">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" name="name" class="form-control my-input"
                                placeholder="Enter your name">
                            @error('name')
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form-control  my-input"
                                placeholder="Enter your Email">
                            @error('email')
                                <small class="font-weight-bold text-danger">{{ $message }}</small>

                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <textarea type="text" name="message" class="form-control my-input" rows="5"
                                placeholder="Comment"></textarea>
                            @error('message')
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button class="btn-message border-3 text-light fw-bolder">Send
                            Message</button>

                        {{-- <div class="form-group justify-content-center align-items-center">
                        </div> --}}
                    </form>
                </div>
                <div class="col-12 col-lg-6 ">
                    <div class="my-card mt-4 wow p-3 slideInRight ani-delay-1">
                        <iframe class=""
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3701.237767292931!2d96.12430261432397!3d21.925409011940438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30cb7273d6d0f81d%3A0x27d920dcc9b4b56d!2s52nd%20St%2C%20Mandalay%2C%20Myanmar%20(Burma)!5e0!3m2!1sen!2ssg!4v1621066874005!5m2!1sen!2ssg"
                            width="100%" height="300px" style="border:0;" allowfullscreen=""
                            loading="lazy"></iframe>
                    </div>

                </div>
            </div>

            <div class="row">
                <footer class="col-12 footer">
                    <div class="container">
                        <div class="row my-3 align-items-center justify-content-center ">
                            <div class="col-12 col-lg-6 ">
                                <div class="text-center d-flex flex-column text mb-5">
                                    <span class="fs-3 fw-bolder mb-3 fw-bolder">Contact</span>
                                    <span>Aung Kyaw Htwe</span>
                                    <span>No3,Between 51 & 52, 113 street, Mandalay</span>
                                    <span>Phone: <a href="tel:09798802184" class="text">09798802184</a></span>
                                    <span>Email: aungkyawhtwe.mdy49@gmail.com</span>
                                </div>

                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="d-flex flex-column text-center fs-5 mytext">
                                    <span class="fs-3 fw-bolder fw-bolder">My Social Media platform</span>
                                    <div class="social-icon p-5 d-flex justify-content-center mt-3">
                                        <a href="https://www.facebook.com/alex.akh1998/">
                                            <i class="mx-3 fab fa-facebook-f mytext fa-2x "></i>
                                        </a>
                                        <a href="https://www.linkedin.com/in/aung-kyaw-htwe-851a48187/">
                                            <i class="fab mx-3 fa-linkedin mytext fa-2x"></i>
                                        </a>
                                        <a href="#">
                                            <i class="fab mx-3 fa-instagram mytext fa-2x"></i>
                                        </a>
                                        <a href="https://twitter.com/AlexAlexAKH">
                                            <i class="fab mx-3 fa-twitter mytext fa-2x"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="pb-5 fw-boler d-flex flex-column text-center fs-5">
                                    <span class="text-white"> © Copyright Myanmar. All Right Reserved</span>
                                    <span class="text-white"> Designed by<a href="#" class="text-light"> Aung Kyaw
                                            Htwe</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
@endsection
@section('foot')
    <script>

    </script>
@endsection
