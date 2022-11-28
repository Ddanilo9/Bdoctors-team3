@extends('layouts.app-vue')

<!-- Main -->

@section('content')

    <section class="hero">
        <div class="container">
            <h2 class="text-center">Come possiamo aiutarti?</h2>
            <h5 class="text-center">Ricerca medico in questa specializzazione:</h5>
        </div>

    {{-- search bar --}}

        {{-- <form action="http://127.0.0.1:8000/research"  method="GET">
            <div class="form-group">
                <label for="specialization"></label>
                <select class="form-control" id="specialization" name="specialization">
                    @foreach ($specializations as $specialization)
                        <option value="{{ $specialization->spec_name }}">{{ $specialization->spec_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-info my-2 my-sm-0 "><i class="fa fa-search" aria-hidden="true"></i> Cerca specializzazione</button>
        </form> --}}
        <div class="search-container d-flex justify-content-center">
            <form class="searchbar-home" action="http://127.0.0.1:8000/research"  method="GET">
                <input class="chosen-value" id="specialization" name="specialization" type="text" value="" placeholder="Scrivi per filtrare" autocomplete="off">
                <ul class="value-list">
                    @foreach ($specializations as $specialization)
                    <li class="spec-li">{{ $specialization->spec_name }}</li>
                    @endforeach
                </ul>
                {{-- <button type="submit" class="btn btn-info">Cerca specializzazione</button> --}}
            </form>
        </div>
    </section>


    <carousel></carousel>
    <about-us></about-us>


    <section class="container-fluid mt-5 pb-3 border-0">
        <div class="title text-center">
            <h2 class="text-dark font-weight-bold text-pop-up-top">Doctors</h2>
        </div>
        <div class="row justify-content-between">
            @foreach ($doctors as $doctor)
                <div class="col-12 col-md-6 col-lg-3 text-center">
                    <a href="{{ route('guest.doctors.show', ['slug' => $doctor->slug]) }}">
                        <h2 class="font-weight-bold pb-3">{{ $doctor->name }} {{ $doctor->surname }}</h2>
                        <div class="photo">

                            @if(!empty($doctor->photo))
                                <img width="250" src="{{ asset('storage/' . $doctor->photo) }}" alt="{{ $doctor->name }}">
                            @else
                                <img width="250" src="{{ asset('img/no-image.png') }}" alt="{{ $doctor->name }}">
                            @endif
                        </div>
                        <p class="text-secondary">{{ $doctor->address }}</p>
                    </a>
                </div>
            @endforeach
        </div>
        </div>
    </section>

@endsection
    



