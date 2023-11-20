<section class="pay">
    <div class="container">
        <h2 class="section-title wow fadeInUp" data-wow-delay=".3s">
            {{ trans('landings.payment_plan') }}
        </h2>
        <div class="pay-table__wrap">
            <div class="pay-table">
                <div class="pay-table__head">
                    <div>{{ trans('landings.step') }}</div>
                    <div>%</div>
                    <div>{{ trans('landings.date') }}</div>
                    <div>AED</div>
                </div>

                @foreach(data_get($landing->data, 'payment_plan') as $plan)
                    <div class="pay-table__row">
                        @if ($step = data_get($plan, 'step'))
                            <div>{{ $step }}</div>
                        @endif

                        @if ($percent = data_get($plan, 'percent'))
                            <div>{{ $percent }}</div>
                        @endif

                        @if ($date = data_get($plan, 'date'))
                            <div>{{ $date }}</div>
                        @endif

                        @if ($price = data_get($plan, 'price'))
                            <div>{{ $price }}</div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>



{{-- <section class="pay">
    <div class="container">
        <div class="pay-head">
            <div class="pay-head__item current">
                Стоимость квартир
            </div>
            <div class="pay-head__item">
                План оплат
            </div>
        </div>
        <div class="pay-table__wrap current">
            <div class="pay-table">
                <div class="pay-table__head">
                    <div>Этап</div>
                    <div>%</div>
                    <div>Дата</div>
                    <div>AED</div>
                </div>
                <div class="pay-table__row">
                    <div>1-ая рассрочка</div>
                    <div>10</div>
                    <div>27 сентября 2023</div>
                    <div>148,889</div>
                </div>
                <div class="pay-table__row">
                    <div>2-ая рассрочка</div>
                    <div>10</div>
                    <div>1 ноября 2023</div>
                    <div>148,889</div>
                </div>
                <div class="pay-table__row">
                    <div>3-ая рассрочка</div>
                    <div>10</div>
                    <div>1 мая 2024</div>
                    <div>148,889</div>
                </div>
                <div class="pay-table__row">
                    <div>4-ая рассрочка</div>
                    <div>10</div>
                    <div>1 ноября 2024</div>
                    <div>148,889</div>
                </div>
                <div class="pay-table__row">
                    <div>20% строительство</div>
                    <div>15</div>
                    <div>1 апреля 2025</div>
                    <div>223,333</div>
                </div>
                <div class="pay-table__row">
                    <div>40% строительство</div>
                    <div>15</div>
                    <div>20 октября 2025</div>
                    <div>223,333</div>
                </div>
                <div class="pay-table__row">
                    <div>60% строительство</div>
                    <div>10</div>
                    <div>14 апреля 2026</div>
                    <div>148,889</div>
                </div>
                <div class="pay-table__row">
                    <div>80% строительство</div>
                    <div>10</div>
                    <div>28 сентября 2026</div>
                    <div>148,889</div>
                </div>
                <div class="pay-table__row">
                    <div>100% строительство</div>
                    <div>10</div>
                    <div>27 марта 2027</div>
                    <div>148,889</div>
                </div>
            </div>
        </div>
        <div class="pay-table__wrap">
            <div class="pay-table">
                <div class="pay-table__head">
                    <div>Available Units</div>
                    <div>Area Sq. ft .
                        Minimum</div>
                    <div>Area Sq. ft .
                        Maximum</div>
                    <div>Starting Price
                        (In AED Mn)</div>
                </div>
                <div class="pay-table__row">
                    <div>1-Bedroom
                        Apartment</div>
                    <div>693</div>
                    <div>1,009</div>
                    <div>1,45</div>
                </div>
                <div class="pay-table__row">
                    <div>2-Bedroom
                        Apartment</div>
                    <div>693</div>
                    <div>1,009</div>
                    <div>1,45</div>
                </div>
                <div class="pay-table__row">
                    <div>3-Bedroom
                        Apartment</div>
                    <div>693</div>
                    <div>1,009</div>
                    <div>1,45</div>
                </div>
                <div class="pay-table__row">
                    <div>4-Bedroom
                        Apartment</div>
                    <div>693</div>
                    <div>1,009</div>
                    <div>1,45</div>
                </div>
                <div class="pay-table__row">
                    <div>5-Bedroom
                        Apartment</div>
                    <div>693</div>
                    <div>1,009</div>
                    <div>1,45</div>
                </div>
            
            </div>
        </div>
    </div>
</section> --}}
