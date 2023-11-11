<section class="about">
    <div class="about-wrap">
        <div class="about-content">
            <h2 class="section-title">
                @if($title = data_get($landing->data, 'about_us.title'))
                    <span class="wow fadeInUp" data-wow-delay=".3s">{{ $title }}</span>
                @endif

                @if($subtitle = data_get($landing->data, 'about_us.subtitle'))
                    <strong class="wow fadeInUp" data-wow-delay=".5s">{{ $subtitle }}</strong>
                @endif
            </h2>

            @if ($text = data_get($landing->data, 'about_us.description'))
                <div class="about__text">
                    {!! $text !!}
                </div>
            @endif

            <a href="{{ $brochure }}" class="about__btn btn" download="">
                <span>{{ trans('landings.download_brochure') }}</span>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 17L17 1M17 1H4.2M17 1V13.8" stroke="currentColor" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>
</section>
