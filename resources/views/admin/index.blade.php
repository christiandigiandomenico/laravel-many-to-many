@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    <h1>Amministrazione</h1>

    <a href="{{route('admin.projects.create')}}" class="btn btn-primary">Aggiungi un progetto</a>

    @foreach($projects as $project)
    <h4>{{$project->name}}</h4>
    <a href="{{route('admin.projects.show', $project->id)}}" class="btn btn-primary">Mostra progetto</a>
    @endforeach

</div>
@endsection