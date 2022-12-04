@extends('layouts.app')

@php
           $specList = [
            'Allergologia',
            'Cardiologia',
            'Chirurgia Generale',
            'Chirurgia Plastica',
            'Dermatologia',
            'Dietologia',
            'Fisioterapia',
            'Ginecologia e Ostetricia',
            'Medicina dello Sport',
            'Neurologia',
            'Oculistica',
            'Odontoiatria',
            'Otorinolaringoiatria',
            'Pediatria',
            'Psichiatria',
            'Psicologia',
            'Radiologia',
            'Urologia',
        ];
@endphp

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center my-5">
            <div class="col-md-8">
                <div class="card border-0 card-auth">
                    <div class="card-header header-auth font-weight-bold text-white text-center">{{ __('Registrazione') }}
                    </div>

                    <div class="card-body">
                        <form class="contact-form needs-validation"  novalidate method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- name --}}
                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome*') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="input-text form-b @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- surname --}}
                            <div class="form-group row">
                                <label for="surname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Cognome*') }}</label>
                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="input-text form-b @error('surname') is-invalid @enderror" name="surname"
                                        value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- address --}}
                            <div class="form-group row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo*') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="input-text form-b @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required autocomplete="address" autofocus>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            {{-- specialization checkbox --}}
                            <div class="container">
                                <H5 class="text-center">Specializzazioni:*</H5>
                                <div class="text-center" style="visibility:hidden; color:red;" id="chk_option_error">
                                    Scegli almeno una specializzazione.
                                </div>
                                <ul class="ks-cboxtags">
                                    @foreach ($specList as $s)
                                        <li>
                                            <input type="checkbox" id="{{ $s }}" name="spec_name[]"
                                                class="@error('spec_name') is-invalid @enderror"
                                                value="{{ $s }}">
                                            <label for="{{ $s }}">{{ $s }}</label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            {{-- email --}}
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail*') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="input-text form-b @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- password --}}
                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="input-text form-b @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="input-text js-input form-b"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="submit-btn">
                                        {{ __('Registrati') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ mix('js/checkboxValidation.js') }}" defer></script>
@endsection
