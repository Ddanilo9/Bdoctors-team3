@extends('layouts.app')

<!--Title-->
@section('metaTitle','BDoctors - Consulta il Medico')

<!--Main-->
@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <a class="d-flex align-items-center" href="{{ route('home', $doctor) }}">
                <?xml version="1.0" encoding="utf-8"?>
                <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"> <svg
                    width="26" height="26" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" fill="#6cb2eb">
                    <g>
                        <path
                            d="M 4,15.004C 4,15.132, 4.028,15.26, 4.078,15.382c 0.048,0.118, 0.12,0.224, 0.208,0.314 C 4.288,15.7, 4.29,15.704, 4.292,15.708l 6,6c 0.39,0.39, 1.024,0.39, 1.414,0c 0.39-0.39, 0.39-1.024,0-1.414L 7.414,16L 27,16 C 27.552,16, 28,15.552, 28,15C 28,14.448, 27.552,14, 27,14L 7.414,14 l 4.292-4.292c 0.39-0.39, 0.39-1.024,0-1.414 c-0.39-0.39-1.024-0.39-1.414,0l-6,6C 4.29,14.296, 4.288,14.302, 4.286,14.304C 4.198,14.394, 4.126,14.5, 4.078,14.618 C 4.026,14.74, 4,14.87, 4,15l0,0C 4,15.002, 4,15.002, 4,15.004z">
                        </path>
                    </g>
                </svg>
                <div class="text-info font-weight-bold pl-1 ">Torna indietro</div>
            </a>
        </div>
        <div class="row">
            <div class="col-8">
                <h2 class="display-3 py-3">{{ $doctor->name }} {{ $doctor->surname }}</h2>

                <div class="info p-3 d-flex align-items-center">
                    <div class="photo">

                        @if (!empty($doctor->photo))
                            <img width="250" src="{{ asset('storage/' . $doctor->photo) }}" alt="{{ $doctor->name }}">
                        @else
                            <img width="250" src="{{ asset('img/no-image.png') }}" alt="{{ $doctor->name }}">
                        @endif
                    </div>

                    <section class="specs ml-4 mt-3">
                        <h2>Dott.{{ $doctor->name }} {{ $doctor->surname }}</h2>
                        <div class="vote mt-4 font-weight-bold">Voto Medio: {{ $doctor->avg }}</div>

                        <div class="specialization mt-4">
                            <div class="font-weight-bold">Le tue specializzazioni: </div>
                            @foreach ($doctor->specializations as $s)
                                <div class="badge badge-info p-2 my-2 text-white">{{ $s->spec_name }}</div>
                            @endforeach
                        </div>
                    </section>
                </div>
                <div>
                    <h3 class="font-weight-bold mt-3">Informazioni:</h3>
                    <div class="address mt-2">
                        <span class="font-weight-bold">Indirizzo: </span>{{ $doctor->address }}
                    </div>
                    <div class="phone">
                        <span class="font-weight-bold">Telefono: </span>{{ $doctor->telephone }}
                    </div>
                    <h3 class="font-weight-bold mt-4">Prestazioni offerte:</h3>
                    <div class="services my-2">
                        {{ $doctor->services }}
                    </div>
                </div>
                <div class="cv my-2">
                    <a class="btn btn-outline-info" href="{{ asset('storage/' . $doctor->cv) }}"
                        download="{{ $doctor->cv }}">
                        Download CV
                    </a>
                </div>
            </div>
        </div>

        {{-- Send Message --}}
        <div class="container my-3">
            <div class="row">
                <div class="col-8">
                    <h2>Contatta il medico privatamente:</h2>
                </div>
                <div class="col-4 text-left d-flex justify-content-end align-items-center">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('messages.store') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" value="" name="name"
                                aria-describedby="helpTitle" placeholder="inserisci il nome">
                            <small id="helpName" class="form-text text-muted">Inserisci il tuo Nome.</small>
                            @error('name')
                                <div id="name" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                id="email" value="" name="email"
                                aria-describedby="helpTitle" placeholder="inserisci il nome">
                            <small id="helpemail" class="form-text text-muted">Inserirsci la Mail</small>
                            @error('email')
                                <div id="email" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="message" class="font-weight-bold">messaggio</label>
                            <textarea class="form-control" id="message" name="message" rows="10"
                                placeholder="Scrivi qui il tuo messaggio" required @error('message') is-invalid @enderror></textarea>
                        </div>
                        @error('message')
                            <div id="message" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input hidden type="number" name="doctor_id" value="{{ $doctor->id }}">    
                        <button type="submit" class="btn btn-primary">Invia</button>
                    </form>
                </div>
            </div>
        </div>
        


        {{-- Review index --}}
        <div class="my-4">
            <h2>Recensioni:</h2>
            <div style="height: 500px; overflow-y:scroll" class="reviews-received border my-1 p-3">
            
                @forelse ($reviews as $review)
                    <div class="review">

                        <h4><span class="font-weight-bold">{{ $review->name }}</span> ha scritto:</h4>
                        <div class="mess d-flex border">
                            <div class="recensione font-italic px-3 pb-2 ml-3">{{ $review->comment }}"</div>
                        </div>
                        <p class="mb-4">{{ $review->created_at->diffForHumans() }}.</p>
                    </div>
                @empty
                    <h4>Nessuna recensione</h4>
                @endforelse
            </div>
        </div>

        {{-- Review create --}}
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h2>Lascia una Recensione</h2>
                </div>
                <div class="col-4 text-left d-flex justify-content-end align-items-center">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('store.vote', $doctor->id) }}" method="post">
                        @csrf
                        @method('POST')

                        <div class="form-row align-items-center">
                            <div class="col-auto my-1">
                                <label class="mr-sm-2 sr-only" for="number">Inserisci il voto</label>
                                <select name="number" class="custom-select mr-sm-2 font-weight-bold" id="number">
                                    <option disabled selected value>Voto</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Invia</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('reviews.store') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" value="" name="name"
                                aria-describedby="helpTitle" placeholder="inserisci il nome">
                            <small id="helpName" class="form-text text-muted">Inserisci il tuo Nome.</small>
                            @error('name')
                                <div id="name" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="comment" class="font-weight-bold">Commento</label>
                            <textarea class="form-control" id="comment" name="comment" rows="10"
                                placeholder="Inserisci la tua recensione" required @error('comment') is-invalid @enderror></textarea>
                        </div>
                        @error('comment')
                            <div id="comment" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input hidden type="number" name="doctor_id" value="{{ $doctor->id }}">
                        <button type="submit" class="btn btn-primary">Invia</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<!--End Main-->
