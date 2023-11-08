<section class="gallery">
    <div class="container">
        <div class="gallery-content">
            @if(array_key_exists('gallery', $landing->data))
                <h2 class="gallery__title wow fadeInUp" data-wow-delay=".3s">
                    {{ $landing->data['gallery']['title'] }}
                </h2>
            @endif
            <a href="#plans" class="gallery__btn btn gotoPlans wow fadeInUp" data-wow-delay=".5s">
                <span>Посмотреть планировки</span>
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.3333 19.8889L18 25.5556M18 25.5556L23.6667 19.8889M18 25.5556V10.4444M35 18C35 8.61116 27.3888 1 18 1C8.61116 1 1 8.61116 1 18C1 27.3888 8.61116 35 18 35C27.3888 35 35 27.3888 35 18Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
        <div class="gallery-main">
            @foreach($gallery as $image)
                <a href="{{ $image['url'] }}" data-fancybox="gallery" class="gallery-item">
                    <div class="gallery-item__wrap">
                        <img src="{{ $image['url'] }}" alt="gallery">
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
