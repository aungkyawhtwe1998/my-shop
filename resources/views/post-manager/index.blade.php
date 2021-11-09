@extends('layouts.app')
@section('title')
    Items
@endsection

@section('content')
<div class="container-fluid bg-light">
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Items</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12">
            <div class="card rounded shadow">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4><i class="feather-layers"></i> All Posts</h4>
                        <a class="btn btn-outline-primary btn-lg" href="{{route('post.create')}}">Create New </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-lg-flex d-md-flex justify-content-between align-items-center mb-2">
                        <div class="d-flex justify-content-center align-items-center">
                            @isset(request()->search)
                                <a href="{{route('post.index')}}" class="btn btn-outline-primary"><i class="feather-layers"></i> Show All</a>
                                <span class="text-primary font-weight-bold ml-3">Search By: {{request()->search}}</span>
                            @endisset
                        </div>
                        <div class="">
                            <form action="{{ route('post.index') }}" method="get">
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
                        @forelse($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->name }}</td>
                                <td>
                                    {{-- {{Str::words(html_entity_decode($post->description), 100)}}--}}
                                    {!!substr(html_entity_decode($post->description), 0, 200)!!}
                                </td>
                                <td>{{ $post->getCategoryName->title }}</td>
                                <td>@isset($post->getUser->name) {{ $post->getUser->name }} @endisset</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('post.show', $post->id) }}"
                                       class="btn btn-sm btn-sm btn-primary rounded"><i class="feather-info"></i></a>
                                    <a href="{{ route('post.edit', $post->id) }}"
                                       class="btn btn-warning btn-sm rounded">
                                        <i class="feather-edit-2"></i>
                                    </a>
                                    <button type="submit" form="del{{ $post->id }}"
                                            class="btn btn-sm btn-danger btn-sm rounded"><i
                                            class="fa fa-trash"></i></button>
                                    <form action="{{ route('post.destroy', $post->id) }}" id="del{{ $post->id }}"
                                          method="post">
                                        @csrf
                                        @method("delete")
                                    </form>
                                </td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-warning font-weight-bold">There is no post</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center my-1 bg-light pt-2 px-2 rounded shadow-sm">
                        <div class="m-1">
                            <span class="font-weight-bold">Total: {{$posts->total()}}</span>
                        </div>
                        <div class="m-1">
                            {{ $posts->appends(request()->all())->links() }}
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

    </script>
@endsection
