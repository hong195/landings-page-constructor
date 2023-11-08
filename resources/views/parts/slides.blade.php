
<div class="header-slider owl-carousel">
    @foreach($slides as $slide)
        <div class="header-slide__item">
            <div class="container">
                <div class="header-slide__bg">
                    <img src="{{ $slide['url'] }}" alt="{{ $slide['title'] }}">
                </div>
                <div class="header-slide__content">
                    <h2 class="header-slide__title">
                        <span>{{ $slide['title'] }}</span>
                        <strong> {{ $slide['subtitle'] }} </strong>
                    </h2>
                    <div class="header-slide__wrap">
                        <div class="header-slide__text">
                            {{ $slide['description'] }}
                        </div>
                        <a href="#plans" class="header-slide__btn gotoPlans">
                            <img src="{{ asset('img/icons/arc.svg') }}" alt="ico">
                            <span>ПОДОБРАТЬ КВАРТИРУ</span>
                            <img src="{{ asset('img/icons/arrow-right.svg') }}" alt="ico">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@if ($slides->count() > 0)
    <div class="header-nav">
                <span class="header-nav__arrow arrow-left">
                    <img src="img/icons/chevron-left.svg" alt="ico">
                </span>
        <ul class="header-nav__buttons">
        </ul>
        <span class="header-nav__arrow arrow-right">
                    <img src="img/icons/chevron-right.svg" alt="ico">
                </span>
    </div>
@endif
