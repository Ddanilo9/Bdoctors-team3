{{-- dashboard del medico --}}

@extends('layouts.app')

@php
use Carbon\Carbon;

$now = Carbon::now()->format('Y-m-d H:i:s')
@endphp

@section('content')

<div id='app' class="dashboard__body">
    <payment-button></payment-button>
    <nav class="dashboard__navbar">
        <h4>Area Personale</h4>

        <ul class="dashboard__links">
            <li>
                <a class="dashboard__link" href="{{ route('messages.index') }}">
                    <i class="fa-regular fa-envelope"></i>
                    <span>Messaggi</span>
                </a>
            </li>
            <li>
                <a class="dashboard__link" href="{{ route('reviews.index') }}">
                    <i class="fa-regular fa-star"></i>
                    <span>Recensioni</span>
                </a>
            </li>
            <li>
                <a class="dashboard__link" href="{{ route('admin.stats.index') }}">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Statistiche</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="dashboard__main">
        <div class="dashboard__header">
            <h1 class="dashboard__title">Benvenuto, {{ $doctor->name }} {{$doctor->surname}}</h1>

            @if (count($doctor->plans) == 0 || $lastSponsor < $now)
                <a class="dashboard__button" href="{{ route('admin.plans.create') }}">Effettua l'upgrade</a>
            @else
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

                <a href="{{ route('messages.index') }}">vedi tutti</a>

            </div>
            <div class="dashboard-card">
                <h5>Ultima Recensione</h5>

                @if (!empty($lastReview->comment))
                <p>{{ $lastReview->comment }}</p>
                @else
                <h4 class="font-weight-bold">Nessun messaggio</h4>
                @endif

                <a href="{{ route('reviews.index') }}">vedi tutti</a></div>
            <div class="dashboard-card">ciao</div>
        </div>
    </div>
</div>

@endsection
