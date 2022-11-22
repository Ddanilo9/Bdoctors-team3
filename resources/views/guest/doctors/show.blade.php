{{-- Pagina show del dottore per l'utente --}}

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @if ($doctor->cover)
        <div class="col-12">
          <img src="{{asset('images/'.$doctor->cover)}}" width="400" alt="">
        </div>
    @endif
    @if ($user->cover)
      <div class="col-12">
        <img src="{{ $doctor->cover_path }}" width="400" alt="">
      </div>
    @endif 
            <div class="col-8">
            <h2>{{ $doctor->name }} {{$doctor->surname}}</h2>
            <ul>
                @foreach ($doctor->specializations as $s)
                <li>{{ $s->name }}</li>
                @endforeach
            </ul>
            <h5>{{ $doctor->address }}</h5>
            <h5>{{ $doctor->telephone }}</h5>
             {{-- inserire cv --}}


            </div>
             
        </div>
    </div>


@endsection
