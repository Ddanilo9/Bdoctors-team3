@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>elenco di dottori:</h1>
            </div>
            <div class="col-4 text-left d-flex justify-content-end align-items-center">
                <a href="{{ route('admin.doctors.create') }}" type="button" class="btn btn-primary btn-sm">Nuovo dottore</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">surname</th>
                            <th scope="col">Spec</th>
                            <th scope="col">address</th>
                            {{-- <th scope="col">services</th> --}}
                            <th scope="col">photo</th>
                            <th scope="col">cv</th>
                            <th scope="col">telephone</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($doctors as $doctor)
                            <tr>
                                <th scope="row">{{ $doctor->id }}</th>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->surname }}</td>
                                <td>
                                  <ul>
                                    @foreach($doctor->specializations as $s)
                                      <li>{{ $s->name }}</li>
                                    @endforeach
                                  </ul>  
                                </td>
                                
                                <td>{{ $doctor->address }}</td>
                                {{-- <td>{{ $doctor->services }}</td> --}}
                                <td>{{ $doctor->photo }}</td>
                                <td>{{ $doctor->cv }}</td>
                                <td>{{ $doctor->telephone }}</td>
                                <td>
                                    <a href="{{ route('admin.doctors.show', $doctor) }}" type="button"
                                        class="btn btn-secondary btn-sm">vedi</a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <input type="submit" value="Elimina" class="btn btn-danger btn-sm">
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
