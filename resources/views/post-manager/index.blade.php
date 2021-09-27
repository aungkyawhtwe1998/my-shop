@extends('layouts.app')
@section('title')
    Items
@endsection

@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Items</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12">
            <div class="card rounded shadow">
                <div class="card-header">Items List</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <div class="">
                            {{ $posts->appends(Request::all())->links() }}
                        </div>
                        <form action="{{ route('post.index') }}" method="get">
                            <div class="d-flex">
                                <input type="text" class="form-control mr-2" name="search">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>

                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Owner</th>
                                <th>Control</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->name }}</td>
                                    <td>
                                        {!!substr(html_entity_decode($post->description), 0, 200)!!}
                                    </td>
                                    <td>{{ $post->getCategoryName->title }}</td>
                                    <td>{{ $post->getUser->name }}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('post.show', $post->id) }}"
                                            class="btn btn-sm btn-sm btn-success rounded"><i class="feather-info"></i></a>
                                        <a href="{{ route('post.edit', $post->id) }}"
                                            class="btn btn-warning btn-sm rounded">
                                            <i class="feather-edit-2"></i>
                                        </a>
                                        <button type="submit" form="del{{ $post->id }}"
                                            class="btn btn-sm btn-danger btn-sm rounded"><i
                                                class="feather-delete"></i></button>
                                        <form action="{{ route('post.destroy', $post->id) }}" id="del{{ $post->id }}"
                                            method="post">
                                            @csrf
                                            @method("delete")
                                        </form>
                                    </td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('foot')
    <script>

    </script>
@endsection
