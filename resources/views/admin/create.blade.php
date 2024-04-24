@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    <h1>Crea un nuovo progetto</h1>

    <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="name" class="form-label">Nome progetto</label>
            <input type="text" class="form-control @error('name') is-invalid  @enderror" name="name" id="name" value="{{old('name')}}">
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione progetto</label>
            <textarea type="text" class="form-control @error('description') is-invalid  @enderror" name="description" id="description" >{{old('description')}}</textarea>
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail</label>
            <textarea type="text" class="form-control @error('thumbnail') is-invalid  @enderror" name="thumbnail" id="thumbnail" >{{old('thumbnail')}}</textarea>
            @error('thumbnail')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="technologies" class="form-label">Tecnologie usate</label>
            <input type="text" class="form-control @error('technologies') is-invalid  @enderror" name="technologies" id="technologies"  value="{{old('technologies')}}">
            @error('technologies')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link progetto</label>
            <input type="text" class="form-control @error('link') is-invalid  @enderror" name="link" id="link"  value="{{old('link')}}">
            @error('link')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Immagine progetto</label>
            <input type="file" class="form-control @error('cover_image') is-invalid  @enderror" name="cover_image" id="cover_image"  value="{{old('cover_image')}}">
            @error('cover_image')
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
                <option value="{{$type->id}}" {{ $type->id == old('type_id') ? 'selected' : '' }}>{{ $type->title }}</option>
                @endforeach

            </select>

        </div>

        <div class="mb-4">
            <label class="mb-2" for="">Tecnologie</label>
            <div class="d-flex gap-4">

                @foreach($technologies as $technology)
                <div class="form-check ">

                    <input 
                        type="checkbox" 
                        name="technologies[]"
                        value="{{$technology->id}}" 
                        class="form-check-input" 
                        id="tag-{{$technology->id}}"

                        {{ in_array($technology->id, old('technology', [])) ? 'checked' : '' }}
                    > 
                    
                    <label for="tag-{{$technology->id}}" class="form-check-label">{{$technology->title}}</label>
                </div>
                @endforeach

            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection