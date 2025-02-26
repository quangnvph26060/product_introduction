<div class="gc_bc">
    <div class="gy gc_c">
        <div class="pro_tit">
            <b> {{ cachedTranslate('Sàn Lipin · ', \App::getLocale()) }}<span> {{ cachedTranslate('Các trường hợp kỹ thuật', \App::getLocale()) }}</span></b>
            <p>{{ cachedTranslate('Sản phẩm của chúng tôi thâm nhập vào nhiều ngành công nghiệp khác nhau và phấn đấu tạo ra những sản phẩm
                chất lượng cao cho khách hàng · ', \App::getLocale()) }}</p>
        </div>
        @include('partials.box.box-1')
        <div class="gc_ic">
            <div class="gc_lc">
                <div class="news_div">
                    {{-- @include('partials.box.box_cases') --}}
                    <div class="news_div_item">
                        <div class="news_div_item_content">
                            <div class="news_div_item_title">
                                <a class="news_div_item_a" href="{{ route('post.detail' , $firstPost->title) }}">

                                    {{ cachedTranslate($firstPost->title, \App::getLocale()) }}
                                </a>
                            </div>
                            <div class="news_div_item_body">
                                {{ cachedTranslate(\Str::limit(strip_tags(html_entity_decode($firstPost->description)), 100), \App::getLocale()) }}
                            </div>
                        </div>
                        <div class="news_div_item_pic">
                            <a href="{{ route('post.detail' , $firstPost->title) }}">
                                <img src="{{ asset($firstPost->image) }}" class="news_div_item_image"
                                    alt="Shenzhen Liqiao">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gc_rc">

                <div class="news_div">

                    {{-- @include('partials.box.box_cases') --}}
                    @foreach ($listPostHome as $item)
                        <div class="news_div_item">
                            <div class="news_div_item_content">
                                <div class="news_div_item_title">
                                    <a class="news_div_item_a" href="{{ route('post.detail' , $item->title) }}">

                                        {{ cachedTranslate($item->title, \App::getLocale()) }}
                                    </a>
                                </div>
                                <div class="news_div_item_body">

                                    {{ cachedTranslate(\Str::limit(strip_tags(html_entity_decode($item->description)), 100), \App::getLocale()) }}</div>
                            </div>
                            <div class="news_div_item_pic">
                                <a href="{{ route('post.detail' , $item->title) }}">
                                    <img src="{{ asset($item->image) }}" class="news_div_item_image"
                                        alt="{{ $item->title }}">
                                </a>
                            </div>
                        </div>
                    @endforeach


                </div>

                <div class="gc_num">
                    <span class="iconftb gc_prev">&#xe636;</span>
                    <span class="iconftb gc_next">&#xe636;</span>
                </div>
            </div>
        </div>
        <!--par-->
        <div class="par_item">
            <table width=100% border=0 align=center cellpadding=0 cellspacing=0>
                @include('partials/box/box_slider_par_item')
            </table>
        </div>
    </div>
</div>
