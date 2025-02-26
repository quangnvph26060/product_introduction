<div class="left_box">
    <div class="ldh">
        <div class="ldh_z">
            <span>{{ cachedTranslate('Danh mục sản phẩm', \App::getLocale()) }}</span>
        </div>
    </div>
    <div class="left-products">
        <ul class="one_class_box">

            @if (isset($categories))
                @foreach ($categories as $parent)
                    <li class="has_two_class"><a class="one_a nLi" href="{{ route('product.category', $parent->id) }}"
                            title="Classification by use">{{ cachedTranslate($parent->name , \App::getLocale()) }}</a>
                        @if ($parent->children->count() > 0)
                            <ul class="two_class_box">
                                @foreach ($parent->children as $item)
                                    <li><a class="two_a nLi"
                                            href="{{ route('product.category', $item->id) }}"
                                            title="{{ $item->name }}">{{ cachedTranslate($item->name, \App::getLocale()) }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        @endif

                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>

<style>
    .category-item {
        cursor: pointer;
    }
</style>
