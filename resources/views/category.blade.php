@extends('client.layouts.app')

@section('title', 'Danh mục sản phẩm')

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
                            @if ($getProductByCategoryId->count())
                                @foreach ($getProductByCategoryId->chunk(3) as $chunk)
                                    <tr>
                                        @foreach ($chunk as $product)
                                            <td align=center style=padding-left:5px;>
                                                <a href="{{ route('product.detail', $product->id) }}">
                                                    <img src='{{ asset($product->main_image) }}' width="300" height="300"
                                                        border=0 alt="{{ $product->name }}">
                                                </a><br>
                                                <div style=padding-top:5px;>
                                                    <a href="{{ route('product.detail', $product->id) }}"
                                                        title="{{ $product->name }}">
                                                        {{ $product->name }}</a>
                                                </div>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            @else
                                <div>Không có sản phẩm nào !</div>
                            @endif


                        </table>
                    </div>
                </div>
                {{-- <div>{{ $getProductByCategoryId->links() }}</div> --}}
            </div>
        </div>
    </div>
@endsection
