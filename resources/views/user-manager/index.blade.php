@extends('layouts.app')
@section('title')
    User Manager
@endsection
@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">User</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12">
            <div class="card rounded shadow">
                <div class="card-header">
                    <h4><i class="feather-users"></i> User Lists</h4>
                </div>
                <div class="card-body">
                    <div class="d-lg-flex d-md-flex justify-content-between align-items-center mb-2">
                        <div class="d-flex justify-content-center align-items-center">
                            @isset(request()->search)
                                <a href="{{route('user-manager.index')}}" class="btn btn-outline-primary"><i class="feather-layers"></i> Show All</a>
                                <span class="text-primary font-weight-bold ml-3">Search By: {{request()->search}}</span>
                            @endisset
                        </div>
                        <div class="">
                            <form action="{{ route('user-manager.index') }}" method="get">
                                <div class="d-flex">
                                    <input type="text" class="form-control mr-2" name="search" value="{{request()->search}}" placeholder="Enter title or description">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Control</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role ? 'User' : 'Admin' }}</td>
                                    <td>
                                        @if ($user->role == 1)
                                            <form class="d-inline-block" action="{{ route('user-manager.makeAdmin') }}"
                                                id="form{{ $user->id }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <button type="button" class="btn btn-sm btn-outline-primary rounded"
                                                    onclick="askConfirm({{ $user->id }})" )">Make Admin</button>
                                            </form>

                                            @if ($user->isBanned == 1)
                                                <span class="badge badge-pill badge-danger p-2">Banned</span>
                                                <form class="d-inline-block"
                                                    action="{{ route('user-manager.restoreUser') }}"
                                                    id="restoreForm{{ $user->id }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                    <button type="button" class="btn btn-sm btn-outline-success rounded"
                                                        onclick="restoreUser({{ $user->id }})" )">Restore User</button>
                                                </form>
                                            @else
                                                <form class="d-inline-block" action="{{ route('user-manager.banUser') }}"
                                                    id="banForm{{ $user->id }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                    <button type="button" class="btn btn-sm btn-outline-danger rounded"
                                                        onclick="banUser({{ $user->id }})" )">Ban User</button>
                                                </form>
                                            @endif
                                            <button class="btn btn-outline-warning btn-sm rounded"
                                                onclick="changePassword({{ $user->id }},'{{ $user->name }}')">Change
                                                Password</button>
                                        @endif
                                    </td>
                                    <td>
                                        <small>
                                            <i class="feather-calendar"></i>
                                            {{ $user->created_at->format('d F Y') }}
                                            <br>
                                            <i class="feather-calendar"></i>

                                            {{ $user->created_at->format('h:i a') }}
                                        </small>
                                    </td>
                                    <td>
                                        <small>
                                            <i class="feather-calendar"></i>
                                            {{ $user->updated_at->format('d F Y') }}
                                            <br>
                                            <i class="feather-calendar"></i>

                                            {{ $user->updated_at->format('h:i a') }}
                                        </small>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-warning font-weight-bold">There is no User</td>
                                    </tr>
                                @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center my-1 bg-light pt-2 px-2 rounded shadow-sm">
                        <div class="m-1">
                            <span class="font-weight-bold">Total: {{$users->total()}}</span>
                        </div>
                        <div class="m-1">
                            {{ $users->appends(request()->all())->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('foot')
    <script>
        function askConfirm(id) {
            Swal.fire({
                title: 'Are you sure to permit admin role?',
                text: "The user can get admin rights",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#001d3d',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'User Role Updated!',
                        'Successfully updated.',
                        'success'
                    )
                    setTimeout(function() {
                        $("#form" + id).submit(); //form submit with jQuery

                    }, 1000)
                }
            })
        }

        function banUser(id) {
            Swal.fire({
                title: 'Are you sure to Ban this user?',
                text: "The user can not acces this application",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#001d3d',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'User has been banned!',
                        'Success bann.',
                        'success'
                    )
                    setTimeout(function() {
                        $("#banForm" + id).submit(); //form submit with jQuery

                    }, 1000)
                }
            })
        }

        function restoreUser(id) {
            Swal.fire({
                title: 'Are you sure to Restore this user?',
                text: "The restricted user can acces this application",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#001d3d',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'User has been restored!',
                        'Success restoring.',
                        'success'
                    )
                    setTimeout(function() {
                        $("#restoreForm" + id).submit(); //form submit with jQuery

                    }, 1000)
                }
            })
        }

        function changePassword(id, name) {
            let url = "{{ route('user-manager.changeUserPassword') }}";
            Swal.fire({
                title: 'Change Password for ' + name,
                input: 'password',
                inputAttributes: {
                    autocapitalize: 'off',
                    required: 'required',
                    minLength: 8
                },
                showCancelButton: true,
                confirmButtonText: 'Change',
                showLoaderOnConfirm: true,
                preConfirm: function(newPassword) { //if click the change button , newPassword is input box value
                    console.log(id, newPassword);
                    $.post(url, { //post the user id , password, and csrf token
                        id: id,
                        password: newPassword,
                        _token: "{{ csrf_token() }}" //like @csrf in form
                    }).done(function(data) { //get server size data
                        console.log(data);
                        if (data.status == 200) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: data.message
                            })
                        } else {
                            console.log(data);
                            Swal.fire({
                                icon: "error",
                                text: data.message.password[0]
                            })
                        }
                    });
                }
            })
        }
    </script>
@endsection
