
<div class="header-slider owl-carousel">
    @foreach($slides as $slide)
        <div class="header-slide__item">
            <div class="container">
                @if($image = data_get($slide, 'url'))
                    <div class="header-slide__bg">
                        <img src="{{ $image }}" alt="{{ data_get($slide, 'title') }}">
                    </div>
                @endif

                <div class="header-slide__content">
                    @if($title = data_get($slide, 'title'))
                        <h2 class="header-slide__title">
                            <span>{{ $title }}</span>
                            <strong> {{ data_get($slide, 'subtitle') }} </strong>
                        </h2>
                    @endif

                    <div class="header-slide__wrap">
                        @if($description = data_get($slide, 'description'))
                            <div class="header-slide__text">
                                {{ $description }}
                            </div>
                        @endif
                        <a href="#plans" class="header-slide__btn gotoPlans">
                            <img src="{{ asset('img/icons/arc.svg') }}" alt="ico">
                            <span style="text-transform: uppercase;">{{ trans('landings.find_flat') }}</span>
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
                    <img src="{{ asset('img/icons/chevron-left.svg') }}" alt="ico">
                </span>
        <ul class="header-nav__buttons">
        </ul>
        <span class="header-nav__arrow arrow-right">
                    <img src="{{ asset('img/icons/chevron-right.svg') }}" alt="ico">
                </span>
    </div>
@endif
