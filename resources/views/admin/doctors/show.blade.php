{{-- Profilo privato del medico --}}

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="main-profile">
        
              <!-- Breadcrumb -->
              <div aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Torna alla dashboard</a></li>
                </ol>
              </div>
              <!-- /Breadcrumb -->
        
              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card border-0">
                    <div class="card-body card-profile">
                      <div class="d-flex flex-column align-items-center text-center">
                        <div class="photo">
                            @if (!empty($doctor->photo))
                                <img width="180" src="{{ asset('storage/' . $doctor->photo) }}" alt="{{ $doctor->name }}">
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
                          <a href="{{ route('admin.doctors.edit', $doctor) }}" type="button" class="edit-btn mr-2">Modifica</a>
                          <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="POST" class="d-inline-block"
                          onsubmit="return confirm('Stai per eliminare il tuo account e i relativi dati. SEI SICURO?')">
                            @csrf
                            @method('DELETE')
                            <button class="red-btn" type="submit">Elimina</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-8">
                  <div class="card border-0 mb-3">
                    <div class="card-body card-profile">
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
                            <a class="cv-btn" href="{{ asset('storage/' . $doctor->cv) }}" download="{{ $doctor->cv }}">
                                Download CV
                            </a>
                        </div>
                      </div>
                    </div>
                  </div>
    
                </div>
              </div>
    
            </div>
        </div>

@endsection
