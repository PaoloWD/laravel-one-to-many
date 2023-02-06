@extends('layouts.app')

@section('content')
<h1 class="text-center mb-5">{{ $project->name }}</h1>
<div class="d-flex justify-content-center">
    
  <div class="card text-center" style="width: 18rem;">
    <div class="card-body">
    <img src="{{ asset('storage/' . $project->cover_img) }}" alt="">
    <h5 class="card-title">Nome repo: {{$project->name}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">Descrizione repo: {{$project->description}}</h6>
    <p class="card-text">Link GitHub: {{$project->link}}</p>
    <div class="card-title">Tipo di progetto: {{ $project->type ? $project->type->name : 'nessun tipo scelto' }}</div>
    <a href="{{ route('admin.dashboard')}}" class="btn btn-primary">Torna indietro</a>
    
    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary">
        Modifica
      </a> 
      <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="delete-form d-inline-block">
        @csrf()
        @method('delete')

        <button class="btn btn-danger">
          X
        </button>
      </form> 
    </div>
</div>
</div>
<div class="d-flex justify-content-center">
    {{-- <a href="{{ route('projects.index')}}" class="btn btn-primary mt-5">Torna indietro</a> --}}
</div>
@endsection