<div class="feedback">
    <div class="feedback-content">
        <div class="feedback__img">
            <img src="{{ asset('img/advantages/1.jpg') }}" alt="advantages">
        </div>
        <div class="feedback-wrap">
            <div class="feedback__close">
                <img src="{{ asset('img/icons/close.svg') }}" alt="ico">
            </div>
            <h2 class="feedback__title">
                {{ trans('landings.feedback.left_questions') }}
            </h2>
            <div class="feedback__text">
                {{ trans('landings.feedback.leave_request') }}
            </div>
            <form id="feedback_form" method="POST" action="{{ route('applications.store') }}" class="feedback-form">
                @csrf
                <input type="hidden" name="landing_id" value="{{ $landing->id }}">
                <div class="form-input form-input__name">
                    <div class="form-input__input">
                        <input type="text" name="name" placeholder="Имя" class="form_name">
                    </div>
                    <div class="form-input__error">
                        {{ trans('landings.wrong_data') }}
                    </div>
                </div>
                <div class="form-input form-input__phone">
                    <div class="form-input__input">
                        <input type="tel" name="phone" placeholder="Номер телефона" class="form_tel">
                    </div>
                    <div class="form-input__error">
                        {{ trans('landings.wrong_data') }}
                    </div>
                </div>
                <button class="form__btn btn" type="submit">
                    <span>{{ trans('landings.leave_request') }}</span>
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 17L17 1M17 1H4.2M17 1V13.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>

                <!-- ВМЕСТО КНОПКИ ПОКАЗАТЬ feedback-form__done ПРИ ОТПРАВКЕ-->

                <div class="feedback-form__done">
                    <div>
                        <span>{{ trans('landings.request_is_sent') }}</span>
                        <img src="{{ asset('img/icons/done.svg' )}}" alt="ico">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
