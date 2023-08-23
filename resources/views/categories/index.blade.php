@extends('layouts.master')
@section('title')
    Danh mục {{ $categories->name }}
@endsection
@section('content')
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white">{{ $categories->name }}</h1>
            <div class="h5 text-white">Home <i class="zmdi zmdi-chevron-right"></i><i class="zmdi zmdi-chevron-right"></i> Danh
                mục</div>
        </div>
    </div>
    <div class="container">
        <div class="mt-3 row">
            @foreach ($posts as $post)
                <div class="col-sm-4 mb-5">
                    <div class="img">
                        <img src="{{ asset($post->image) }}" class="w-100" alt="">
                    </div>
                    <div class="border px-3">
                        <div class="h5 show-2-line font-weight-bold mt-2">
                            <a href="{{ route('post.show', ['id' => $post->id, 'slug' => $post->slug]) }}" class="link-1">{{ $post->title }}</a>
                        </div>
                        <div class="show-3-line">
                            {!! $post->content !!}
                        </div>
                        <div class="d-flex justify-content-between mt-2 pb-2">
                            <div><i class="zmdi zmdi-account"></i> {{ $post->author->name }}</div>
                            <div><i class="zmdi zmdi-comment-alt"></i> ({{ $post->comments->count() }})</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="container d-flex justify-content-center mt-5">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
