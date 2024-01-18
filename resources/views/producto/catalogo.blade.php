<head>
    <title>Catálogo de productos</title>
    <style>
        img {
        max-height:200px;
        max-width:200px;
        margin: auto;
        }
        .container img {
        margin: auto;
        display: block;
        }
        .row {
        display: flex;
        white-space: nowrap;
        justify-content: flex-start;
        }
    </style>
    
    <?php
    $listaTipos = array();
    foreach ($productos as $producto){
        $tipo = $producto['tipo'];
        $listaTipos[] = $tipo;
    }
    sort($listaTipos);
    $listaTipos = array_unique($listaTipos);
    ?>
</head>

@extends('layouts.app')
@section('content')
<div class="container">
    <h1 style="text-align: center"> 
        Catálogo de productos
    </h1>
    @foreach ($listaTipos as $tipo)
    <div class="row" style="white-space:nowrap">
        <h3 class="col-12">
            {{ $tipo }}
        </h3>
        <div style="width: 100%; overflow-x:auto;">
        @foreach ($productos as $producto)
            @if ($producto['tipo'] == $tipo)
                <div class="col-lg-3" style="border: 2px solid black; border-radius:10px; display:inline-block">
                    <div class="container">
                    <img src="{{ asset('storage') . '/' . $producto->foto }}" class="img-fluid">
                    </div>
                    <p style="font-size:125%; padding-left:10px"><strong>{{ $producto->modelo }}</strong></p>
                    <p style="font-size:150%; padding-left:10px"> ${{ $producto->precio }} </p>
                </div>
            @endif
        @endforeach
    </div>
    @endforeach
</div>
@endsection