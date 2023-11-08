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

                @foreach($landing->data['payment_plan'] as $plan)
                    <div class="pay-table__row">
                        <div>{{ $plan['step'] }}</div>
                        <div>{{ $plan['percent'] }}</div>
                        <div>{{ $plan['date'] }}</div>
                        <div>{{ $plan['price'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
