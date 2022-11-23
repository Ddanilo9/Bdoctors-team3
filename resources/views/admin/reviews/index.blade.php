@extends('layouts.app')

@section('content')
<div class="message-container"> 
    {{-- REVIEWS --}}
    <h2 class="mt-4 font-weight-bold">Recensioni ricevute</h2>
    
    <div class="reviews-received border p-3">
        @forelse ($reviews as $review)
        <div class="review"> 
            
            <h4><span class="font-weight-bold">{{ $review->name }}</span> ha scritto:</h4>
                <div class="mess d-flex border">
                    <div class="recensione font-italic px-3 pb-2 ml-3">{{ $review->comment }}"</div>
                </div>
                <p class="mb-4">{{$review->created_at->diffForHumans()}}.</p>
            </div>
        @empty
            <h4>Nessun messaggio</h4>
        @endforelse
    </div>
</div>

@endsection