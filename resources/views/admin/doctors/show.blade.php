{{-- Profilo privato del medico--}}

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <a class="d-flex align-items-center" href="{{ route('admin.home', $doctor) }}"> 
                <?xml version="1.0" encoding="utf-8"?> <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"> <svg width="26" height="26" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#6cb2eb"><g><path d="M 4,15.004C 4,15.132, 4.028,15.26, 4.078,15.382c 0.048,0.118, 0.12,0.224, 0.208,0.314 C 4.288,15.7, 4.29,15.704, 4.292,15.708l 6,6c 0.39,0.39, 1.024,0.39, 1.414,0c 0.39-0.39, 0.39-1.024,0-1.414L 7.414,16L 27,16 C 27.552,16, 28,15.552, 28,15C 28,14.448, 27.552,14, 27,14L 7.414,14 l 4.292-4.292c 0.39-0.39, 0.39-1.024,0-1.414 c-0.39-0.39-1.024-0.39-1.414,0l-6,6C 4.29,14.296, 4.288,14.302, 4.286,14.304C 4.198,14.394, 4.126,14.5, 4.078,14.618 C 4.026,14.74, 4,14.87, 4,15l0,0C 4,15.002, 4,15.002, 4,15.004z"></path></g></svg>
                <div class="text-info font-weight-bold pl-1 ">Torna indietro</div> 
            </a>
            <div class=" text-left d-flex justify-content-end align-items-center">
                <a href="{{ route('admin.doctors.edit', $doctor) }}" type="button" class="btn btn-info btn-sm text-white mr-2">Modifica</a>
                <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Elimina" class="btn btn-danger btn-sm">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <h2 class="display-3 py-3">{{ $doctor->name }} {{$doctor->surname}}</h2>
                
                <div class="info p-3 d-flex align-items-center">
                    <div class="photo">
  
                        @if(!empty($doctor->photo))
                            <img width="300" src="{{-- {{ asset('storage/' . $doctor->photo) }} --}}" alt="{{ $doctor->name }}">   
                        @else
                            <img width="250" src="{{ asset('img/no-image.png') }}" alt="{{ $doctor->name }}">
                        @endif
            
                    </div>
                    <section class="specs ml-4 mt-3">
                    <h2>Dott.{{ $doctor->name }} {{ $doctor->surname }}</h2>
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
                            <span class="font-weight-bold">Indirizzo: </span>{{ $doctor->address}}
                        </div>           
                        <div class="phone">
                            <span class="font-weight-bold">Telefono: </span>{{ $doctor->telephone }}
                        </div> 
                        <h3 class="font-weight-bold mt-4">Prestazioni offerte:</h3>
                        <div class="services my-2">
                            {{ $doctor->services }}
                        </div>
                    </div>
                    <div class="cv">
                        <a class="btn btn-outline-info" 
                        href="{{ asset('cv/' . $doctor->cv) }}" 
                        download="{{ $doctor->cv }}">
                        Download CV
                        </a>
                    </div>
                
            </div>
            
        </div>
    </div>


@endsection
