@extends('blog.master')
@section('title')
    Detail
@endsection
@section('content')
    {{-- breadcrumb --}}
    <div class="row mt-4">
        <div class="font-weight-bold">
            <x-host-bread-crumb>
                <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">all blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ Str::substr($post->name, 0, 30) }} <span> ...</span></li>
            </x-host-bread-crumb>
        </div>
    </div>
    {{-- end breadcrumb --}}

    {{-- main post --}}
    <div class="bg-white mb-1">
        <h4 class="text-black fw-bold">{{ $post->name }}</h4>
        <div class="">
            <div class="mt-2 d-flex justify-content-between align-items-center">
                <div>
                    @if($post->users->photo)
                        <img alt="" src="{{asset('storage/profile/'.$post->users->photo)}}" width="30" height="30" class="avatar avatar-50 photo rounded-circle">
                    @else
                        <img alt="" src="{{asset('img/user.png')}}" class="avatar avatar-50 photo rounded-circle" height="50" width="50"
                             loading="lazy">
                    @endif

                    <a href="{{route("blogs.baseOnUser",$post->user_id)}}" class="badge badge-pill bg-primary">
                    @isset($post->users->name ) {{$post->users->name }} @endisset
                </a>
                    <a href="{{route('blogs.baseOnDate',$post->created_at->format("Y-m-d"))}}" class="badge badge-pill bg-success">
                    <i class="feather-calendar"></i>
                    {{ $post->created_at->diffForHumans() }}
                </a>
                    <span class="badge badge-pill bg-dark">
                    <i class="feather-eye"></i>
                    1.4K
                </span>
                </div>
                <a href="{{route('blogs.showByCategory',$post->category_id)}}" class="badge badge-pill bg-dark">{{$post->categories->title}}</a>

            </div>
            <div class="my-1">
                @isset($post->thumbnail->location)
                    <img class="w-100"
                        src="{{ asset('storage/post-cover/' . $post->thumbnail->location) }}">
                    </img>
                @endisset
            </div>
            <p>
                {!!html_entity_decode($post->description)!!}
            </p>

            <hr>
        </div>
        {{--    Read ALL --}}
        <div class="nav d-flex justify-content-between p-3">

            <a href="{{isset($previousPost) ? route('blogs.show',$previousPost->slug) : '#'}}"
               class="btn btn-outline-primary page-mover rounded-circle @empty($previousPost) disabled @endempty">
                <i class="feather-chevron-left"></i>
            </a>

            <a class="btn btn-outline-primary px-3 rounded-pill" href="{{route('blogs.index')}}">
                Read All
            </a>

            <a href="{{isset($nextPost)? route('blogs.show',$nextPost->slug) : '#'}}"
               class="btn btn-outline-primary page-mover rounded-circle @empty($nextPost) disabled @endempty">
                <i class="feather-chevron-right"></i>
            </a>
        </div>
        <hr>
        {{--    End Read All--}}
    </div>
    {{-- end main post --}}

    {{-- comments View --}}
    <div class="row p-1 rounded">
        <div class="col-12">
            <h4 class="text-center fw-bold">Comments</h4>
            @forelse($post->getComments as $comment)
                <div class="bg-light shadow-sm mb-2 shadow-sm rounded">
                    <div class="d-flex p-2 justify-content-start align-items-center">
                        <div class="">
                            <img src="{{asset('img/user.png')}}" width="50" height="50">
                        </div>
                        <div class="ml-2 w-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-primary fw-bold">{{ $comment->user_name }}</span>
                                <span class="badge bg-primary">{{ $comment->created_at->diffForHumans() }} </span>
                            </div>
                            <p class="text-black">{{ $comment->message }} </p>
                        </div>
                    </div>
                </div>
            @empty
                <h5>No comment</h5>
            @endforelse
        </div>
    </div>
    {{-- End comments View --}}

    {{-- write comment --}}
    <div class="row mt-1 p-1 rounded">
        <div class="col-12">
            <div class="card border border-secondary shadow-sm">
                <div class="card-header"> <h4>Write your comment here</h4></div>
                <div class="card-body">
                    <form action="{{ route('comment.store') }}" class="" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}" id="">
                        <div class="row d-flex mb-2">
                            <div class="col-12 col-md-6 col-lg-6 mb-2">
                                <input type="text" name="email" class="form-control " placeholder="Enter email">
                                @error('email')
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 mb-2">
                                <input type="text" name="name" class="form-control" placeholder="Enter name">
                                @error('name')
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12">
                                    <textarea name="message" class="form-control" rows="5" id=""
                                              placeholder="Enter comment"></textarea>
                                @error('message')
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <button class="btn w-100 btn-primary">Send</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
    {{--    End Write Comment--}}



    {{--    Related Posts--}}
    <div class="row">
        <div class="col-12">
            <div class="p-1 mt-2 text-center">
                <h4 class="fw-bold">Articles, you may like</h4>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($related_posts as $post)
            <div class="col-12 col-lg-6 col-md-6">
                <div class="blog">
                    <div class="card-body">
                        <div class="rounded show-thumbnail"
                             style="background-image:url('{{ asset('storage/post-cover/' . $post->thumbnail->location) }}'); width:100%; height: 200px; background-size: cover; background-position: center;">
                        </div>
                        <div class="mt-2">
                            @if($post->users->photo)
                                <img alt="" src="{{asset('storage/profile/'.$post->users->photo)}}" width="30" height="30" class="avatar avatar-50 photo rounded-circle">
                            @else
                                <img alt="" src="{{asset('img/user.png')}}" class="avatar avatar-50 photo rounded-circle" height="50" width="50"
                                     loading="lazy">
                            @endif

                            <span class="badge bg-success">
                                @isset($post->users->name ) {{$post->users->name }} @endisset
                            </span>
                            <span class="badge badge-pill bg-info">
                                <i class="feather-calendar"></i>
                                {{ $post->created_at->diffForHumans() }}
                            </span>
                            <span class="badge badge-pill bg-dark">
                                <i class="feather-eye"></i>
                                1.4K
                            </span>
                        </div>
                        <div class="my-2 text-left">
                            <i class="fas fa-blog text-dark "></i>
                            <span class="mytext text-dark fw-bold">{{ Str::substr($post->name, 0, 45) }} ...
                                <a
                                    href="{{ route('blogs.show',  $post->slug) }}">Read More

                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{--    End Related Posts--}}
@endsection
