<tr id="product-list" class="product-list">
    @foreach ($products as $item)
        <td align=center style=padding-left:5px;>
            <a href=wproducts_content-262678.html>
                <img src='{{ asset($item->main_image) }}' width="300" height="300" border=0
                    alt="{{ $item->name }}">
            </a><br>
            <div style=padding-top:5px;>
                <a href=wproducts_content-262678.html title="{{ $item->name }}">
                    {{ $item->name }}</a>
            </div>
        </td>
    @endforeach

    {{-- <td align=center style=padding-left:5px;>
            <a href=wproducts_content-262678.html>
                <img src='{{ asset('assets/client-assets/image/20231024/20231024102435_182377276.png') }}' width="300"
                    height="300" border=0 alt="Wood-based anti-static floor 88 passed">
            </a><br>
            <div style=padding-top:5px;>
                <a href=wproducts_content-262678.html title="Wood-based anti-static floor 88 passed">
                    Wood-based</a>
            </div>
        </td>
        <td align=center style=padding-left:5px;>
            <a href=wproducts_content-262678.html>
                <img src='{{ asset('assets/client-assets/image/20231024/20231024102435_182377276.png') }}'
                    width="300" height="300" border=0 alt="Wood-based anti-static floor 88 passed">
            </a><br>
            <div style=padding-top:5px;>
                <a href=wproducts_content-262678.html title="Wood-based anti-static floor 88 passed">
                    Wood-based</a>
            </div>
        </td> --}}

</tr>