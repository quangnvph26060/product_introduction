@foreach ($serviceHome as $service)
<li>
    <i>
        {{ $loop->iteration > 9 ? $loop->iteration : '0'. $loop->iteration }}.
    </i>
    <b class="iconftb"><img src="{{ asset($service->images) }}" width="70" height="70" alt=""></b>
    <span>
        <em>
            {{ $service->name }}
        </em>
        <p>
        </p>
    </span>
    <div class="td-desc">
        A professional team that serves you 24/7
    </div>
</li>
@endforeach

