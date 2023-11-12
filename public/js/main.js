if(sessionStorage.getItem('loader')) {
    $('.preloader').hide()
    setTimeout(() => {
        $('.header-slide__title span').addClass('show')
        $('.header-slide__title strong').addClass('show')
    }, 500)
} else {
    $('.preloader__loading').addClass('anim')
    $('.preloader').delay(3500).fadeOut(800)

    setTimeout(() => {
        $('.header-slide__title span').addClass('show')
        $('.header-slide__title strong').addClass('show')
    }, 4000)
}

sessionStorage.setItem('loader', true)

$(window).on('load', () => {

    let rootFont = parseInt($(':root').css('font-size'))

    if(!sessionStorage.getItem('exit')) {
        window.addEventListener('beforeunload', function (e) {
            if(!sessionStorage.getItem('exit')) {
                if (!localStorage.getItem('request_sent')) {
                    $('.feedback').fadeIn(600)
                }
            }
            sessionStorage.setItem('exit', true)
            var confirmationMessage = 'Вы уверены, что хотите покинуть страницу? Ваши данные могут быть потеряны.'
            e.returnValue = confirmationMessage
            return confirmationMessage
        })
    }

    $('.gotoPlans').click(function(e){
        e.preventDefault()
        $('html, body').animate({ scrollTop: $('#plans').offset().top }, 2000)
    })


    //_____________FEEDBACK_________________


    $('.feedback__close').click(e => {
        e.preventDefault()
        $('.feedback').fadeOut(600)
    })



    $(document).on('mouseleave', function() {
        if(!sessionStorage.getItem('exit')) {

            if (!localStorage.getItem('request_sent')) {
                $('.feedback').fadeIn(600)
            }
            sessionStorage.setItem('exit', true)
        }
    })


    $('.feedback').click(e => {
        let div = $('.feedback-content')
        if (!div.is(e.target)
            && div.has(e.target).length === 0) {
            $('.feedback').fadeOut(600)
        }
    })

    if (!localStorage.getItem('request_sent')) {
        setTimeout(() => {
            $('.feedback').fadeIn(600)
        }, 30000)

    }

    $('#feedback_form').submit(function(event) {
        event.preventDefault()

        let $name = $(this).find('.form-input__name')
        let $phone = $(this).find('.form-input__phone')


        if (!$name.find('*').filter(':input:visible:first').val()) {
            $name.find('.form-input__error').show()
            return
        }

        if (!$phone.find('*').filter(':input:visible:first').length) {
            $phone.find('.form-input__error').show()
            return
        }

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            success: function(data) {
                setTimeout(() => {
                    localStorage.setItem('request_sent', 1)
                    $(this).find('.feedback-form__done').show()
                }, 5000)

                $('.feedback-success').fadeIn(100)


                $('.feedback').fadeOut(600)
            }
        })
    })

    //________MAIN__________

    $('.header-top__btn').click(function() {
        $('html, body').animate({ scrollTop: $('.footer').offset().top }, 3000)
    })


    $('.header-slide__item').each(function(index) {
        $('.header-nav__buttons').append(`<li><span>${index+1}</span></li>`)
    })


    let mainSliderChange = event => {
        if (!event.namespace) {
        return;
        }
        let slide = event.relatedTarget.current()
        let slideLength = $('.header-slide__item').length - event.page.size

        slide == 0 ? $('.header-nav .arrow-left').addClass('hidden') : $('.header-nav .arrow-left').removeClass('hidden')
        slide == slideLength ? $('.header-nav .arrow-right').addClass('hidden') : $('.header-nav .arrow-right').removeClass('hidden')

        $('.header-nav__buttons li').removeClass('current')
        $('.header-nav__buttons li').eq(slide).addClass('current')
    }


    $('.header-slider').owlCarousel({
        animateIn: 'fadeInOwl',
        animateOut: 'fadeOutOwl',
        items: 1,
        nav: false,
        dots: false,
        smartSpeed: 1000,
        autoWidth: true,
        mouseDrag: false,
        onInitialized: mainSliderChange,
        onChanged: mainSliderChange,
    })


    $('.header-nav .arrow-left').click(() => {
        $('.header-slider').trigger('prev.owl.carousel', [1000])
        $('.header-slider').trigger('stop.owl.autoplay')
    })

    $('.header-nav .arrow-right').click(() => {
        $('.header-slider').trigger('next.owl.carousel', [1000])
        $('.header-slider').trigger('stop.owl.autoplay')
    })

    $('.header-nav__buttons li').click(function() {
        let index = $(this).index()
        $('.header-slider').trigger('to.owl.carousel', [index, 1000,true])
        $('.header-slider').trigger('stop.owl.autoplay')
    })


    //_______PLANS__________


    $('.plans-choose__flats li').click(function() {
        let name = $(this).data('name')
        let square = $(this).data('square')
        let floor = $(this).data('floor')
        let img = $(this).find('img').attr('src')

        $('.plans-main__img img').attr('src', img)
        $('.plans-main__project').text(name)
        $('.plans-main__square span').text(square)
        $('.plans-main__floor').text(floor)
    })


    $('.plans-choose__flats li').eq(0).click()

    $('.plans-choose__list li').click(function() {
        let index = $(this).index()
        $('.plans-choose__list li').removeClass('current')
        $(this).addClass('current')
        $('.plans-choose__tab').hide()
        $('.plans-choose__tab').eq(index).fadeIn(500)
        $('.plans-choose__tab').eq(index).find('.plans-choose__flats li').eq(0).click()
    })






    //________GALLERY__________

    if($(window).width() < 768 || ('ontouchstart' in window)) {

        $('.gallery-main').addClass('owl-carousel')

        $('.gallery-main').owlCarousel({
            items: 1,
            nav: false,
            dots: true,
            smartSpeed: 1000,
            autoplay: true,
            autoplayTimeout: 5000,
            margin: 20,
        })

        $('.map-info__item').click(function() {
            $('html, body').animate({ scrollTop: $('.map').offset().top }, 500)
        })

    } else {

        $('body').niceScroll({
            scrollspeed:  rootFont*5,
            cursorcolor: '#201D1E',
        });


        let galleryLength = $('.gallery-item').length
        $('.gallery').height(40*rootFont + galleryLength*$(window).width())
        let galleryOffset = $('.gallery').offset().top
        let galleryHeight = $('.gallery').height()
        let galleryWidth = $('.gallery-main').width()

        $(window).on('scroll', function() {
            let scrollTop = $(window).scrollTop()
            let gap = (scrollTop - galleryOffset) / galleryHeight * 100
            $('.gallery .container').css('margin-left', `-${galleryWidth / 100 * gap}px`)

            $('.gallery-item').each(function() {
                let offsetLeft = $(this).offset().left
                $(this).find('.gallery-item__wrap').css('transform', `translateX(-${offsetLeft/4}px)`)
            })
        })
    }



    //________FORM__________


    $('.customSelect').customSelect()

    $('.form_tel').intlTelInput({
        autoPlaceholder: 'polite',
        initialCountry: 'ae',
        nationalMode: false,
    })

    $('.form_name').on('keydown', function(e) {
        const key = e.key;
        if (!/^[a-zA-Zа-яА-Я\s]*$/.test(key)) {
            e.preventDefault();
        }
    })


    //__________WOW____________


    new WOW({
        offset: 50,
    }).init()

})
