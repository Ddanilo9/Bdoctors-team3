@extends('layouts.app')

@section('content')
    <section class="container-fluid mt-5 pb-3 border-0">
        <div class="title text-center">
            <h2 class="text-dark font-weight-bold text-pop-up-top">BDoctors</h2>
        </div>
        <div class="row justify-content-between">
            @foreach ($doctors as $doctor)
                <div class="col-12 col-md-6 col-lg-3 text-center">
                    <a href="{{ route('guest.doctors.show', ['slug' => $doctor->slug]) }}">
                        <h2 class="font-weight-bold pb-3">{{ $doctor->name }} {{ $doctor->surname }}</h2>
                        <p class="text-secondary">{{ $doctor->address }}</p>
                    </a>
                </div>
            @endforeach
        </div>
        </div>
    </section>
@endsection
