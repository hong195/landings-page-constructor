<section class="developer">
    <div class="container">
        <h2 class="section-title">
            @if($title = data_get($landing->data, 'builder.title'))
                <span class="wow fadeInUp" data-wow-delay=".3s">{{ $title }}</span>
            @endif

            @if($subtitle = data_get($landing->data, 'builder.subtitle'))
                <strong class="wow fadeInUp" data-wow-delay=".5s">{{ $subtitle }}</strong>
            @endif
        </h2>
        @if($description = data_get($landing->data, 'builder.description'))
            <div class="developer__text">
                <pre>
                    {!! $description !!}
                </pre>
            </div>
        @endif
    </div>
    <div class="developer__video">
        <video src="{{ $builderVideo }}" pip="false"
               autoplay="autoplay" loop="loop" muted="muted" playsinline="" webkit-playsinline=""></video>
    </div>
</section>
