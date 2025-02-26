@for ($i = 1; $i < 10; $i++)
    @foreach ($products->chunk(3) as $chunk)
        <tr>
            @foreach ($chunk as $product)
                <td align=center style=padding-left:5px;>
                    <a href={{ route('product.detail' , $product->id) }}>
                        <img src='{{ asset($product->main_image) }}' width="300" height="300" border=0
                            alt="Wood-based anti-static floor 88 passed">
                    </a><br>
                    <div style=padding-top:5px;>
                        <a href={{ route('product.detail' , $product->id) }} title="Wood-based anti-static floor 88 passed">
                            {{ cachedTranslate(  $product->name , \App::getLocale()) }}
                        </a>
                    </div>
                </td>
            @endforeach
        </tr>
    @endforeach
@endfor
