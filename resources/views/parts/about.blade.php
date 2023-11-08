<section class="about">
    <div class="about-wrap">
        <div class="about-content">
            <h2 class="section-title">
                <span class="wow fadeInUp" data-wow-delay=".3s">{{ $landing->data['about_us']['title'] }}</span>
                <strong class="wow fadeInUp" data-wow-delay=".5s">{{ $landing->data['about_us']['subtitle'] }}</strong>
            </h2>
            <div class="about__text">
                {{ e($landing->data['about_us']['description']) }}
            </div>
            <a href="{{ $brochure }}" class="about__btn btn" download="">
                <span>Скачать брошюру</span>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 17L17 1M17 1H4.2M17 1V13.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>
</section>
