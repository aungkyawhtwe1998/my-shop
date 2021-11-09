@extends('layouts.app')
@section('title')
    Items
@endsection

@section('content')
<div class="container-fluid bg-light rounded">
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Items</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card rounded shadow">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4><i class="feather-layers"></i> All Items</h4>
                        <a class="btn btn-outline-primary btn-lg" href="{{route('item.create')}}">Create New </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-lg-flex d-md-flex justify-content-between align-items-center mb-2">
                        <div class="d-flex justify-content-center align-items-center">
                            @isset(request()->search)
                                <a href="{{route('item.index')}}" class="btn btn-outline-primary"><i class="feather-layers"></i> Show All</a>
                                <span class="text-primary font-weight-bold ml-3">Search By: {{request()->search}}</span>
                            @endisset
                        </div>
                        <div class="">
                            <form action="{{ route('item.index') }}" method="get">
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
                        @forelse($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    {{ substr($item->description, 0, 80) }} ...
                                    <br>
                                    @isset($item->getPhotos)

                                        @foreach ($item->getPhotos as $photo)
                                            {{-- {{ $photo->location }} --}}
                                            <div class="item-thumbnail"
                                                 style="background-image:url('{{ asset('storage/items/' . $photo->location) }}')">
                                            </div>
                                        @endforeach
                                    @endisset

                                </td>

                                <td> @isset( $item->getCategoryName->title) {{$item->getCategoryName->title}} @endisset</td>
                                <td>{{ $item->getUser->name }}</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('item.show', $item->id) }}"
                                       class="btn btn-sm btn-sm btn-primary rounded"><i class="feather-info"></i></a>
                                    <a href="{{ route('item.edit', $item->id) }}"
                                       class="btn btn-warning btn-sm rounded">
                                        <i class="feather-edit-2"></i>
                                    </a>
                                    <button type="submit" form="del{{ $item->id }}"
                                            class="btn btn-sm btn-danger btn-sm rounded"><i
                                            class="fa fa-trash"></i></button>
                                    <form action="{{ route('item.destroy', $item->id) }}"
                                          id="del{{ $item->id }}" method="post">
                                        @csrf
                                        @method("delete")
                                    </form>
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-warning font-weight-bold">There is no Item</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center my-1 bg-light pt-2 px-2 rounded shadow-sm">
                        <div class="m-1">
                            <span class="font-weight-bold">Total: {{$items->total()}}</span>
                        </div>
                        <div class="m-1">
                            {{ $items->appends(request()->all())->links() }}
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
