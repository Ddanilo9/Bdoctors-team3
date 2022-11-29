@extends('layouts.app')

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
            <div class="col-12">
                <h2 class="display-4 py-3">{{ $doctor->name }} {{ $doctor->surname }}</h2>

                <div class="info p-3 d-flex align-items-center flex-column flex-md-row justify-content-center justify-content-lg-start">
                    <div class="photo">

                        @if (!empty($doctor->photo))
                            <img width="250" src="{{ asset('storage/' . $doctor->photo) }}" alt="{{ $doctor->name }}">
                        @else
                            <img width="250" src="{{ asset('img/no-image.png') }}" alt="{{ $doctor->name }}">
                        @endif
                    </div>

                    <section class="specs ml-4 mt-3 get-in-touch">
                        <h2>Dott.{{ $doctor->name }} {{ $doctor->surname }}</h2>
                        <div class="vote mt-4 font-weight-bold">Voto Medio: {{ $doctor->avg }}</div>
                        <form action="{{ route('store.vote', $doctor->id) }}" method="post">
                            @csrf
                            @method('POST')
    
                            <div class="form-row wrap-no align-items-center ">
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
                                <div class="form-field col-lg-12">
                                    <input class="submit-btn" type="submit" value="Submit">
                                </div>
                            </div>
                        </form>
                        <div class="specialization mt-4">
                            <div class="font-weight-bold">Specializzato/a in: </div>
                            @foreach ($doctor->specializations as $s)
                                <div class="badge badge-info p-3 my-2 text-white f-5">{{ $s->spec_name }}</div>
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
        <section class="get-in-touch">
            <h1 class="title">Contatta il medico privatamente:</h1>
            <form action="{{ route('messages.store') }}" method="POST" class="contact-form row">
                @csrf
                @method('POST')

                <div class="form-field col-lg-6">
                    <input type="text" class=" input-text js-input form-control @error('name') is-invalid @enderror"
                        id="name" name="name">
                    <label class="label" for="name">Name</label>
                    @error('name')
                        <div id="name" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-field col-lg-6">
                    <input type="email" class=" input-text js-input form-control @error('email') is-invalid @enderror"
                        id="email" name="email">
                    <label class="label" for="email">Email</label>
                    @error('email')
                        <div id="email" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-field col-lg-6">
                    <textarea class="form-control areat" id="message" name="message" rows="5"
                        placeholder="Scrivi qui il tuo messaggio" required @error('message') is-invalid @enderror></textarea>
                    @error('name')
                        <div id="message" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input hidden type="number" name="doctor_id" value="{{ $doctor->id }}">
                <div class="form-field col-lg-12">
                    <input class="submit-btn" type="submit" value="Submit">
                </div>
            </form>
        </section>



        {{-- Review index --}}
        <div class='container-5 mx-auto mt-5 col-md-10 col-11'>
            <div class="header text-muted"> Recensioni: </div>
            <div class="row" style="justify-content: center">
                @forelse ($reviews as $r)
                    
                <div class="card-5 col-md-3 col-11">
                    <div class="card-5-content">
                        <div class="card-5-body p-0 md-box">
                            <div class="profile mb-4 mt-3"> <img src="{{ asset('img/no-image.png') }}"> </div>
                            <div class="card-5-subtitle">
                                <h6><span class="font-weight-bold">{{ $r->name }}</span> ha scritto:</h6>
                                <p> <small class="text-muted">
                                    <i class="fas fa-quote-left"></i>
                                    {{$r->comment}}
                                    <i class="fas fa-quote-left fa-flip-horizontal"></i> </small> 
                                </p>
                            </div>
                        </div>
                        <p class="mb-4">{{ $r->created_at->diffForHumans() }}.</p>
                    </div>
                </div>
                @empty
                <h4>Nessuna recensione</h4>
                @endforelse
            </div>
        </div>

        <section class="get-in-touch">
            <h1 class="title">Scrivi una recensione:</h1>
            <form action="{{ route('reviews.store') }}" method="POST" class="contact-form">
                @csrf
                @method('POST')

                <div class="form-field col-lg-6">
                    <input type="text" class=" input-text js-input form-control @error('name') is-invalid @enderror"
                        id="name" name="name">
                    <label class="label" for="name">Name</label>
                    @error('name')
                        <div id="name" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-field col-lg-6">
                    <textarea class="form-control areat" id="message" name="message" rows="5"
                        placeholder="Scrivi qui il tuo messaggio" required @error('message') is-invalid @enderror></textarea>
                    @error('name')
                        <div id="message" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input hidden type="number" name="doctor_id" value="{{ $doctor->id }}">
                <div class="form-field col-lg-12">
                    <input class="submit-btn" type="submit" value="Submit">
                </div>
            </form>
        </section>
    </div>
@endsection
