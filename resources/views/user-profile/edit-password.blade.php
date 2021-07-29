@extends('layouts.app')
@section('title') Reset Password @endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Photo</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card shadow rounded">
                <div class="card-body">

                    <form action="{{ route('profile.changePassword') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for=""><i class="fas fa-lock"></i> Current Password</label>
                            <input type="text" name="current_password" class="form-control" placeholder="Current Password">
                            @error('current_password')
                                <small class="font-weight-bold text-danger text-center">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for=""><i class="feather-refresh-ccw"></i> New Password</label>
                            <input type="text" name="new_password" class="form-control" placeholder="New Password">
                            @error('new_password')
                                <small class="font-weight-bold text-danger text-center">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for=""><i class="fas fa-lock"></i> Confirm Password</label>
                            <input type="text" name="new_confirm_password" class="form-control"
                                placeholder="Confirm Password">
                            @error('new_confirm_password')
                                <small class="font-weight-bold text-danger text-center">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch2" required>
                                <label class="custom-control-label" for="customSwitch2">I'm Sure</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="mr-1 feather-refresh-ccw"></i>
                                Change Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
