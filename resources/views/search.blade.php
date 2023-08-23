@extends('layouts.master')
@section('title')
    Kết quả tìm kiếm cho {{ $key }}
@endsection
@section('content')
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom">
        <div class="container text-center py-5">
            <h1 class="text-white">Tìm kiếm</h1>
            <div class="h5 text-white">Home <i class="zmdi zmdi-chevron-right"></i><i class="zmdi zmdi-chevron-right"></i> Kết
                quả tìm kiếm</div>
        </div>
    </div>
    <div class="container">
        <form action="{{ route('search') }}" method="get" class="">
            <div class="form-group">
                <input type="text" name="key" class="form-control" placeholder="Nhập từ khóa ..." value="{{ $key }}">
            </div>
            <div class="form-group">
                <select name="type" class="form-control">
                    <option value="courses" {{ $type == 'courses' ? 'selected' : false }}>Khóa học</option>
                    <option value="instruments" {{ $type == 'instruments' ? 'selected' : false }}>Sản phẩm</option>
                    <option value="services" {{ $type == 'services' ? 'selected' : false }}>Dịch vụ</option>
                    <option value="posts" {{ $type == 'posts' ? 'selected' : false }}>Bài viết</option>
                </select>
            </div>
            <button type="submit" class="btn btn-danger">Tìm
                kiếm</button>
        </form>
    </div>
    <div class="container mt-5">
        <div class="mt-3 row search">
            @if ($type == 'courses')
                @foreach ($results as $result)
                    <div class="col-sm-4 mt-3">
                        <div class="img">
                            <img src="{{ asset($result->image) }}" class="w-100" alt="">
                        </div>
                        <div class="border px-3">
                            <div class="h5 font-weight-bold mt-2">
                                <a href="{{ route('course.show', ['id' => $result->id, 'slug' => $result->slug]) }}"
                                    class="link-1">{{ $result->name }}</a>
                            </div>
                            <div class="show-3-line">
                                {!! $result->content !!}
                            </div>
                            <div class="d-flex justify-content-between mt-2 pb-2">
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @if ($type == 'instruments')
                @foreach ($results as $result)
                    <div class="col-sm-4 mt-3">
                        <div class="img">
                            <img src="{{ asset($result->image) }}" class="w-100" alt="">
                        </div>
                        <div class="border px-3">
                            <div class="h5 font-weight-bold mt-2">
                                <a href="{{ route('instrument.show', ['id' => $result->id, 'slug' => $result->slug]) }}"
                                    class="link-1">{{ $result->name }}</a>
                            </div>
                            <div class="show-3-line">
                                {!! $result->description !!}
                            </div>
                            <div class="d-flex justify-content-between mt-2 pb-2">
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @if ($type == 'services')
                @foreach ($results as $result)
                    <div class="col-sm-4 mt-3">
                        <div class="img">
                            <img src="{{ asset($result->image) }}" class="w-100" alt="">
                        </div>
                        <div class="border px-3">
                            <div class="h5 font-weight-bold mt-2">
                                <a href="{{ route('service.show', ['id' => $result->id, 'slug' => $result->slug]) }}"
                                    class="link-1">{{ $result->name }}</a>
                            </div>
                            <div class="show-3-line">
                                {!! $result->description !!}
                            </div>
                            <div class="d-flex justify-content-between mt-2 pb-2">
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @if ($type == 'posts')
                @foreach ($results as $result)
                    <div class="col-sm-4 mt-3">
                        <div class="img">
                            <img src="{{ asset($result->image) }}" class="w-100" alt="">
                        </div>
                        <div class="border px-3">
                            <div class="h5 font-weight-bold mt-2">
                                <a href="{{ route('post.show', ['id' => $result->id, 'slug' => $result->slug]) }}"
                                    class="link-1">{{ $result->title }}</a>
                            </div>
                            <div class="show-3-line">
                                {!! $result->content !!}
                            </div>
                            <div class="d-flex justify-content-between mt-2 pb-2">
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @if ($results->count() == 0)
                <div class="d-flex justify-content-center">
                    <p>Không tìm thấy kết quả liên quan</p>
                </div>
            @endif
        </div>
        <div class="container d-flex justify-content-center mt-5">
            {{ $results->links() }}
        </div>
    </div>
@endsection
