@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.plans.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <h2>Scegli il piano che fa per te</h2>
                @foreach ($plans as $plan)
                <input class="radioCustom" type="radio" id="{{$plan->id}}" name="plan" value="{{$plan->id}}">
                <label class="badge badge-info p-2 my-2 text-white text" for="{{$plan->type}}">{{$plan->type}}: Durata {{ $plan->duration }}h - Prezzo
                    {{ $plan->price }}€ </label><br>
                    
                @endforeach

                <input type="submit" class="btn btn-info mt-5" value="Submit">
            
            </form>
        </div>
    </div>
</div>

    {{-- <form action="{{ route('admin.plans.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group text-center row flex-column align-items-center">
            <label for="plan">Scegli un piano</label>
            <select name="plan" class="form-control col-md-5 mb-4" id="plan">
                <option value="{{ $bronze->type }}">{{ $bronze->type }} : Durata {{ $bronze->hours }}h - Prezzo
                    {{ $bronze->price }}€</option>
                <option value="{{ $silver->type }}">{{ $silver->type }} : Durata {{ $silver->hours }}h - Prezzo
                    {{ $silver->price }}€</option>
                <option value="{{ $gold->type }}">{{ $gold->type }} : Durata {{ $gold->hours }}h - Prezzo
                    {{ $gold->price }}€</option>
            </select>
            <input type="submit" class="btn btn-success mt-5" role="button" value="Boost">
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form> --}}

@endsection