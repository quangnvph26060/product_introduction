@foreach ($processHome as $item)
    <li style="background:url({{ asset($item->image) }}) center center no-repeat; background-size: cover;" class="{{ $loop->first ? 'cur' : '' }}">
        <div class="shu2">

                <h3 class="quality">
                    {{ $loop->iteration > 9 ? $loop->iteration : '0' . $loop->iteration }}
                </h3>

            <em>
                <i><span class="iconftb"><img src="{{ asset($item->icon) }}" style="margin-top: 15px" width="50"
                            height="50" alt=""></span></i>
                <b>

                    {{ cachedTranslate($item->title , \App::getLocale()) }}
                </b>
            </em>
        </div>
        <div class="bock">
            <h3>{{ cachedTranslate($item->title , \App::getLocale()) }}</h3>
            <div class="process-text">

                {!!cachedTranslate($item->description , \App::getLocale()) !!}
            </div>
        </div>
    </li>
    <style>
        .quality {
            color: white;
            text-align: center;
            font-size: 50px;
        }
        .process-text p {
            color: white !important;
            line-height: 1.5
        }
        .process-text p strong{
            color: white !important;
        }
    </style>
@endforeach
