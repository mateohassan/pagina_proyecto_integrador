@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenido a SportCat</h1>
    <br>
    <a class="btn btn-primary" href="{{ url('/producto/') }}">Acceder a la <br \> base de datos</a>
    <span>&nbsp;&nbsp;&nbsp;</span>
    <a class="btn btn-primary" href="{{ url('/producto/catalogo/') }}">Ver catálogo</a>
</div>
@endsection
