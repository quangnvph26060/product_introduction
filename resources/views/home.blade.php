@extends('client.layouts.app')

@section('title', 'Trang chủ')

@section('content')

    <div class="pro_bc">
        <div class="gy pro_c">
            <div class="pro_tit">
                <b>Sàn Lipin · <span>Trung tâm sản phẩm</span></b>
                <p>Đầy đủ chủng loại để đáp ứng nhu cầu đa dạng của các công ty kỹ thuật</p>
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
