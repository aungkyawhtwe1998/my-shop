@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                    <div class=""><i class="fas fa-home"></i> {{ __('Dashboard') }}</div>
                    <div class="">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- {{ __('You are logged in!') }} --}}
                        {{-- <button class="test btn btn-primary">test</button>
                        <br>
                        {{ Request::url() }}

                        <br><br>
                        {{ Auth::user() }}
                        <button class="btn btn-primary test-alert">Test Alert</button>
                        <button class="btn btn-primary test-toast">Test Toast</button> --}}

                        <div class="row">
                            <div class="col-6 col-lg-3" >
                                <div class="card blog-card mb-2 shadow-sm rounded">
                                    <div class="card-body text-center">
                                        <i class="feather-user"></i><br>
                                        <span>100</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="card blog-card mb-2 shadow-sm rounded">
                                    <div class="card-body text-center">
                                        <i class="feather-check"></i><br>
                                        <span>100</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="card blog-card mb-2 shadow-sm rounded">
                                    <div class="card-body text-center">
                                        <i class="feather-clock"></i><br>
                                        <span>100</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3">
                                <div class="card blog-card mb-2 shadow-sm rounded">
                                    <div class="card-body text-center">
                                        <i class="feather-folder"></i><br>
                                        <span>100</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('foot')
    <script>
        $(".test").click(function() {
            alert("Hllo");
        })

        $(".test-alert").click(function() {
            Swal.fire({
                icon: 'success',
                title: 'Min Ga Lar Par',
                text: 'San Kyi Tar Par, Heloo!',
                // footer: '<a href="">Why do I have this issue?</a>'
            })
        })
        $(".test-toast").click(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Signed in successfully'
            })
        })
    </script>
@endsection
