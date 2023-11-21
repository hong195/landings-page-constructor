<section class="pay">
    <div class="container">
        <div class="pay-head">
            <div class="pay-head__item current">
                {{ trans('landings.flat_price') }}
            </div>
            <div class="pay-head__item">
                {{ trans('landings.payment_plan') }}
            </div>
        </div>
        <div class="pay-table__wrap current">
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
        <div class="pay-table__wrap">
            <div class="pay-table">
                <div class="pay-table__head">
                    <div>{{ trans('landings.available_units') }}</div>
                    <div>{{ trans('landings.sqrt_ft_min') }}</div>
                    <div>{{ trans('landings.sqrt_ft_max') }}</div>
                    <div>{{ trans('landings.start_price') }}</div>
                </div>
                <div class="pay-table__row">
                    <div>1-Bedroom Apartment</div>
                    <div>693</div>
                    <div>1,009</div>
                    <div>1,45</div>
                </div>
            </div>
        </div>
    </div>
</section>
