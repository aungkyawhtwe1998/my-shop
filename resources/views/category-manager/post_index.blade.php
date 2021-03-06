@extends('layouts.app')
@section('title')
    Post Categories
@endsection
@section('content')
    <div class="container-fluid bg-light rounded">
        <x-bread-crumb>
            <li class="breadcrumb-item active" aria-current="page">Post Categories</li>
        </x-bread-crumb>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <span><i class="feather-list"></i>Post Category Manager</span>
                        <hr>
                        <form action="{{ route('post-category.store') }}" method="POST">
                            @csrf
                            <div class="form-inline align-items-start">
                                <div class="d-flex flex-column">
                                    <input type="text" class="form-control mr-2" name="title" placeholder="Enter Category Name"
                                           required>
                                    @error('title')
                                    <small class="font-weight-bold text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                <button class="btn btn-primary">Add</button>
                            </div>

                        </form>
                        <hr>
                        <table class="table table-hover">
                            <thead>
                            <th>#</th>
                            <th>Title</th>
                            <th>User</th>
                            <th>Owner</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            </thead>
                            <tbody>
                            @forelse ($postCategory as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>@isset($category->getUser->name) {{$category->getUser->name}} @endisset</td>
                                    <td class="text-nowrap">
                                        <form class="d-inline-block"
                                              action="{{ route('post-category.destroy', $category->id) }}" method="post"
                                              id="deleteForm{{ $category->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $category->id }}">
                                            <button type="button" class="btn btn-sm btn-danger rounded"
                                                    onclick="deleteCategory({{ $category->id }})"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                        <button class="btn btn-warning btn-sm rounded"
                                                onclick="changeCategoryName({{ $category->id }},'{{ $category->title }}')"><i
                                                class="fa fa-edit"></i></button>
                                    </td>
                                    <td>
                                        <i class="feather-calendar"></i>
                                        {{ $category->created_at->format('d F Y') }}
                                        <br>
                                        <i class="feather-clock"></i>
                                        {{ $category->created_at->format('h:i') }}
                                    </td>
                                    <td>
                                        <i class="feather-calendar"></i>
                                        {{ $category->updated_at->format('d F Y') }}
                                        <br>

                                        <i class="feather-clock"></i>
                                        {{ $category->updated_at->format('h:i') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-warning font-weight-bold">There is no Category</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('foot')
    <script>
        function deleteCategory(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "to delete this Category",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#001d3d',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Category removed!',
                        'Success.',
                        'success'
                    )
                    setTimeout(function() {
                        $("#deleteForm" + id).submit(); //form submit with jQuery
                    }, 1000)
                }
            })
        }

        function changeCategoryName(id, name) {
            let url = "{{ route('post-category.update') }}";
            Swal.fire({
                title: 'Change: ' + name + ' to',
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off',
                    required: 'required',
                    minLength: 8
                },
                showCancelButton: true,
                confirmButtonText: 'Change',
                showLoaderOnConfirm: true,
                preConfirm: function(newName) { //if click the change button , newPassword is input box value
                    console.log(id, newName);
                    $.post(url, { //post the user id , password, and csrf token
                        id: id,
                        name: newName,
                        _token: "{{ csrf_token() }}" //like @csrf in form
                    }).done(function(data) { //get server size data
                        console.log(data);
                        if (data.status == 200) {
                            Swal.fire({
                                icon: "success",
                                title: "Success",
                                text: data.message
                            });
                            location.reload();
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
