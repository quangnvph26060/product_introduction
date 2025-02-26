@extends('client.layouts.app')

@section('title', cachedTranslate('Trang chủ', \App::getLocale()) )
@section('content')

    <div class="pro_bc">
        <div class="gy pro_c">
            <div class="pro_tit">
                <b>{{ cachedTranslate('Sàn Lipin ·', \App::getLocale()) }} <span>{{ cachedTranslate('Trung tâm sản phẩm', \App::getLocale()) }}</span></b>
                <p>{{ cachedTranslate('Đầy đủ chủng loại để đáp ứng nhu cầu đa dạng của các công ty kỹ thuật ·', \App::getLocale()) }}</p>
            </div>
            <div class="pro_ic">
                @include('partials.left-box')
                <div class="prod_dh1 pro_rc">
                    <div class="prod2">
                        <table width=100% border=0 align=center cellpadding=0 cellspacing=0>

                            @include('partials/box/box_product')

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.product_advantages')
    {{-- @include('partials.box_advantages') --}}
    @include('partials.engineering_cases')
    @include('partials.reputation')
    @include('partials.service_process')
    @include('partials.news')
    @include('partials.about')
    @include('partials.workshop')

@endsection
