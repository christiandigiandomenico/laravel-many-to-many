@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    <div class="container py-5">
        <h1 class="mb-5">{{$project->name}}</h1>
        <small>{{$project->type?->title}}</small>
    
        {{-- @dump($comic) --}}

                <p>{{$project->description}}</p>

                <img src="{{asset('storage/' . $project->cover_image)}}" alt="Immagine Progetto">

                <p>{{$project->technologies}}</p>

                <a href="">{{$project->link}}</a>
    
                <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-secondary"><i class="fa-solid fa-pencil"></i> Modifica Progetto</a>
    
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    <i class="fa-solid fa-trash"></i> Elimina
                </button>
                
                
            </div>
        </div>

    
    <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Elimina progetto</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Vuoi eliminare il fumetto {{$project->name}}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"> Elimina</button>
                </form>
            </div>
          </div>
        </div>

</div>
@endsection