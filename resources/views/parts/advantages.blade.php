<section class="advantages">
    <div class="advantages-wrap">
        <div class="container">
            <div class="advantages-info wow fadeInLeft" data-wow-delay=".3s">
                <ul class="advantages-info__list">
                    @foreach(data_get($advantages, 'icons', []) as $advantage)
                        @if($image = data_get($advantage, 'url'))
                            <li>
                                <img src="{{ $image }}" alt="ico">
                                <span>{{ data_get($advantage, 'text') }}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <a href="#plans" class="advantages__btn btn gotoPlans">
                    <span>{{ trans('landings.find_flat') }}</span>
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 17L17 1M17 1H4.2M17 1V13.8" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
            <div class="advantages-main">
                @if ($advantage = data_get($landing->data, 'advantages'))
                    <h2 class="section-title">
                        @if ($title = data_get($advantage, 'title'))
                            <strong class="wow fadeInUp"
                                    data-wow-delay=".3s">{{ $title }}</strong>
                        @endif
                        @if ($subtitle = data_get($advantage, 'subtitle'))
                            <span class="wow fadeInUp"
                                  data-wow-delay=".5s">{{ $subtitle }}</span>
                        @endif
                    </h2>
                @endif
                @if($image = data_get($advantages, 'image'))
                    <div class="advantages__img">
                        <img src="{{ $image }}" alt="advantages">
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
