@extends('client.layouts.app')

@section('title', cachedTranslate('Danh mục sản phẩm', \App::getLocale()) )

@section('content')

    <div class="pro_bc">
        <div class="gy pro_c">
            <div class="pro_tit">
                <b> {{ cachedTranslate('Lipin Flooring ·', \App::getLocale()) }} <span>{{ cachedTranslate('Product Center', \App::getLocale()) }}</span></b>
                <p>{{ cachedTranslate('Complete variety to meet the various needs of engineering companies', \App::getLocale()) }}</p>
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
                                                        border=0 alt="{{ cachedTranslate($product->name, \App::getLocale()) }}">
                                                </a><br>
                                                <div style=padding-top:5px;>
                                                    <a href="{{ route('product.detail', $product->id) }}"
                                                        title="{{ cachedTranslate($product->name, \App::getLocale()) }}">
                                                        {{ cachedTranslate($product->name, \App::getLocale()) }}
                                                    </a>
                                                </div>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            @else
                                <div>{{ cachedTranslate('Không có sản phẩm nào', \App::getLocale()) }}</div>
                            @endif


                        </table>
                    </div>
                </div>
                {{-- <div>{{ $getProductByCategoryId->links() }}</div> --}}
            </div>
        </div>
    </div>
@endsection
