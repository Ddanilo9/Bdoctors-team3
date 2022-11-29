@extends('layouts.app-vue')

<!-- Main -->

@section('content')
<div id="app">
    <section class="hero">
        <div class="hero-center" >
            <div class="titles">
                <h2 class="text-center display-3">Come possiamo aiutarti?</h2>
                <h5 class="text-center h2">Ricerca medico in questa specializzazione:</h5>
            </div>
            
            {{-- search bar --}}
            
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
        </div>
    </section>


    <carousel></carousel>
    <advert-doc></advert-doc>
    <howworks></howworks>
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
</div>

@endsection
    



