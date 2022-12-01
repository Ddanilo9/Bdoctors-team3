{{-- Modifica dei dati del dottore --}}

@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>Crea un nuovo profilo Dottore</h1>
            </div>
            <div class="col-4 text-left d-flex justify-content-end align-items-center">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12"> --}}

<div class="container py-1">
    <div class="row justify-content-center my-5">
        <div class="col-md-10">
            <div class="card border-0">
                <div class="card-header font-weight-bold text-white text-center">{{ __('Modifica il tuo profilo') }}</div>

                <div class="card-body">
                    <form class="contact-form" action="{{ route('admin.doctors.update', $doctor) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')

                        {{-- image --}}
                        <div class="form-group">
                            <label for="image" class="font-weight-bold">Foto Profilo</label>

                            <div class="custom-file ">
                                <label for="image" class="font-weight-bold">Scegli immagine</label>
                                <input type="file" name="image"
                                    class=" @error('image') is-invalid @endif" id="image">
                                @error('image')
                                <div id="image" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        {{-- name --}}
                        <div class="form-group">
                                <label for="name" class="font-weight-bold">Nome</label>
                                <input type="text" class="form-control input-text form-b @error('name') is-invalid @enderror" id="name"
                                    value="{{ old('name', $doctor->name) }}" name="name" aria-describedby="helpTitle"
                                    placeholder="inserisci il nome">
                                {{-- <small id="helpName" class="form-text text-muted">Inserisci il tuo Nome.</small> --}}
                                @error('name')
                                    <div id="name" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="surname" class="font-weight-bold">Cognome</label>
                                <input type="text" class="form-control input-text form-b @error('surname') is-invalid @enderror" id="surname"
                                    value="{{ old('surname', $doctor->surname) }}" name="surname" aria-describedby="helpSurname"
                                    placeholder="inserisci il cognome">
                                {{-- <small id="helpSurname" class="form-text text-muted">Inserisci il tuo Cognome.</small> --}}
                                @error('surname')
                                    <div id="surname" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        {{-- spec checkbox --}}
                            <div class="form-group">
                                <label for="specialization" class="font-weight-bold">Specializzazioni</label>

                                {{-- @foreach ($specializations as $key => $spec)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="specializations[]"
                                            @if (in_array($spec->id, old('specializations', $doctor->specializations->pluck('id')->all()))) checked @endif type="checkbox"
                                            id="spec-{{ $spec->id }}" value="{{ $spec->id }}">
                                        <label class="form-check-label"
                                            for="spec-{{ $spec->id }}">{{ $spec->spec_name }}</label>
                                    </div>
                                @endforeach --}}
                                <ul class="ks-cboxtags">
                                    @foreach ($specializations as $spec)
                                        <li>
                                            <input type="checkbox" id="spec-{{ $spec->id }}" name="specializations[]"
                                            class="" 
                                            @if (in_array($spec->id, old('specializations', $doctor->specializations->pluck('id')->all()))) checked @endif
                                            value="{{ $spec->id }}">
                                            <label class="form-check-label"
                                            for="spec-{{ $spec->id }}">{{ $spec->spec_name }}</label>
                                        </li>
                                    @endforeach
                                    </ul>
                            </div>

                            <div class="form-group">
                                <label for="address" class="font-weight-bold">Indirizzo</label>
                                <input type="text" class="form-control input-text form-b @error('address') is-invalid @enderror" id="address"
                                    value="{{ old('address', $doctor->address) }}" name="address"
                                    aria-describedby="helpAddress" placeholder="inserisci il tuo indirizzo">
                                {{-- <small id="helpAddress" class="form-text text-muted">Inserisci il tuo indirizzo.</small> --}}
                                @error('address')
                                    <div id="address" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-outline">
                                <label for="telephone" class="font-weight-bold">Numero di telefono</label>
                                <input type="tel" class="form-control input-text form-b @error('telephone') is-invalid @enderror"
                                    id="telephone" value="{{ old('telephone', $doctor->telephone) }}" name="telephone"
                                    aria-describedby="helpTelephone" placeholder="inserisci il tuo numero">
                                {{-- <small id="helpTelephone" class="form-text text-muted">Inserisci il tuo umero di
                                    telefono.</small> --}}
                                @error('telephone')
                                    <div id="telephone" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="services" class="font-weight-bold pt-3">Contenuto</label>
                                <textarea class="form-control areat" id="services" name="services" rows="10"
                                    placeholder="Inserisci il contenuto del post" @error('services') is-invalid @enderror>{{ old('services', $doctor->services) }}</textarea>
                            </div>
                            @error('services')
                                <div id="services" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror


                            <div class="form-group">
                                <label for="cv" class="font-weight-bold">Inserisci il tuo CV</label>

                                <div class="custom-file ">
                                    <label for="image" class="font-weight-bold">Scegli il tuo CV..</label>
                                    <input type="file" name="cv" class=" @error('cv') is-invalid @endif" id="cv">
                                @error('cv')
                                    <div id="cv" class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div> 

                            <button type="submit" class="submit-btn">Conferma</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
