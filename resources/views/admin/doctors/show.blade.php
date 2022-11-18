@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            {{-- @if ($post->cover)
        <div class="col-12">
          <img src="{{asset('images/'.$post->cover)}}" width="400" alt="">
        </div>
    @endif
    @if ($post->cover)
      <div class="col-12">
        <img src="{{ $post->cover_path }}" width="400" alt="">
      </div>
    @endif --}}
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
            <div class="col-4 text-left d-flex justify-content-end align-items-center">
                <a href="{{ route('admin.doctors.edit', $doctor) }}" type="button" class="btn btn-primary btn-sm">Modifica</a>
                <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <input type="submit" value="Elimina" class="btn btn-danger btn-sm">
                </form>
            </div>
        </div>
    </div>


@endsection
