{{-- dashboard del medico --}}

@extends('layouts.app')

@php
use Carbon\Carbon;
    
$now = Carbon::now()->format('Y-m-d H:i:s')
@endphp

@section('content')

<div class="dashboard__body">
    <div class="dashboard__navbar">
        <h4>Gestisci</h4>

        <div class="dashboard__links">
            <a class="dashboard__link"
        href="{{ route('messages.index') }}">Messaggi</a>
            <a class="dashboard__link"
        href="{{ route('reviews.index') }}">Recensioni</a>
            <a class="dashboard__link"
        href="{{ route('admin.stats.index') }}">Statistiche</a>
        </div>
    </div>

    {{-- {{$stars->number}} --}}

    <div class="dashboard__main">
        <div class="dashboard__header">
            <h1 class="dashboard__title">Benvenuto, {{ $doctor->name }} {{$doctor->surname}}</h1>
            @php
            // dd($dates);
            // dd($lastSponsor);
            @endphp
    	    @if (count($doctor->plans) == 0 || $lastSponsor < $now)
            <a class="dashboard__button" href="{{ route('admin.plans.create') }}">Effettua l'upgrade</a>
            @else{{--(count($doctor->plans) > 0  && $lastSponsor > Carbon::now())--}}
                <div class="badge badge-info p-2 font-weight-bold text-white ">Sponsorizzazione attiva fino al {{$lastSponsor}}</div>
            @endif

        </div>

        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h5>Ultimo Messaggio</h5>

                @if (!empty($lastMessage->message))
                <p>{{ $lastMessage->message }}</p>
                @else
                <h4 class="font-weight-bold">Nessun messaggio</h4>
                @endif

                <a href="{{ route('messages.index') }}">vedi altri</a>

            </div>
            <div class="dashboard-card">
                <h5>Ultima Recensione</h5>

                @if (!empty($lastReview->comment))
                <p>{{ $lastReview->comment }}</p>
                @else
                <h4 class="font-weight-bold">Nessun messaggio</h4>
                @endif

                <a href="{{ route('reviews.index') }}">vedi altri</a></div>
            <div class="dashboard-card">ciao</div>

        </div>

        {{-- <p>{{ $doctor->stars->number }}</p> --}}
        <ul>

    
            {{-- @foreach($messages as $m)
                <li>{{ $m->message }}</li>
            @endforeach --}}
        </ul>
    </div>
</div>

@endsection
