@extends('layouts.app')
@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
        I dati inseriti non sono validi:

        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif

<form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Nome Progetto</span>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$project->name}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descrizione progetto</label>
        <textarea class="form-control form-control @error('description') is-invalid @enderror" name="description" id="exampleFormControlTextarea1" rows="3">{{$project->description}}</textarea>
        @error('description')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Link Git</span>
        <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" value="{{$project->link}}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        @error('link')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
    <div class="input-group">
        <input   name="cover_img" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
        <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
      </div>
      @error('cover_img')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror

    <select class="form-select mt-3" aria-label="Default select example" name="type_id">
      <option selected>Seleziona la categoria</option>
      @foreach ($types as $type)
          <option value={{ $type->id }}>{{ $type->name }}</option>
      @endforeach
    </select>
<button type="submit" class="btn btn-primary">Salva</button>
    

</form>
@endsection