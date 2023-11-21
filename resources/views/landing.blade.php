<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @if($favicon)
        <link rel="shortcut icon" href="{{ $favicon }}" type="image/x-icon">
    @endif

    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/libs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>{{ $landing->name }}</title>

    <meta name="description" content="">

    <!-- Facebook -->
    <meta property="og:title" content="">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="img/meta.png">
    <meta property="og:type" content="website">

    <!-- Google Plus -->
    <meta itemprop="name" content="">
    <meta itemprop="description" content="">
    <meta itemprop="image" content="img/meta.png">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="img/meta.png">
</head>
<body>


<!-- PRELOADER -->

<div class="preloader">
    <div class="preloader__loading">
        <span>L</span>
        <span>O</span>
        <span>A</span>
        <span>D</span>
        <span>I</span>
        <span>N</span>
        <span>G</span>
    </div>
</div>

<!-- HEADER -->

@include('parts.header', ['landing' => $landing, 'slides' => $slides])

<!-- ABOUT -->

@include('parts.about', ['landing' => $landing, 'brochure' => $brochure])

<!-- MAP -->

@include('parts.map', ['landing' => $landing])

<!-- ADVANTAGES -->

@include('parts.advantages', ['landing' => $landing, 'advantages' => $advantages])

<!-- GALLERY -->

@include('parts.gallery', ['landing' => $landing, 'gallery' => $gallery])

<!-- PLANS -->

@include('parts.plans', ['landing' => $landing, 'plans' => $plans])

<!-- DEVELOPER -->

@include('parts.builder-info', ['landing' => $landing, 'builderVideo' => $builderVideo])


@include('parts.payment_plan', ['landing' => $landing])

<!-- FOOTER -->

@include('parts.footer', ['landing' => $landing, 'plans' => $plans])

{{--@include('parts.feedback-modal')--}}

<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{ asset('js/libs.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
