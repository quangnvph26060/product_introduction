@extends('client.layouts.app')

@section('title', cachedTranslate('Chi tiết sản phẩm', \App::getLocale()) )
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <div class="pro_bc">
        <div class="gy pro_c">
            <div class="pro_ic">
                @include('partials.left-box')
                <div class="prod_dh1 pro_rc">
                    <div class="prod2 ">
                        <div class="row">
                            <div class="bg-light p-4">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/">{{ cachedTranslate('Home', \App::getLocale()) }}</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('product') }}">{{ cachedTranslate('Product', \App::getLocale()) }}</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('product.category' , $productDetail->category->id) }}">{{ cachedTranslate($productDetail->category->name, \App::getLocale()) }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ cachedTranslate($productDetail->name, \App::getLocale()) }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <div id="carouselExample" class="carousel slide mt-3">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset($productDetail->main_image) }}" height="414"
                                                class="d-block w-100" alt="{{ $productDetail->name }}">
                                        </div>
                                        @if ($productDetail->images->count() > 0)
                                            @foreach ($productDetail->images as $item)
                                                <div class="carousel-item">
                                                    <img src="{{ asset($item->image_path) }}" height="414"
                                                        class="d-block w-100" alt="{{ $productDetail->name }}">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    @if ($productDetail->images->count() > 0)
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExample" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">{{ cachedTranslate('Previous', \App::getLocale()) }}</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExample" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">{{ cachedTranslate('Next', \App::getLocale()) }}</span>
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="bg-body-secondary mt-3" style="height: 414px">
                                    <h1 class="text-center py-3">{!! cachedTranslate($productDetail->short_description, \App::getLocale()) !!}</h1>
                                    <div class="p-3" style="line-height: 1.8">

                                        {!! cachedTranslate($productDetail->short_description, \App::getLocale()) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-4">
                                <h2 class="text-center bg-danger py-4 text-light fs-1">Details</h2>
                            </div>
                            <div style="box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);">
                                <p class="p-4">
                                    {!! cachedTranslate($productDetail->long_description, \App::getLocale()) !!}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script> --}}
    <style>
        ul{
            padding: 0px;
        }
        a{
            text-decoration-line: none;
        }
    </style>
@endsection
