<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-wrap">
                <h2 class="section-title">
                    <span class="wow fadeInUp" data-wow-delay=".3s">Оставьте заявку</span>
                    <strong class="wow fadeInUp" data-wow-delay=".5s">Мы с Вами свяжемся</strong>
                </h2>
                <form method="POST" action="{{ route('sendMail') }}">
                    @csrf
                    <div class="footer-form form">
                        <div class="form-input">
                            <div class="form-input__input">
                                <input type="text" name="name" placeholder="Имя" class="form_name">
                            </div>
                            <div class="form-input__error">
                                Ошибка! Данные введены неверно
                            </div>
                        </div>
                        <div class="form-input">
                            <div class="form-input__input">
                                <input type="tel" name="phone"placeholder="Номер телефона" class="form_tel">
                            </div>
                            <div class="form-input__error">
                                Ошибка! Данные введены неверно
                            </div>
                        </div>
                        <div class="form-input">
                            <div class="form-input__select">
                                <select name="type" name="bedrooms" class="customSelect">
                                    <option selected disabled>
                                        Количество спален
                                    </option>

                                    @foreach($plans as $bedroom => $plan)
                                        <option value="{{ $bedroom }}">{{ $bedroom }} спальни</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button class="form__btn btn">
                            <span>Оставить заявку</span>
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
