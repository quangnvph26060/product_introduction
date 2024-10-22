<div class="left_box">
    <div class="ldh">
        <div class="ldh_z">
            <span>Danh mục sản phẩm</span>
        </div>
    </div>
    {{-- <div>
        <div style="margin: 35px 0px 10px 40px;">
                <a href="">Tất cả sản phẩm</a>
        </div>
    </div> --}}
    <div class="left-products">
        <ul class="one_class_box">

            @if (isset($categories))
                @foreach ($categories as $parent)
                    <li class="has_two_class"><a class="one_a nLi"
                            title="Classification by use">{{ $parent->name }}</a>
                        @if ($parent->children->count() > 0)
                            <ul class="two_class_box">
                                @foreach ($parent->children as $item)
                                    <li><a class="two_a nLi category-item" data-id="{{ $item->id }}"
                                            title="{{ $item->name }}">{{ $item->name }}</a>
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
        .category-item{
           cursor: pointer;
        }
</style>
