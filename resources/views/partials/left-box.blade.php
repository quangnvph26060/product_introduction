<div class="left_box">
    <div class="ldh">
        <div class="ldh_z">
            <span>Danh mục sản phẩm </span>
        </div>
    </div>
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


            {{-- <li class="has_two_class"><a class="one_a nLi" href="wproducts-32238-0.html#center"
                    title="Classification by material">Classification by material</a>
                <ul class="two_class_box">
                    <li><a class="two_a nLi" href="wproducts-32242-32238.html#center"
                            title="OA network raised floor">OA network raised floor</a></li>
                    <li><a class="two_a nLi" href="wproducts-32243-32238.html#center"
                            title="All steel anti static floor">All steel anti static floor</a></li>
                    <li><a class="two_a nLi" href="wproducts-32244-32238.html#center"
                            title="Ceramic anti-static floor">Ceramic anti-static floor</a></li>
                    <li><a class="two_a nLi" href="wproducts-32245-32238.html#center"
                            title="PVC anti-static floor">PVC anti-static floor</a></li>
                    <li><a class="two_a nLi" href="wproducts-32246-32238.html#center"
                            title="Wood-based anti-static floor">Wood-based anti-static floor</a></li>
                    <li><a class="two_a nLi" href="wproducts-32247-32238.html#center"
                            title="Aluminum alloy anti-static floor">Aluminum alloy anti-static
                            floor</a></li>
                    <li><a class="two_a nLi" href="wproducts-32248-32238.html#center"
                            title="Calcium sulfate six sided steel clad network floor">Calcium sulfate
                            six sided steel clad network floor</a></li>
                    <li><a class="two_a nLi" href="wproducts-32249-32238.html#center"
                            title="Calcium sulfate anti-static floor">Calcium sulfate anti-static
                            floor</a></li>
                    <li><a class="two_a nLi" href="wproducts-32250-32238.html#center"
                            title="Glass view raised floor">Glass view raised floor</a></li>
                    <li><a class="two_a nLi" href="wproducts-32251-32238.html#center"
                            title="Elevated ventilation and anti-static floor">Elevated ventilation and
                            anti-static floor</a></li>
                    <li><a class="two_a nLi" href="wproducts-32252-32238.html#center"
                            title="GRC/plastic network flooring">GRC/plastic network flooring</a></li>
                    <li><a class="two_a nLi" href="wproducts-32253-32238.html#center"
                            title="Computer room color steel wall panel">Computer room color steel wall
                            panel</a></li>
                </ul>
            </li> --}}
        </ul>
    </div>
</div>

<style>
        .category-item{
           cursor: pointer;
        }
</style>
