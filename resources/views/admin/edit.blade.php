@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    <h1>Modifica progetto</h1>

    <form action="{{route('admin.projects.update', $project->id)}}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Nome progetto</label>
            <input type="text" class="form-control @error('name') is-invalid  @enderror" name="name" id="name" value="{{old('name') ?? $project->name}}">
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione progetto</label>
            <textarea type="text" class="form-control @error('description') is-invalid  @enderror" name="description" id="description" >{{old('description') ?? $project->description}}</textarea>
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Immagine progetto</label>
            <input type="text" class="form-control @error('thumbnail') is-invalid  @enderror" name="thumbnail" id="thumbnail"  value="{{old('thumbnail') ?? $project->thumbnail}}">
            @error('thumbnail')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technologies" class="form-label">Tecnologie usate</label>
            <input type="text" class="form-control @error('technologies') is-invalid  @enderror" name="technologies" id="technologies"  value="{{old('technologies' ?? $project->technologies)}}">
            @error('technologies')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link progetto</label>
            <input type="text" class="form-control @error('link') is-invalid  @enderror" name="link" id="link"  value="{{old('link') ?? $project->link}}">
            @error('link')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-4">

            <label for="type_id">Categoria</label>
            
            <select class="form-select" name="type_id" id="type_id">

                <option value=""></option>
                
                @foreach ($types as $type)
                <option value="{{$type->id}}" {{ $type->id == old('type_id', $project->category ? $project->category->id : '') ? 'selected' : '' }}>
                    {{ $type->title }}
                </option>
                @endforeach

            </select>

        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

</div>
@endsection