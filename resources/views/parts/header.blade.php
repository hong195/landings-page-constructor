<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header__logo">
                {{ $landing->name }}
            </div>
            <div class="header-top__wrap">
                @if($email = data_get($landing->data, 'email'))
                    <a href="mailto:{{ $email }}" class="header-top__link">
                        <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2 2L8.10764 6.61227L8.10967 6.61396C8.78785 7.11128 9.12714 7.3601 9.49876 7.45621C9.82723 7.54117 10.1725 7.54117 10.501 7.45621C10.8729 7.36001 11.2132 7.11047 11.8926 6.61227C11.8926 6.61227 15.8101 3.60594 18 2M1 11.8002V4.2002C1 3.08009 1 2.51962 1.21799 2.0918C1.40973 1.71547 1.71547 1.40973 2.0918 1.21799C2.51962 1 3.08009 1 4.2002 1H15.8002C16.9203 1 17.4796 1 17.9074 1.21799C18.2837 1.40973 18.5905 1.71547 18.7822 2.0918C19 2.5192 19 3.07899 19 4.19691V11.8036C19 12.9215 19 13.4805 18.7822 13.9079C18.5905 14.2842 18.2837 14.5905 17.9074 14.7822C17.48 15 16.921 15 15.8031 15H4.19691C3.07899 15 2.5192 15 2.0918 14.7822C1.71547 14.5905 1.40973 14.2842 1.21799 13.9079C1 13.4801 1 12.9203 1 11.8002Z"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>{{ $email }}</span>
                    </a>
                @endif
                @if ($phone = data_get($landing->data, 'phone'))
                    <div class="header-top__tel">
                        <a href="tel:{{ $phone }}" class="header-top__tel-svg">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.50246 2.25722C7.19873 1.4979 6.46332 1 5.64551 1H2.89474C1.8483 1 1 1.8481 1 2.89453C1 11.7892 8.21078 19 17.1055 19C18.1519 19 19 18.1516 19 17.1052L19.0005 14.354C19.0005 13.5361 18.5027 12.8009 17.7434 12.4971L15.1069 11.4429C14.4249 11.1701 13.6483 11.2929 13.0839 11.7632L12.4035 12.3307C11.6089 12.9929 10.4396 12.9402 9.7082 12.2088L7.79222 10.2911C7.06079 9.55962 7.00673 8.39134 7.66895 7.59668L8.23633 6.9163C8.70661 6.35195 8.83049 5.57516 8.55766 4.89309L7.50246 2.25722Z"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <div>
                            <a href="tel:{{ $phone }}">{{ $phone }}</a>
                            @if ($secondPhone = data_get($landing->data, 'second_phone'))
                                <a href="tel:{{ $secondPhone }}">{{ $secondPhone }}</a>
                            @endif
                        </div>
                    </div>
                @endif

                <div class="header-lang">
                    <div class="header-lang__btn">
                        <div style="text-transform: uppercase;">
                            {{ app()->getLocale() }}
                        </div>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.8" d="M6.00049 9L12.0005 15L18.0005 9" stroke="white" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="header-lang__list">
                        <a href="{{ route('landing') }}">RU</a>
                        <a href="{{ route('landing', ['lang' => 'en']) }}">EN</a>
                    </div>
                </div>
                <a href="#footer" class="header-top__btn btn">
                    <span>{{ trans('landings.call') }} {{ trans('landings.with_us') }}</span>
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 17L17 1M17 1H4.2M17 1V13.8" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    @include('parts.slides', ['slides' => $slides])
</header>
