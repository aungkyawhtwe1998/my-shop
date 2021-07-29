@extends('layouts.app')

@section('title') Edit Profile @endsection

@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Name & Email</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card shadow rounded mb-3">
                <div class="card-body">
                    <form action="{{ route('profile.changeUserInfo') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="mr-1 feather-user"></i>Your Name</label>
                            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                            @error('name')
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">
                                <i class="mr-1 feather-mail"></i>
                                Your Email
                            </label>
                            <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}">
                            @error('email')
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">
                                <i class="mr-1 feather-phone"></i>
                                Your Phone
                            </label>
                            <input type="number" name="phone" class="form-control" value="{{ auth()->user()->phone }}">
                            @error('phone')
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">
                                <i class="mr-1 feather-map"></i>
                                Your Address
                            </label>
                            <textarea name="address" class="form-control" cols="30"
                                rows="5">{{ auth()->user()->address }}</textarea>
                            @error('address')
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" required>
                                <label class="custom-control-label" for="customSwitch1">I'm Sure</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="mr-1 feather-refresh-ccw"></i>
                                Update Info
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- <div class="card shadow rounded mb-3">
                <div class="card-body">
                    <form action="{{ route('profile.changeEmail') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">
                                <i class="mr-1 feather-mail"></i>
                                Your Email
                            </label>
                            <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}">
                            @error('email')
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch3" required>
                                <label class="custom-control-label" for="customSwitch3">I'm Sure</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="mr-1 feather-refresh-ccw"></i>
                                Change Email
                            </button>
                        </div>
                    </form>

                </div>
            </div> --}}

        </div>
        {{-- <div class="col-12 col-md-4">
            <div class="card shadow rounded mb-3">
                <div class="card-body">
                    <form action="{{ route('profile.changePhone') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="phone">
                                <i class="mr-1 feather-phone"></i>
                                Your Phone
                            </label>
                            <input type="number" name="phone" class="form-control" value="{{ auth()->user()->phone }}">
                            @error('phone')
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch4" required>
                                <label class="custom-control-label" for="customSwitch4">I'm Sure</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="mr-1 feather-refresh-ccw"></i>
                                Change Phone
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="card shadow rounded mb-3">
                <div class="card-body">
                    <form action="{{ route('profile.changeAddress') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="address">
                                <i class="mr-1 feather-map"></i>
                                Your Address
                            </label>
                            <textarea name="address" cols="30" rows="5">{{ auth()->user()->address }}</textarea>
                            @error('address')
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch5" required>
                                <label class="custom-control-label" for="customSwitch5">I'm Sure</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="mr-1 feather-refresh-ccw"></i>
                                Change Address
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div> --}}
    </div>
@endsection
