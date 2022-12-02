@extends('layouts.app')

@section('content')


    <div class="dashboard__body">
        <nav class="dashboard__navbar">
        <h4>Area Personale</h4>

        <ul class="dashboard__links">
            <li>
                <a class="dashboard__link" href="{{ route('admin.home') }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a class="dashboard__link is-active" href="{{ route('messages.index') }}">
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
        <h2 class="font-weight-bold"><i class="far fa-envelope mr-4"></i>Messaggi ricevuti:</h2>
        <div class="message-img">
            <img src="{{ asset('img/email.svg') }}" alt="">
        </div>
        <div class="messages-received border p-3">
            @forelse ($messages as $message)
                <div class="message">
                    <h4 class="m-0">Hai ricevuto un messaggio da: <span
                            class="font-weight-bold">{{ $message->name }}</span></h4>
                    <p class="m-0 ml-2">{{ $message->created_at->diffForHumans() }}</p>
                    <p class="ml-2 mb-0 font-weight-bold">Indirizzo mail di {{ $message->name }}: <a
                            href="mailto:{{ $message->email }}">{{ $message->email }}</a></p>
                    <div class="text-area d-flex flex-wrap">
                        <div class="ml-2 font-weight-bold"><i class="fas fa-envelope mr-2"></i>Messaggio:</div>
                        <div class="mess border px-3 pb-2 ml-3 mb-5 font-italic">{{ $message->message }}</div>
                    </div>
                </div>
            @empty
                <h4 class="font-weight-bold">Nessun messaggio</h4>
            @endforelse
        </div>
    </div>
@endsection
