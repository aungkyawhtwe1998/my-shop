@extends('layouts.app')
@section('title') Edit Profile @endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Photo</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card shadow rounded">
                <div class="card-body">
                    <img src="{{ isset(Auth::user()->photo) ? asset('storage/profile/' . Auth::user()->photo) : asset('dashboard/img/user/default-user.png') }}"
                        class="d-block w-50 mx-auto rounded-circle my-3" alt="">

                    <small class="text-black-50">
                        {{ Auth::user()->email }}
                    </small>

                    <table class="table mb-0 mt-4 text-left">
                        <tr>
                            <td class="w-25">Phone</td>
                            <td>{{ Auth::user()->phone }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ Auth::user()->address }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
