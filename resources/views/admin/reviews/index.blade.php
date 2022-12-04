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
                <a class="dashboard__link" href="{{ route('messages.index') }}">
                    <i class="fa-regular fa-envelope"></i>
                    <span>Messaggi</span>
                </a>
            </li>
            <li>
                <a class="dashboard__link is-active" href="{{ route('reviews.index') }}">
                    <i class="fa-regular fa-star"></i>
                    <span>Recensioni</span>
                </a>
            </li>
            {{-- <li>
                <a class="dashboard__link" href="{{ route('admin.stats.index') }}">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Statistiche</span>
                </a>
            </li> --}}
        </ul>
    </nav>
    {{-- REVIEWS --}}
    <div class="dashboard__main">
        <h2 class="mt-4 font-weight-bold">Recensioni ricevute</h2>

        <div class="reviews-received border p-3">
            @forelse ($reviews as $review)

                <div class="review">
                    <h4>
                        <span class="font-weight-bold">{{ $review->name }}</span>
                        ha scritto:
                    </h4>

                    <div class="mess d-flex">
                        <div class="recensione font-italic px-3 pb-2 ml-3">"{{ $review->comment }}"</div>
                    </div>

                    <p>{{$review->created_at->diffForHumans()}}.</p>
                </div>
            @empty
                <h4>Nessun messaggio</h4>
            @endforelse
        </div>
    </div>
</div>

@endsection