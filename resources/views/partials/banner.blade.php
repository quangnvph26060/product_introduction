<div class="ban_bc">
    <div class="bann_num">
        <span class="iconftb ban_prev">&#xe636;</span>
        <span class="iconftb ban_next">&#xe636;</span>
    </div>
    <section class="vertical-center-4 slider bann">
        @foreach ($banners as $banner)
            <div>
                <img src="{{ asset($banner->image) }}" alt="{{ $banner->title }}">
            </div>
        @endforeach
    </section>
    <div class="ban_dots"></div>
</div>
