<div class="plan">
    <div class="pro_tit pro_tit2">
        <b>{{ cachedTranslate('Sàn Lipin', \App::getLocale()) }} <span>{{ cachedTranslate('Năm ưu điểm của sản phẩm', \App::getLocale()) }}</span></b>
        <p>{{ cachedTranslate('Chúng tôi tập trung vào chất lượng, vượt xa trí tưởng tượng của bạn', \App::getLocale()) }}</p>
    </div>

    <div class="plan_main">
{{-- cur --}}
    @include('partials.box.box_advantages')
    </div>
</div>
