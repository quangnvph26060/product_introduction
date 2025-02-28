@foreach ($newsCategoryHome as $newCategory)
    <div class="news_wz">
        <div class="news_div" id="#news_div">
            @if ($newCategory->news->count() > 0)
                @foreach ($newCategory->news()->orderBy('created_at', 'desc')->take(3)->get() as $new)
                    <div class="news_div_item">
                        <div class="news_div_item_date">
                            <div class="news_div_item_year"> {{ $new->created_at->year }} -</div>
                            <div class="news_div_item_month"> {{ $new->created_at->month }} -</div>
                            <div class="news_div_item_day"> {{ $new->created_at->day }} </div>
                        </div>
                        <div class="news_div_item_content">
                            <div class="news_div_item_title">
                                <a class="news_div_item_a" href="{{ route('new.detail' , $new->title) }}">

                                    {{ cachedTranslate($new->title, \App::getLocale()) }}
                                </a>
                            </div>
                            <div class="news_div_item_body">
                                {{ cachedTranslate(\Str::limit(strip_tags(html_entity_decode($new->description)), 100), \App::getLocale()) }}
                            </div>
                        </div>
                        <div class="news_div_item_pic">
                            <a href="{{ route('new.detail' , $new->title) }}">
                                <img src="{{ asset($new->image) }}" class="news_div_item_image"
                                    alt="Anti-static floor is not expensive">
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endforeach
