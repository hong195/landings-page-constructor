<section class="advantages">
    <div class="advantages-wrap">
        <div class="container">
            <div class="advantages-info wow fadeInLeft" data-wow-delay=".3s">
                <ul class="advantages-info__list">
                    @foreach($advantages['icons'] as $advantage)
                        <li>
                            <img src="{{  $advantage['url'] }}" alt="ico">
                            <span>{{ $advantage['text'] }}</span>
                        </li>
                    @endforeach
                </ul>
                <a href="#plans" class="advantages__btn btn gotoPlans">
                    <span>{{ trans('landing.find_flat') }}</span>
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 17L17 1M17 1H4.2M17 1V13.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
            <div class="advantages-main">
                <h2 class="section-title">
                    <strong class="wow fadeInUp" data-wow-delay=".3s">{{ $landing->data['advantages']['title'] }}</strong>
                    <span class="wow fadeInUp" data-wow-delay=".5s">{{ $landing->data['advantages']['subtitle'] }}</span>
                </h2>
                <div class="advantages__img">
                    <img src="{{ $advantages['image'] }}" alt="advantages">
                </div>
            </div>
        </div>
    </div>
</section>
