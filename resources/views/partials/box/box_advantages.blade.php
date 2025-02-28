@foreach ($productAdvantagesHome as $item)
    <div class="plan01 fl pr">
        <dl>
            <dt>
                <i class="iconftb"><img src="{{ asset($item->icon) }}" width="60" height="60" alt=""></i>
            </dt>
            <dd>
                <h5 class="" style="padding:5px 0px 5px 5px">

                    {{ cachedTranslate($item->name, \App::getLocale()) }}
                </h5>


                <p>
                    {{ cachedTranslate(\Str::limit(strip_tags(html_entity_decode($item->description)), 100), \App::getLocale()) }}

                </p>
                <em>+</em>
            </dd>
        </dl>
        <div class="plan_m">
            <p>
                <img alt="Non degumming" src="{{ asset($item->image) }}">
            </p>
            <h5>
                <em>
                    <i class="iconftb" style="color: white;"><img src="{{ asset($item->icon) }}" width="60"
                            height="60" alt=""></i>
                </em>
                <span style="padding:5px 0px 5px 5px">
                    {{ cachedTranslate($item->name, \App::getLocale()) }}
                </span>




            </h5>
        </div>
    </div>
@endforeach
