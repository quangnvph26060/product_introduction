<div class="footer_bg">
    <div class="gy footer">
        <ul class="foo_icon" style="    padding: 0px 21">
            <li>
                <span class="iconftb">&#xe676;</span>
                <div>
                    <b>{{ cachedTranslate ('Dịa chỉ', \App::getLocale()) }}</b>
                    <p>{{ $configWebsite->address }}</p>
                </div>
            </li>
            <li>
                <span class="iconftb">&#xe857;</span>
                <div>
                    <b>{{ cachedTranslate ('Số điện thoại', \App::getLocale()) }}</b>
                    <p>{{ $configWebsite->phone }}</p>
                </div>
            </li>
            <li>
                <span class="iconftb">&#xe68c;</span>
                <div>
                    <b>{{ cachedTranslate ('Liên hệ', \App::getLocale()) }}</b>
                    <p>{{ $configWebsite->phone }}</p>
                </div>
            </li>
            <li>
                <span class="iconftb">&#xe777;</span>
                <div>
                    <b>{{ cachedTranslate ('Liên hệ đường dây nóng', \App::getLocale()) }}</b>
                    <p>{{ $configWebsite->phone }}</p>
                </div>
            </li>
        </ul>
        <div class="banq">
            <ul class="bq_item">
                <li>
                    <a href="{{ route('product') }}" class="footer_t">{{ cachedTranslate ('Sản phẩm', \App::getLocale()) }}</a>
                    <div class="clear"></div>
                    @foreach ($productsFooter as $item)
                        <a href="{{ route('product.detail', $item->id) }}">{{ $item->name }}</a>
                    @endforeach
                    <a href="{{ route('product') }}">{{ cachedTranslate ('Xem thêm+', \App::getLocale()) }}</a>
                </li>
                <li>
                    <a href="#" class="footer_t">{{ cachedTranslate ('Sản phẩm', \App::getLocale()) }}c</a>
                    <div class="clear"></div>
                    @foreach ($newsCategoryHome as $item)
                        <a href="">{{ $item->name }}</a>
                    @endforeach

                </li>
                <li>
                    <a href="#" class="footer_t">{{ cachedTranslate ('Tin tức', \App::getLocale()) }}</a>
                    <div class="clear"></div>
                    @foreach ($listPostFooter as $item)
                        <a href="{{ route('post.detail', $item->title) }}">{{ cachedTranslate ($item->title, \App::getLocale()) }}</a>
                    @endforeach
                </li>
            </ul>
            {{-- <ul class="bq_gzh">
                <li>
                    <img src="{{ asset('assets/client-assets/image/20231011/20231011103308_498786663.png') }}"
                        alt="Mobile station QR code">
                    <p>Mã QR trạm di động</p>
                </li>
                <li>
                    <img src="{{ asset('assets/client-assets/image/20231011/20231011103308_111776885.png') }}"
                        alt="WeChat QR code">
                    <p>Mã QR WeChat</p>
                </li>
            </ul> --}}
        </div>
        <div class="cl"></div>
    </div>
</div>
<div class="copy_bg">
    <div class="gy copy_b">

        <div>{{ $configWebsite->footer }}</div>

        <div>
            {{ cachedTranslate ('Hỗ trợ kỹ thuật', \App::getLocale()) }} : {{ $configWebsite->email }}</a>
        </div>

    </div>
</div>
