@extends('layouts.master')
@section('title')
    {{ $post->title }}
@endsection
@section('content')
    <!-- Feature Start -->
    <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 mb-5 mb-lg-0">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">
                            {{ $post->category->name }}</h6>
                        <div class="font-weight-bold h1">{{ $post->title }}</div>
                        <div class="text-muted mb-3">
                            by {{ $post->author->name }} |
                            <i class="zmdi zmdi-time"></i>
                            {{ $post->posted_time == null ? date('H:i d/m/Y', strtotime($post->created_at)) : date('H:i d/m/Y', $post->posted_at) }}
                            |
                            <a style="cursor: pointer" data-toggle="modal" data-target="#comment" class="link-1"><i
                                    class="zmdi zmdi-comment-alt"></i> Bình luận
                                ({{ $post->comments->count() }})</a>
                        </div>
                        <img src="{{ asset($post->image) }}" width="100%" alt="">
                    </div>
                    <div class="mt-3">
                        <div class="post-content">
                            {!! $post->content !!}
                            @if ($post->video != null)
                                <iframe width="100%" height="300px"
                                    src="https://www.youtube.com/embed/{{ $post->video }}" title="YouTube video player"
                                    frameborder="0"
                                    allow="accelerometer;
                                    autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="h5 font-weight-bold">Bài viết liên quan</div>
                    @foreach ($rel_posts as $rel_post)
                        <div class="item border-top py-1">
                            <div class="d-flex align-items-center">
                                <div class="img">
                                    <img src="{{ asset($rel_post->image) }}" width="80px">
                                </div>
                                <div class="ml-2">
                                    <div><a href="{{ route('post.show', ['id' => $rel_post->id, 'slug' => $rel_post->slug]) }}"
                                            class="link-1">{{ $rel_post->title }}</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="comment-float">
        <a class="btn btn-comment-float" data-toggle="modal" data-target="#comment" class="link-1"><i
                class="zmdi zmdi-comments"></i> Hỏi đáp - thảo luận</a>
    </div>
    <!-- The Modal -->
    <div class="modal fade" id="comment">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Bình luận</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <button data-toggle="collapse" data-target="#demo" class="btn btn-primary">Thêm bình luận</button>
                    <div id="demo" class="collapse">
                        <form action="{{ route('post.comment') }}" method="post" class="bg-light p-3">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Nhập họ tên *"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Nhập địa chỉ email *"
                                    required>
                            </div>
                            <div class="form-group">
                                <textarea rows="4" class="form-control" name="content" placeholder="Nhập nội dung bình luận *" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                            </div>
                        </form>
                    </div>
                    <div class="main mt-5">
                        @forelse ($post->comments as $comment)
                            <div class="item d-flex border-top border-bottom py-3">
                                <div class="img">
                                    <img src="{{ asset('img/user-3296.png') }}" width="55px" class="rounded-circle"
                                        alt="">
                                </div>
                                <div class="ml-3">
                                    <div class="d-flex align-items-center">
                                        <div class="mr-2 font-weight-bold">{{ $comment->name }}</div> -
                                        <div class="ml-2 mr-2">{{ date('H:i d/m/Y', strtotime($comment->created_at)) }}
                                        </div>
                                        @auth
                                            <form action="{{ route('post.comment.delete', ['id' => $comment->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary btn-sm">Xóa</button>
                                            </form>
                                        @endauth
                                    </div>
                                    <div>{{ $comment->content }}</div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center">
                                Bài viết chưa có bình luận nào
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- Feature Start -->
@endsection
@section('styles')
    <style>
        .comment-float {
            position: fixed;
            bottom: 35px;
            left: 65%;
            z-index: 1000;
        }

        .btn-comment-float {
            border: 2px solid #dc3545;
            border-radius: 40px;
            color: #dc3545;
            background-color: #fff;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
        }

        .btn-comment-float:hover {
            background-color: #dc3545;
            color: #fff;
        }

        @media only screen and (max-width: 768px) {
            .comment-float {
                left: 0;
                right: 0;
                text-align: center;
            }
        }
    </style>
@endsection
