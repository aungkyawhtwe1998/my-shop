@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <i class="fas fa-home"></i>
                        {{ __('You are logged in!') }}
                        <button class="test btn btn-primary">test</button>
                        <br>
                        {{-- {{ Request::url() }} --}}

                        <br><br>
                        {{ Auth::user() }}
                        <button class="btn btn-primary test-alert">Test Alert</button>
                        <button class="btn btn-primary test-toast">Test Toast</button>
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
