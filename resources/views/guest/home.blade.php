@extends('layouts.app-vue')

<!-- Main -->

@section('content')
<div id="app">
    <section class="hero">
        <div class="hero-center" >
            <div class="titles">
                <h2 style="color: #031737;" class="text-center display-3 font-weight-bold">Come possiamo aiutarti?</h2>
                <h5 style="color: #031737;" class="text-center h2">Ricerca medico in questa specializzazione:</h5>
            </div>

            <div class="search-container d-flex justify-content-center">
                <form class="searchbar-home d-flex justify-content-end" action="http://127.0.0.1:8000/research"  method="GET">
                    <div>
                        <input class="chosen-value" id="specialization" name="specialization" type="text" value="" placeholder="Scrivi per filtrare" autocomplete="off">
                        <ul class="value-list">
                            @foreach ($specializations as $specialization)
                            <li class="spec-li">{{ $specialization->spec_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="submit" class="search-btn"><i class="search-icon fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </section>

    <section class="section-carousel">
        <h3 style="color: #0d53b3;" class="text-center mb-5 pt-5 h1 font-weight-bold">I medici consigliati da noi:</h3>
        <carousel></carousel>
    </section class="carousel">
    <howworks></howworks>
    {{-- <about-us></about-us> --}}
    <they-talks></they-talks>
    {{-- <about-us></about-us> --}}

</div>
@endsection




