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

    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PGBRFL4D');</script>
    <!-- End Google Tag Manager -->

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(95835897, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true,
            ecommerce:"dataLayer"
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/95835897" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
</head>
<body>


<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PGBRFL4D"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
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

@include('parts.feedback-modal')

<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{ asset('js/libs.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
