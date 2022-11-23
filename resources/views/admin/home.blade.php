{{-- dashboard del medico --}}

@extends('layouts.app')

@section('content')

<div class="dashboard__body">
    <div class="dashboard__navbar">
        <h4>Gestisci</h4>

        <div class="dashboard__links">
            <a class="dashboard__link"
        href="{{ route('admin.messages.index') }}">Messaggi</a>
            <a class="dashboard__link"
        href="{{ route('admin.reviews.index') }}">Recensioni</a>
            <a class="dashboard__link"
        href="{{ route('admin.stats.index') }}">Statistiche</a>
        </div>
    </div>

    {{$stars->number}}

    <div class="dashboard__main">
        <div class="dashboard__header">
            <h1 class="dashboard__title">Benvenuto, {{ $doctor->name }} {{$doctor->surname}}</h1>
            <a class="dashboard__button" href="">Effettua l'upgrade</a>
        </div>

        <div class="dashboard-grid">
            <div class="dashboard-card">
                <h5>Ultimo Messaggio</h5>

                <p>{{ $lastMessage->message }}</p>

                <a href="{{ route('admin.messages.index') }}">vedi altri</a>

            </div>
            <div class="dashboard-card">
                <h5>Ultima Recensione</h5>

                <p>{{ $lastReview->comment }}</p>

                <a href="{{ route('admin.reviews.index') }}">vedi altri</a></div>
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
