<div class="footer_bg">
    <div class="gy footer">
        <ul class="foo_icon" style="    padding: 0px 21">
            <li>
                <span class="iconftb">&#xe676;</span>
                <div>
                    <b>Dịa chỉ</b>
                    <p>{{ $configWebsite->address }}</p>
                </div>
            </li>
            <li>
                <span class="iconftb">&#xe857;</span>
                <div>
                    <b>Số điện thoại</b>
                    <p>{{ $configWebsite->phone }}</p>
                </div>
            </li>
            <li>
                <span class="iconftb">&#xe68c;</span>
                <div>
                    <b>Liên hệ{{ $configWebsite->name }}</b>
                    <p>{{ $configWebsite->phone }}</p>
                </div>
            </li>
            <li>
                <span class="iconftb">&#xe777;</span>
                <div>
                    <b>Liên hệ đường dây nóng</b>
                    <p>{{ $configWebsite->phone }}</p>
                </div>
            </li>
        </ul>
        <div class="banq">
            <ul class="bq_item">
                <li>
                    <a href="{{ route('product') }}" class="footer_t">Sản phẩm</a>
                    <div class="clear"></div>
                    @foreach ($productsFooter as $item)
                        <a href="{{ route('product.detail', $item->id) }}">{{ $item->name }}</a>
                    @endforeach
                    <a href="{{ route('product') }}">Xem thêm+</a>
                </li>
                <li>
                    <a href="#" class="footer_t">Tin tức</a>
                    <div class="clear"></div>
                    @foreach ($newsCategoryHome as $item)
                        <a href="">{{ $item->name }}</a>
                    @endforeach

                </li>
                <li>
                    <a href="#" class="footer_t">Project Case</a>
                    <div class="clear"></div>
                    @foreach ($listPostFooter as $item)
                        <a href="{{ route('post.detail', $item->title) }}">{{ $item->title }}</a>
                    @endforeach
                </li>
            </ul>
            <ul class="bq_gzh">
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
            </ul>
        </div>
        <div class="cl"></div>
    </div>
</div>
<div class="copy_bg">
    <div class="gy copy_b">

        <div>{{ $configWebsite->footer }}</div>

        <div>
            Hỗ trợ kỹ thuật: <a href="www.114my.html" target="_blank" rel="nofollow">[Dongguan website
                construction]</a>　<a href="guanli.html" target="_blank" rel="nofollow">[Admin]</a>
        </div>

    </div>
</div>
