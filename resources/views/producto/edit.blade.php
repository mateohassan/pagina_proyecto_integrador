<head>
    <title>Editar productos</title>
</head>

@extends('layouts.app')
@section('content')
<div class="container">
    <h1>
        Edición de productos
    </h1>
    <form action="{{ url('/producto/' . $producto->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @include('producto.form', ['accion' => 'Editar'])
    </form>
</div>
@endsection