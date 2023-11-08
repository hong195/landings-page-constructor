<section class="developer">
    <div class="container">
        <h2 class="section-title">
            <span class="wow fadeInUp" data-wow-delay=".3s">{{ $landing->data['builder']['title'] }}</span>
            <strong class="wow fadeInUp" data-wow-delay=".5s">{{ $landing->data['builder']['subtitle'] }}</strong>
        </h2>
        @if(array_key_exists('description', $landing->data['builder']))
            <div class="developer__text">
                {{ $landing->data['builder']['description'] }}
            </div>
        @endif

    </div>
    <div class="developer__video">
        <video src="{{ $builderVideo }}" pip="false"
               autoplay="autoplay" loop="loop" muted="muted" playsinline="" webkit-playsinline=""></video>
    </div>
</section>
