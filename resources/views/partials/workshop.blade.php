<div class="gy cf_c">
    <ul>
        @foreach ($introductionCategoriesHome as $item)
            <li class="{{ $loop->first ? 'on' : '' }}"><a href="">
                {{ cachedTranslate($item->name, \App::getLocale()) }}
            </a></li>
        @endforeach

    </ul>
    <div class="cf_fc">
        <div class="cf_ic">
            @foreach ($introductionCategoriesHome as $introductionCategory)
                <div class="cf_i on">
                    <table width=100% border=0 align=center cellpadding=0 cellspacing=0>
                        @if ($introductionCategory->introductionPosts->count() > 0)
                            @foreach ($introductionCategory->introductionPosts as $item)
                                <td align=center style=padding-left:5px;>
                                    <a href="{{ route('introduction_post.detail', $item->title) }}">
                                        <img src='{{ asset($item->image) }}' width=1 height=1 border=0
                                            alt={{ $item->title }}>
                                    </a><br>
                                    <div style=padding-top:5px;>
                                        <a href="{{ route('introduction_post.detail', $item->title) }}"
                                            title={{ cachedTranslate($item->title, \App::getLocale()) }}>
                                            {{ cachedTranslate($item->title, \App::getLocale()) }}</a>
                                    </div>
                                </td>
                            @endforeach
                        @endif
                    </table>
                </div>
            @endforeach
        </div>
    </div>

</div>
