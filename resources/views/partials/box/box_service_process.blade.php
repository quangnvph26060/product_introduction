@foreach ($serviceHome as $service)
<li>
    <i>
        {{ $loop->iteration > 9 ? $loop->iteration : '0'. $loop->iteration }}.
    </i>
    <b class="iconftb"><img src="{{ asset($service->images) }}" width="70" height="70" alt=""></b>
    <span>
        <em>
            {{ cachedTranslate( $service->name , \App::getLocale()) }}

        </em>
        <p>
        </p>
    </span>
    <div class="td-desc">
        {{ cachedTranslate(\Str::limit(strip_tags(html_entity_decode($service->description)), 100), \App::getLocale()) }}
    </div>
</li>
<style>
    .td-desc p {
        color: white;
    }
</style>
@endforeach

