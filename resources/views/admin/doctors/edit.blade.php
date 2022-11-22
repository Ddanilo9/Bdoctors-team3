{{-- Modifica dei dati del dottore --}}

@extends('layouts.app')

@section('content')
    <div class="container">
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
            <div class="col-12">
                <form action="{{ route('admin.doctors.update') }}" method="POST" {{-- enctype="multipart/form-data" --}}>
                    @csrf @method('PUT')

                    <div class="form-group">
                        <label for="image">Foto Profilo</label>

                        <div class="custom-file ">
                            <input type="file" name="image"
                                class="custom-file-input @error('image') is-invalid @endif" id="image">
                        <label class="custom-file-label" for="image">Scegli immagine...</label>
                            @error('image')
                            <div id="image" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                value="{{ old('name') }}" name="name" aria-describedby="helpTitle"
                                placeholder="inserisci il nome">
                            <small id="helpName" class="form-text text-muted">Inserisci il tuo Nome.</small>
                            @error('name')
                                <div id="name" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="surname">Cognome</label>
                            <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname"
                                value="{{ old('surname') }}" name="surname" aria-describedby="helpSurname"
                                placeholder="inserisci il cognome">
                            <small id="helpSurname" class="form-text text-muted">Inserisci il tuo Cognome.</small>
                            @error('surname')
                                <div id="surname" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label for="specialization">Specializzazione</label>
                            <select name="specialization" class="custom-select  @error('specialization') is-invalid @enderror" multiple>
                                <option value="">-- nessuna --</option>
                                @foreach ($specializations as $spec)
                                    <option @if (old('specialization') == $spec->id) selected @endif value="{{ $spec->id }}">
                                        {{ $spec->name }}</option>
                                @endforeach
                            </select>
                            <small id="helpSpec" class="form-text text-muted">Seleziona la Specializzazione</small>
                            @error('specialization')
                                <div id="specialization" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
 
                        <div class="form-group col-6">
                            <h5>Specializzazioni<span class="mb-2">*</span></h5>
                            <div class="form-check mr-3 d-flex flex-wrap">
                            @forelse ($specializations as $spec)
                                <div class="col-6">
                                    <input 
                                    name="specializations[]" 
                                    type="checkbox" 
                                    class="form-check-input" 
                                    id="specialty-{{ $spec->id }}" 
                                    value="{{ $spec->id }}"
                                    @if(old('specialization') == $spec->id) selected @endif
                                    >
                                    <label for="specializations-{{ $spec->name }}" class="form-check-label">{{ $spec->name }}</label>
                                </div>
                                @empty
                                    <p>-</p>
                                @endforelse
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">Indirizzo</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                value="{{ old('address') }}" name="address" aria-describedby="helpAddress"
                                placeholder="inserisci il tuo indirizzo">
                            <small id="helpAddress" class="form-text text-muted">Inserisci il tuo indirizzo.</small>
                            @error('address')
                                <div id="address" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-outline">
                            <label for="address">Numero di telefono</label>
                            <input type="tel" class="form-control @error('telephone') is-invalid @enderror" id="telephone"
                                value="{{ old('telephone') }}" name="telephone" aria-describedby="helpTelephone"
                                placeholder="inserisci il tuo numero">
                            <small id="helpTelephone" class="form-text text-muted">Inserisci il tuo umero di telefono.</small>
                            @error('telephone')
                                <div id="telephone" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                          </div>

                        <div class="form-group">
                            
                            <label for="services">Prestazioni che offo</label>
                            <textarea class="form-control" name="content" id="services"
                             placeholder="Contenuto dei servizi" rows="4">{{ old('services') }}</textarea>
                        </div>

                        
                        <div class="form-group">
                            <label for="cv">Inserisci il tuo CV</label>
    
                            <div class="custom-file ">
                                <input type="file" name="cv"
                                    class="custom-file-input @error('cv') is-invalid @endif" id="cv">
                              <label class="custom-file-label" for="cv">Scegli il tuo CV...</label>
                              @error('cv')
                                <div id="cv" class="invalid-feedback">
                                  {{ $message }}
                                </div>
                              @enderror
                            </div>
                        </div> 

                        <button type="submit" class="btn btn-primary">Submit</button> 
                </form>
            </div>
        </div>
    </div>
@endsection
