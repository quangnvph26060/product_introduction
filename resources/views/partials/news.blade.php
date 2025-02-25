<div class="new_bc">
    <div class="gy news_c">
        <div class="new_tit">
            <div class="ser_tit">
                <b>Tin tức</b>
                <p></p>
            </div>
            @if ($newsCategoryHome->count() > 0)
                <div class="news_nav">
                    <ul>
                        @foreach ($newsCategoryHome as $item)
                        <li class="{{ $loop->first ? 'on' : '' }}">
                            <a href="wdgweb-19806.html"><span class="iconftb">&#xe682;</span><b>{{ $item->name }}</b></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div style="font-size: 30px;">
                    Không có tin tức nào hết !
                </div>
            @endif
        </div>
        <div class="news_cc">
            @include('partials/box/box_news');
        </div>
    </div>
</div>
