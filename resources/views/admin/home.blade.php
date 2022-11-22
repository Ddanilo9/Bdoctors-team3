{{-- dashboard del medico --}}

@extends('layouts.app')

@section('content')
    <div class="dashboard__navbar">
        <a class="dashboard__link messages-link" href="">Messaggi</a>
        <a class="dashboard__link reviews-link" href="{{ route(' admin/reviews.index') }}">Recensioni</a>
        <a class="dashboard__link stats-link" href="">Statistiche</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>Tuo Profilo</h1>
            </div>
        <div class="col-4 text-left d-flex justify-content-end align-items-center">
    </div>
</div>

<h1>{{ $doctor->name }} {{$doctor->surname}}</h1>

{{-- <div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.doctors.update', $post) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" name="name" aria-describedby="helpname">
            <small id="helpname" class="form-text text-muted">Inserisci il nuovo titolo del post:</small>
            @error('name')
                <div id="name" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="surname">Cognome</label>
            <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" value="{{ old('surname') }}" name="surname" aria-describedby="helpname">
            <small id="helpname" class="form-text text-muted">Inserisci il nuovo titolo del post:</small>
            @error('surname')
                <div id="surname" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
          <label for="image">Immagine Copertina</label>
          <div class="custom-file">
            <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="validatedCustomFile" required>
            <label class="custom-file-label" for="image">Aggiungi un'immagine</label>

            @error('image')
            <div id="image" class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>

        <div class="form-group">
          <label for="category">Categoria</label>
          <select name="category_id" class="custom-select @error('category_id') is-invalid @enderror" >
            <option value="">-- nessuna --</option>
            @foreach($categories as $category)
              <option @if(old('category_id',$post->category_id) == $category->id) selected @endif
              value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
          <small id="helpCategory" class="form-text text-muted">Seleziona la categoria</small>
          @error('category_id')
            <div id="category" class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-group">
          <label class="d-block" for="category">Tag:</label>

          <div class="@error('tags') is-invalid  @enderror d-flex justify-content-between">
            @foreach($tags as $key => $tag)
              <div class="form-check form-check-inline flex-fill justify-content-center">
                <input  class="form-check-input" name="tags[]"
                @if( in_array($tag->id, old('tags', $post->tags->pluck('id')->all()) ) ) checked @endif
                type="checkbox" id="tag-{{$tag->id}}" value="{{ $tag->id }}">
                <label class="form-check-label" for="tag-{{$tag->id}}">{{ $tag->name }}</label>
              </div>
            @endforeach
          </div>

          @error('tags')
          <div id="category" class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="content">Contenuto</label>
          <textarea class="form-control" id="content" name="content" rows="20" placeholder="Contenuto del post">{{ old('content') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div> --}}

@endsection
