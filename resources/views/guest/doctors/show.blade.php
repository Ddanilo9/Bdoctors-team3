{{-- Pagina show del dottore per l'utente --}}
@extends('layouts.app')
@section('content')
  <div class="container">
    <h1>Informazioni Medico</h1>
      <div class="row">
          @foreach ($doctors as $doctor)
            @if ($doctor->photo)
        <div class="col-12">
          <img src="{{asset('images/'.$doctor->photo)}}" width="400" alt="">
        </div>
    @endif
    @if ($doctor->photo)
      <div class="col-12">
        <img src="{{ $doctor->cover_path }}" width="400" alt="">
      </div>
    @endif
            <div class="col-8">
            <h2>{{ $doctor->name }} {{$doctor->surname}}</h2>
            <ul>
                @foreach ($doctor->specializations as $s)
                <li>{{ $s->spec_name }}</li>
                @endforeach
            </ul>
            <h5>{{ $doctor->address }}</h5>
            {{-- <h5>{{ $doctor->email }}</h5> --}}
            <h5>{{ $doctor->telephone }}</h5>
             {{-- inserire cv --}}
             <div>
                <p>{{ $doctor->services }}</p>
             </div>
            </div>
          @endforeach
      </div>
  </div>
@endsection