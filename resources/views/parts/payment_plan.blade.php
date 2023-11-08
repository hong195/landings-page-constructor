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
