<div class="headr">
    <div class="head_hx"></div>
    <div class="h_adw dfsv">
        <div class="logo wow bounceInLeft">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/client-assets/image/20231011/20231011100408_1628586740.png') }}"
                    alt="Guangdong Lipin Flooring Technology Co., Ltd">
            </a>
            {{-- @dd(\App::getLocale()); --}}
            <p>
                <b>{{ cachedTranslate('Nhiều năm tập trung vào sàn chống tĩnh điện và sàn nâng', \App::getLocale()) }}</b>
                <span>{{ cachedTranslate('Nhà cung cấp dịch vụ một cửa chuyên nghiệp cho các giải pháp sàn chống tĩnh điện', \App::getLocale()) }}</span>

            </p>
        </div>
        <div class="nav dfs">
            <ul>
                {!! $menu->render() !!}
            </ul>
            <div class="icon_box dfs fr">

                {{-- <div class="language">
                    <i><img src="{{ asset('assets/client-assets/image/20231129/20231129091853_225640801.png') }}"
                            alt=""><img
                            src="{{ asset('assets/client-assets/image/20231129/20231129091853_2015085027.png') }}"
                            alt=""></i>
                    <a href="http://www.zglpdb.com/" class="en">中文</a>
                </div> --}}

                <div class="icon_tel">
                    <i class="iconftb">&#xe600;</i>
                    <div class="itel_box">
                        <p>{{ cachedTranslate('Đường dây nóng dịch vụ :', \App::getLocale()) }} </p>
                        <em>{{ $configWebsite->phone }}</em>
                        {{-- <em>{{ $configWebsite->phone	 }}</em> --}}
                    </div>
                </div>
                {{-- <div class="icon_search">
                    <i class="iconftb">&#xe603;</i>
                    <div class="iser_box">
                        <h1 class="search_l">
                            <span>Hot Keywords: </span>
                            <a href="wproducts-32238-32243.html">All steel anti static floor</a>|
                            <a href="wproducts-32238-32242.html">OA network raised floor</a>|
                            <a href="wproducts-32238-32244.html">Ceramic anti-static floor</a>|
                            <a href="wproducts-32238-32250.html">Glass view raised floor</a>|
                            <a href="wproducts-32238-32245.html">PVC anti-static floor</a>
                        </h1>
                        <form name="form1" action="https://en.zglpdb.com/wproducts.html" method="get"
                            onsubmit="document.cookie='key_word=' + (encodeURIComponent (document.getElementById('infoname').value));">
                            <ul>
                                <li id="search_bg" class="search_r">
                                    <input name="infoname" id="infoname" style="margin: 1px 0;color:#c5c5c5;"
                                        onfocus="if(this.value=='Enter keywords to search for products'){this.value='';this.style.color='#333'}"
                                        onblur="if(this.value==''){this.value='Enter keywords to search for products';this.style.color='#333'}"
                                        value="Enter keywords to search for products" size="16">
                                    <div class="z">
                                        <input name="imageField" type="image" border="0" alt="Search For"
                                            title="Search For" class="z_img" value=""
                                            src="{{ asset('assets/client-assets/image/20231011/20231011100408_90523581.png') }}">
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div> --}}
            </div>

            <div class="flag-container">
                <a data-lang="vi" class="changeLanguage">
                    <img src="https://flagcdn.com/w40/vn.png">
                </a>
                <a data-lang="zh" class="changeLanguage">
                    <img src="https://flagcdn.com/w40/cn.png" >
                </a>
                <a data-lang="en" class="changeLanguage">
                    <img src="https://flagcdn.com/w40/us.png" >
                </a>
            </div>


        </div>
    </div>
</div>
<style>
    /* Ẩn các mục con */
.menu1 {
    display: none; /* Ẩn menu con */
}

/* Hiển thị các mục con khi di chuột vào mục cha */
.dropdown:hover .menu1 {
    display: block; /* Hiển thị menu con khi di chuột vào */
}
.flag-container {
    display: flex; /* Hiển thị các cờ trên cùng một hàng */
    justify-content: center; /* Căn giữa theo chiều ngang */
    gap: 10px; /* Tạo khoảng cách giữa các lá cờ */
    padding: 10px; /* Thêm khoảng trống xung quanh */
}

.flag-container a {
    display: inline-block; /* Giữ các cờ ở cùng một dòng */
    transition: transform 0.2s ease-in-out; /* Hiệu ứng hover */
}

.flag-container img {
    width: 40px; /* Định kích thước cờ đồng nhất */
    height: auto; /* Đảm bảo tỷ lệ ảnh không bị méo */
    border-radius: 5px; /* Bo tròn nhẹ các góc */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Đổ bóng nhẹ */
    height: 30px;
}

.flag-container a:hover {
    transform: scale(1.1); /* Hiệu ứng phóng to khi di chuột vào */
}

</style>

<script>
    jQuery('.changeLanguage').click(function(event) {
        var url = "{{ route('google.translate.change') }}";
        window.location.href = url + "?lang=" + jQuery(this).data('lang')
    })
</script>
