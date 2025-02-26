
@foreach ($businessesHome as $item)
<td align=center style=padding-left:5px;>
    <a href=wdgweb_content-102933.html>
        <img src='{{ asset($item->image) }}' border=0 alt={{ $item->name }}>
    </a><br>
    <div style=padding-top:5px;>
        <a  title={{ cachedTranslate($item->name , \App::getLocale()) }}>

            {{ cachedTranslate($item->name , \App::getLocale()) }}
    </div>
</td>
@endforeach
