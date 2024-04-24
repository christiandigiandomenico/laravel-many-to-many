@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    <h1>Pagina di Link</h1>

    <a href="{{route('admin.projects.index')}}" class="btn btn-primary">Vai alla pagina di Amministrazione</a>

</div>
@endsection