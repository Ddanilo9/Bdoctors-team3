@extends('layouts.app')

<!--Title-->
@section('metaTitle', 'BDoctors - Consulta il Medico')

<!--Main-->
@section('content')

    <div class="container">
        <div class="main-profile">

            <!-- Breadcrumb -->
            <div aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home', $doctor) }}">Torna all' homepage</a></li>
                </ol>
            </div>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-4">
                    <div class="card border-0">
                        <div class="card-body card-profile-guest">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="photo">
                                    @if (!empty($doctor->photo))
                                        <img width="180" src="{{ asset('storage/' . $doctor->photo) }}"
                                            alt="{{ $doctor->name }}">
                                    @else
                                        <img width="180" src="{{ asset('img/no-image.png') }}" alt="{{ $doctor->name }}">
                                    @endif
                                </div>
                                <div class="mt-3">
                                    <h4>Dott. {{ $doctor->name }} {{ $doctor->surname }}</h4>
                                    <p class="text-secondary mb-1">
                                        @foreach ($doctor->specializations as $s)
                                            <div class="badge bedge-color p-2 text-white">{{ $s->spec_name }}</div>
                                        @endforeach
                                    </p>
                                    <p class="vote-avg">Voto Medio: {{ $doctor->avg }}</p>
                                    <p>
                                    <form action="{{ route('store.vote', $doctor->id) }}" method="post">
                                        @csrf
                                        @method('POST')

                                        <div class="form-row wrap-no align-items-center justify-content-center">
                                            <div class="col-auto">
                                                <select name="number" class="vote-select mr-sm-1 font-weight-bold"
                                                    id="number">
                                                    {{-- <option disabled selected value>Voto</option> --}}
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="form-field col-lg-5 ml-1">
                                                <input class="submit-btn" type="submit" value="Vota">
                                            </div>
                                        </div>
                                    </form>
                                    </p>
                                    <button class="message-btn" data-toggle="modal" data-target="#modalContactForm">Invia un
                                        messaggio
                                    </button>

                                    {{-- message modal --}}

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card border-0 mb-4">
                        <div class="card-body card-profile-guest">
                            <div class="row pt-4">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $doctor->name }} {{ $doctor->surname }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Indirizzo</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $doctor->address }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Telefono</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $doctor->telephone }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Prestazioni</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $doctor->services }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="cv-btn" href="{{ asset('storage/' . $doctor->cv) }}"
                                        download="{{ $doctor->cv }}">
                                        Download CV
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card border-0 mb-4">
                        <div class="card-body card-profile">
                            <div class="row">

                                <div class='container-5 mx-auto col-md-10 col-11'>
                                    <h4> Recensioni: </h4>
                                    <div class="row" style="justify-content: center">
                                        @forelse ($reviews as $r)
                                            <div class="card-5 col-md-3 col-11">
                                                <div class="card-5-content">
                                                    <div class="card-5-body p-0 md-box">
                                                        <div class="profile mb-4 mt-3"> <img
                                                                src="{{ asset('img/no-image.png') }}"> </div>
                                                        <div class="card-5-subtitle">
                                                            <h6><span class="font-weight-bold">{{ $r->name }}</span>
                                                                ha
                                                                scritto:</h6>
                                                            <p> <small class="text-muted">
                                                                    <i class="fas fa-quote-left"></i>
                                                                    {{ $r->comment }}
                                                                    <i class="fas fa-quote-left fa-flip-horizontal"></i>
                                                                </small>
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

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="card border-0 mb-4">
                        <div class="card-body card-profile">
                            <div class="px-3">
                                <section class="get-in-touch">
                                    <h4 class="title">Scrivi una recensione:</h4>
                                    <form action="{{ route('reviews.store') }}" method="POST"
                                        class="contact-form needs-validation" novalidate>
                                        @csrf
                                        @method('POST')

                                        <div class="form-field col">
                                            <input type="text"
                                                class=" input-text js-input form-control @error('name') is-invalid @enderror"
                                                id="name" name="name">
                                            <label class="label" for="name">Name</label>
                                            @error('name')
                                                <div id="name" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-field col">
                                            <textarea class="form-control areat" id="comment" name="comment" rows="5"
                                                placeholder="Scrivi qui il tuo messaggio" required @error('comment') is-invalid @enderror></textarea>
                                            @error('comment')
                                                <div id="comment" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <input hidden type="number" name="doctor_id" value="{{ $doctor->id }}">
                                        <div class="form-field col-lg-12">
                                            <input class="submit-btn" type="submit" value="Invia">
                                        </div>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




    {{-- modal form per inviare un messaggio al dottore --}}
    <form action="{{ route('messages.store') }}" method="POST" class="contact-form row needs-validation" novalidate>
        @csrf
        @method('POST')
        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Scrivi un
                            messaggio</h4>
                        <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body mx-3">
                        <div class="md-form mb-5 position-relative form-group">
                            <i class="fas fa-user prefix grey-text"></i>
                            <input type="text"
                                class=" input-text js-input form-control @error('name') is-invalid @enderror"
                                id="name" name="name">
                            <label class="label" for="name">Name</label>
                            @error('name')
                                <div id="name" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="md-form mb-5 position-relative form-group">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <input type="email"
                                class=" input-text js-input form-control @error('email') is-invalid @enderror"
                                id="email" name="email">
                            <label class="label" for="email">Email</label>
                            @error('email')
                                <div id="email" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="md-form mb-2 position-relative form-group">
                            <i class="fas fa-pencil-alt"></i>
                            <textarea class="form-control areat" id="message" name="message" rows="5"
                                placeholder="Scrivi qui il tuo messaggio" required @error('message') is-invalid @enderror></textarea>
                            @error('name')
                                <div id="message" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <input hidden type="number" name="doctor_id" value="{{ $doctor->id }}">
                    <div class="modal-footer form-field col-lg-12 d-flex justify-content-center">
                        <input class="submit-btn" type="submit" value="Invia">
                        <button class="close-btn" data-dismiss="modal" aria-label="Close">CHIUDI</button>
                    </div>

                </div>
            </div>
        </div>

    </form>



   
@endsection
<!--End Main-->
