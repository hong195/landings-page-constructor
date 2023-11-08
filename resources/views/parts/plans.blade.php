<section class="plans" id="plans">
    <div class="container">
        <h2 class="section-title wow fadeInUp" data-wow-delay=".3s">
            Типы планировок
        </h2>
        <div class="plans__subtitle">
            Количество спален
        </div>
        <div class="plans-wrap">
            <div class="plans-choose">
                <ul class="plans-choose__list">
                    <li class="current">
                        Все
                    </li>
                    @foreach($plans as $bedroom => $plan)
                        <li>{{ $bedroom }}</li>
                    @endforeach
                </ul>
                <div class="plans-choose__tabs">

                    <div class="plans-choose__tab">
                        <ul class="plans-choose__flats">
                            @foreach($plans as $bedroom => $plan)
                                @foreach($plan as $info)
                                    <li data-name="{{ $landing->name }}"
                                        data-square="{{ $info['area'] }}"
                                        data-floor="{{ $info['floor'] }}">
                                        <img src="{{ $info['url'] }}" alt="{{ $landing->name }}">
                                    </li>
                                @endforeach
                            @endforeach
                        </ul>
                    </div>

                    @foreach($plans as $bedroom => $plan)
                        <div class="plans-choose__tab">
                            <ul class="plans-choose__flats">

                                @foreach($plan as $info)
                                    <li data-name="{{ $landing->name }}"
                                        data-square="{{ $info['area'] }}"
                                        data-floor="{{ $info['floor'] }}">
                                        <img src="{{ $info['url'] }}" alt="{{ $landing->name }}">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="plans-main">
                <div class="plans-main__img">
                    <img src="" alt="plans">
                </div>
                <ul class="plans-main__list">
                    <li class="plans-main__item">
                        <div class="plans-main__wrap">
                            <div class="plans-main__name">
                                Проект
                            </div>
                            <div class="plans-main__value plans-main__project"></div>
                        </div>
                    </li>
                    <li class="plans-main__item">
                        <div class="plans-main__wrap">
                            <div class="plans-main__name">
                                Площадь
                            </div>
                            <div class="plans-main__value plans-main__square">
                                <span></span> м2
                            </div>
                        </div>
                    </li>
                    <li class="plans-main__item">
                        <div class="plans-main__wrap">
                            <div class="plans-main__name">
                                Этаж
                            </div>
                            <div class="plans-main__value plans-main__floor"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
