{{-- dashboard del medico --}}

@extends('layouts.app')

@section('content')

<div class="dashboard__body">
    <div class="dashboard__navbar">
        <a class="dashboard__link messages-link"
        href="{{ route('admin.messages.index') }}">Messaggi</a>
        <a class="dashboard__link reviews-link"
        href="{{ route('admin.reviews.index') }}">Recensioni</a>
        <a class="dashboard__link stats-link"
        href="{{ route('admin.stats.index') }}">Statistiche</a>
    </div>

    <div class="dashboard__main">
        <div class="dashboard__header">
            <h1 class="dashboard__title">Benvenuto, {{ $doctor->name }} {{$doctor->surname}}</h1>
            <a class="dashboard__button" href="">Effettua l'upgrade</a>

            <a class="dashboard__button button--edit" href="">Modifica Profilo</a>
            {{-- <a class="dashboard__button" href="{{ route('admin/doctors/{doctor}/edit') }}">Modifica Profilo</a> --}}
        </div>

        {{-- <p>{{ $doctor->stars->number }}</p> --}}
        <ul>
            @foreach($doctor->specializations as $s)
                <li>{{ $s->name }}</li>
            @endforeach
        </ul>
    </div>
</div>

@endsection
