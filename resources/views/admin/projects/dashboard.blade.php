@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <br>
                    <h3 class="mt-5">Lista Progetti</h3>
                    <table class="table mb-5">
                        <thead>
                          <tr class="text-center">
                            <th scope="col">Immagine</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Link GitHub</th>
                            <th scope="col">Tipo di progetto</th>
                            <th scope="col">Manage</th>
                          </tr>
                        </thead>
                        @foreach ($projects as $project)
                        <tbody class="table-group-divider">
                            <tr>
                              <td><img src="{{ asset('storage/' . $project->cover_img) }}" alt=""></td>
                              <td>{{$project->name}}</td>
                              <td>{{Str::limit($project->description, 10)}}</td>
                              <td>{{Str::limit($project->link, 10)}}</td>
                              <td><div class="card-title">{{ $project->type ? $project->type->name : 'nessun tipo scelto' }}</div>
                              </td>
                              <td class="text-center"><a href={{route("admin.projects.edit", $project->id)}} class="btn btn-primary">E</a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="delete-form d-inline-block">
                                  @csrf()
                                  @method('delete')
                                  <button class="btn btn-danger">
                                    X
                                  </button>
                                </form>
                                <a href={{route("admin.projects.show", $project->id)}} class="btn btn-success">V</a>
                              </td> 
                    
                              
                            </tr>
                          </tbody>
                        @endforeach
                      </table>
                      <a href="{{ route('admin.projects.create')}}" class="btn btn-primary">+</a>
                        
                      <h3>Lista Utenti</h3>
                      <table class="table mb-4">
                        <thead>
                          <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Permitions</th>
                            <th scope="col">Manage</th>
                          </tr>
                        </thead>
                        @foreach ($users as $user)
                        <tbody class="table-group-divider">
                            <tr>
                              <th scope="row">{{$user->id}}</th>
                              <td>{{$user->name}}</td>
                              <td>{{Str::limit($user->email, 10)}}</td>
                              <td>{{$user->role}}</td>
                            </tr>
                          </tbody>
                        @endforeach
                      </table>
                        

                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
