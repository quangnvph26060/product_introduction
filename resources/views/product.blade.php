@extends('client.layouts.app')

@section('title', 'Sản Phẩm')

@section('content')

    <div class="pro_bc">
        <div class="gy pro_c">
            <div class="pro_tit">
                <b>Lipin Flooring · <span>Product Center</span></b>
                <p>Complete variety to meet the various needs of engineering companies</p>
            </div>
            <div class="pro_ic">
                @include('partials.left-box')
                <div class="prod_dh1 pro_rc">
                    <div class="prod2">
                        <table width=100% border=0 align=center cellpadding=0 cellspacing=0>
                            @include('partials.product')
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
