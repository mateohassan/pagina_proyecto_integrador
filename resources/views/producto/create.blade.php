<head>
    <title>Crear productos</title>
</head>

@extends('layouts.app')
@section('content')
<div class="container">
    <h1>
        Creación de productos
    </h1>
    <form action="{{ url('/producto') }}" method="POST" enctype="multipart/form-data">
        @include('producto.form', ['accion' => 'Crear'])
    </form>
</div>
@endsection