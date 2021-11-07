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
                    <div class="d-lg-flex d-md-flex justify-content-between align-items-center ">
                        <div class="">
                            {{ $items->appends(Request::all())->links() }}
                        </div>
                        <div class="mb-2">
                            <form action="{{ route('item.index') }}" method="get">
                                <div class="d-flex">
                                    <input type="text" class="form-control mr-2" name="search" placeholder="Enter title or description">
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
                            @foreach ($items as $item)
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
                                    <td>{{ $item->getCategoryName->title }}</td>
                                    <td>{{ $item->getUser->name }}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('item.show', $item->id) }}"
                                            class="btn btn-sm btn-sm btn-success rounded"><i class="feather-info"></i></a>
                                        <a href="{{ route('item.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm rounded">
                                            <i class="feather-edit-2"></i>
                                        </a>
                                        <button type="submit" form="del{{ $item->id }}"
                                            class="btn btn-sm btn-danger btn-sm rounded"><i
                                                class="feather-delete"></i></button>
                                        <form action="{{ route('item.destroy', $item->id) }}"
                                            id="del{{ $item->id }}" method="post">
                                            @csrf
                                            @method("delete")
                                        </form>
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $items->appends(Request::all())->links() }}
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
