<div class="headr">
    <div class="head_hx"></div>
    <div class="h_adw dfsv">
        <div class="logo wow bounceInLeft">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/client-assets/image/20231011/20231011100408_1628586740.png') }}"
                    alt="Guangdong Lipin Flooring Technology Co., Ltd">
            </a>
            <p>
                <b>Nhiều năm tập trung vào sàn chống tĩnh điện và sàn nâng</b>
                <span>Nhà cung cấp dịch vụ một cửa chuyên nghiệp cho các giải pháp sàn chống tĩnh điện</span>
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
                        <p>Đường dây nóng dịch vụ: </p>
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

</style>
