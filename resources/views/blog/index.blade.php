@extends('blog.master')
@section('title')
    Blog
@endsection

@section('content')
    <div class="row mt-3">
        <div class="font-weight-bold">
            <x-host-bread-crumb>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </x-host-bread-crumb>
        </div>
    </div>
    <div>
        @forelse($posts as $post)

            <div class="borduserer-bottom mb-4 article-preview">
                <div class="p-0 p-md-3">
                    <a href="{{route('blogs.show',$post->slug)}} " class="display-6 fw-bold">
                        {!! html_entity_decode($post->name) !!}
                    </a>
                    <div class="small post-category">
                        <a href="#" rel="category tag">{{$post->categories->title}}</a>
                    </div>
                    <div class="rounded my-3"
                         style="background-image:url('{{ asset('storage/post-cover/' . $post->thumbnail->location) }}'); width:100%; height: 300px; background-size: cover; background-position: center;">
                    </div>
                    <div class="text-black the-excerpt">
                        <p >
                            {!! substr(html_entity_decode($post->description), 0, 200) !!}
                        </p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center see-more-group">
                        <div class="d-flex align-items-center">
                            @if($post->users->photo)
                                <img alt="" src="{{asset('storage/profile/'.$post->users->photo)}}" width="50" height="50" class="avatar avatar-50 photo rounded-circle">
                            @else
                                <img alt="" src="{{asset('img/user.png')}}" class="avatar avatar-50 photo rounded-circle" height="50" width="50"
                                     loading="lazy">
                            @endif
                            <div class="ms-2">
                            <span class="small fw-bold">
                                @isset($post->users->name ) {{$post->users->name }} @endisset
                            </span>
                                <br>
                                <span class="small text-black-50"> {{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <a href="{{route('blogs.show', $post->slug)}}" class="btn btn-outline-primary rounded-pill px-3">Read more</a>
                    </div>
                    <hr>
                </div>
            </div>
        @empty
            <div class="mb-4 pb-4">
                <div class="py-5 my-5 text-center text-lg-start">
                    <p class="fw-bold text-primary">Dear Viewer</p>
                    <h1 class="fw-bold">
                        There is no article 😔 ...
                    </h1>
                    <p>Please go back to All Articles</p>
                    <a class="btn btn-outline-primary rounded-pill px-3" href="{{route('blogs.index')}}">
                        <i class="fa fa-backward"></i>
                        All Articles
                    </a>

                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex my-2 bg-light rounded p-1 d-lg-none justify-content-center" id="pagination" >
        {{ $posts->appends(Request::all())->onEachside(1)->links() }}
    </div>

@endsection
@section('pagination-place')
    <div class="d-none d-lg-block" id="pagination" >
        {{ $posts->appends(Request::all())->onEachside(1)->links() }}
    </div>
@stop
