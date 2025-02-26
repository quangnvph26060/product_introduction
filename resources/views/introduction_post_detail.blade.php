@extends('client.layouts.app')

@section('title', cachedTranslate('Xem bài viết giới thiệu', \App::getLocale()) )
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <div>
        <div class="row">
            <div class="bg-light p-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">{{ cachedTranslate ('Home', \App::getLocale()) }}</a></li>
                        <li class="breadcrumb-item">{{ cachedTranslate ($introPost->introductionCategory->name, \App::getLocale()) }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ cachedTranslate ($introPost->title, \App::getLocale()) }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="p-4">

                {!! cachedTranslate ($introPost->content, \App::getLocale()) !!}
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endsection
