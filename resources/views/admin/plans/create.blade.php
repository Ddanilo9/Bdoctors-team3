@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-12">
            <form class="js-payment__form" action="{{ route('admin.plans.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <h2>Scegli il piano che fa per te</h2>

                <div class="plans__box">
                    @foreach ($plans as $plan)
                    <div class="plans__wrapper">
                        <input class="plans__radio visually-hidden" type="radio" id="{{$plan->id}}" name="plan" value="{{$plan->id}}">
                        <label class="plans__card" for="{{$plan->id}}">
                            <h6 class="plans__card-title">Piano {{$plan->type}}</h6>

                            <p class="plans__price">
                                {{ $plan->price }}€
                            </p>

                            <p class="plans__duration">
                                Durata {{ $plan->duration }}h
                            </p>
                    </label>
                    </div>
                    @endforeach
                </div>

                <div class="js-payment__container"></div>
                <button type="submit" class="js-payment__button">Purchase</button>
            </form>
        </div>
    </div>
</div>


@endsection

@section('extScripts')
<script src="https://js.braintreegateway.com/web/dropin/1.33.7/js/dropin.js"></script>
<script src="{{ mix('/js/braintree.js') }}" defer></script>
@endsection