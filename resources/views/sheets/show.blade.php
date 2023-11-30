@extends('layouts.master')
@section('title')
    {{ $sheet->name }}
@endsection
@section('content')
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white">Sheet nhạc</h1>
            <div class="h5 text-white">Home <i class="zmdi zmdi-chevron-right"></i><i class="zmdi zmdi-chevron-right"></i> Khóa
                học <i class="zmdi zmdi-chevron-right"></i><i class="zmdi zmdi-chevron-right"></i> {{ $sheet->name }}
            </div>
        </div>
    </div>
    <!-- Detail Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <div class="section-title position-relative d-flex justify-content-between">
                            <div class="col-4">
                                <a href="{{ asset($sheet->image) }}" target="_blank">
                                    <img class="w-100 mb-4" src="{{ asset($sheet->image) }}" alt="Image">
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="ml-3"><span class="h3">{{ $sheet->name }}</span>
                                    <div class="mt-3 h5"><x-price :price='$sheet->price' :discount='$sheet->discount' :to='$sheet->discount_to' />
                                    </div>
                                    <div class="mt-3"><a
                                            href="{{ route('checkout', ['type' => 'Sheet nhạc', 'id' => $sheet->id]) }}"
                                            class="btn btn-primary">Đặt mua ngay</a></div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div>
                            {!! $sheet->description !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="border p-3 mb-3">
                        <div class="font-weight-bold h3 mb-3">
                            Sheet nhạc mới nhất
                        </div>
                        @foreach ($rel_sheets as $sheet)
                            <div class="item border-top py-3">
                                <div class="d-flex">
                                    <div class="img">
                                        <img src="{{ asset($sheet->image) }}" width="45px" alt="">
                                    </div>
                                    <div class="ml-3">
                                        <a href="{{ route('sheet.show', ['id' => $sheet->id, 'slug' => $sheet->slug]) }}"
                                            class="link-1 font-weight-bold">{{ $sheet->name }}</a>
                                        <x-price :price='$sheet->price' :discount='$sheet->discount' :to='$sheet->discount_to' />
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->
@endsection
