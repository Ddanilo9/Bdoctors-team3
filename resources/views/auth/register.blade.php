@extends('layouts.app')

@php
    $specList = [
            'Allergologia',
            'Anatomia Patologica',
            'Andrologia',
            'Angiologia Medica',
            'Cardiochirurgia',
            'Cardiologia',
            'Cardiologia pediatrica',
            'Chirurgia Generale',
            'Chirurgia Maxillo-facciale',
            'Chirurgia Pediatrica',
            'Chirurgia Plastica',
            'Chirurgia Proctologica e Proctologia',
            'Chirurgia Toracica',
            'Chirurgia Vascolare',
            'Dermatologia e Venereologia',
            'Diabetologia',
            'Dietologia',
            'Ecografia e Doppler',
            'Ematologia',
            'Endocrinologia',
            'Fisiatria',
            'Fisioterapia',
            'Gastroenterologia',
            'Genetica Medica',
            'Geriatria e Gerontologia',
            'Ginecologia e Ostetricia',
            'Immunologia',
            'Infermieristica',
            'Infettivologia e Malattie Infettive',
            'Medicina del Dolore',
            'Medicina dello Sport',
            'Medicina Estetica',
            'Medicina Interna',
            'Medicina Legale',
            'Medicina Nucleare',
            'Nefrologia',
            'Neurochirurgia',
            'Neurofisiopatologia',
            'Neurologia',
            'Neuropsichiatria Infantile',
            'Oculistica',
            'Odontoiatria',
            'Omeopatia e Agopuntura',
            'Oncologia',
            'Ortopedia e Traumatologia',
            'Otorinolaringoiatria',
            'Pediatria',
            'Pneumologia e Malattie',
            'Respiratorie',
            'Psichiatria',
            'Psicologia',
            'Radiologia Interventistica',
            'Radiologia TAC e Risonanza',
            'Reumatologia',
            'Senologia',
            'Urologia',
        ];
@endphp

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="name" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="container">
                            <H5 class="text-center">Specializzazioni:</H5>
                            <div class="form-group row justify-content-center ml-5">
                                @foreach ($specList as $s)
                                    <div class="col-4 ">
                                        <input class="form-check-input  @error('spec_name') is-invalid @enderror"
                                            name="spec_name[]" type="checkbox" value="{{ $s }}"
                                            id="spec_name">
                                        <label class="form-check-label" for="spec_name">
                                            {{ $s }}
                                        </label>
                                        @error('spec_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
