@extends('layouts.app')

@section('content')
    <section class="hero">
        <div class="container">
            <h2 class="text-center">Come possiamo aiutarti?</h2>
            <h5 class="text-center">Ricerca medico in questa specializzazione:</h5>
        </div>
        <div class="container">
            <div class="row justify-content-between">
                @foreach ($specializations as $s)
                    <div class="col-12 col-md-6 col-lg-2 text-center">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="specializations" id="spec"
                                value="{{ $s->id }}">
                            <label class="form-check-label" for="specializations">{{ $s->spec_name }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="container-fluid mt-5 pb-3 border-0">
        <div class="title text-center">
            <h2 class="text-dark font-weight-bold text-pop-up-top">Doctors</h2>
        </div>
        <div class="row justify-content-between">
            @foreach ($doctors as $doctor)
                <div class="col-12 col-md-6 col-lg-3 text-center">
                    <a href="{{ route('guest.doctors.show', ['slug' => $doctor->slug]) }}">
                        <h2 class="font-weight-bold pb-3">{{ $doctor->name }} {{ $doctor->surname }}</h2>
                        <p class="text-secondary">{{ $doctor->address }}</p>
                    </a>
                </div>
            @endforeach
        </div>
        </div>
    </section>
@endsection
