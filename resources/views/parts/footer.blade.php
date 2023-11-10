<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-wrap">
                <h2 class="section-title">
                    <span class="wow fadeInUp" data-wow-delay=".3s">{{ trans('landings.leave_request') }}</span>
                    <strong class="wow fadeInUp" data-wow-delay=".5s">{{ trans('landings.we_call_you') }}</strong>
                </h2>
                <form method="POST" action="{{ route('applications.store') }}">
                    @csrf
                    <div class="footer-form form">
                        <div class="form-input">
                            <div class="form-input__input">
                                <input type="text" name="name" placeholder="{{ trans('landings.name') }}" class="form_name">
                            </div>
                            <div class="form-input__error">
                                {{ trans('landings.wrong_data') }}
                            </div>
                        </div>
                        <div class="form-input">
                            <div class="form-input__input">
                                <input type="tel" name="phone"placeholder="{{ trans('landings.phone') }}" class="form_tel">
                            </div>
                            <div class="form-input__error">
                                {{ trans('landings.wrong_data') }}
                            </div>
                        </div>
                        <div class="form-input">
                            <div class="form-input__select">
                                <select name="type" name="bedrooms" class="customSelect">
                                    <option selected disabled>
                                        {{ trans('landings.bedrooms_count') }}
                                    </option>

                                    @foreach($plans as $bedroom => $plan)
                                        <option value="{{ $bedroom }}">{{ $bedroom }} спальни</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button class="form__btn btn">
                            <span>{{ trans('landings.leave_request') }}</span>
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 17L17 1M17 1H4.2M17 1V13.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="container">
            <p>{{ $landing->name }}</p>
            <p>Golden Gate Properties</p>
        </div>
    </div>
</footer>
