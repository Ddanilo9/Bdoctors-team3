@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-12">
            <form class="js-payment__form" action="{{ route('admin.plans.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <h2>Scegli il piano che fa per te</h2>
                @foreach ($plans as $plan)
                <input class="radioCustom" type="radio" id="{{$plan->id}}" name="plan" value="{{$plan->id}}">
                <label class="badge badge-info p-2 my-2 text-white text" for="{{$plan->type}}">{{$plan->type}}: Durata {{ $plan->duration }}h - Prezzo
                    {{ $plan->price }}€ </label><br>
                @endforeach

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