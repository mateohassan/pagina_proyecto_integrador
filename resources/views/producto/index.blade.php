<head>
    <title>Tabla de productos</title>
    <style>
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-
        }
        th {
            background-color: rgb(230, 230, 230)
        }
    </style>
</head>

    @extends('layouts.app')
    @section('content')
    <div class="container">
        <h1 style="text-align: center"> 
            Tabla de productos
        </h1>

        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p style="display: inline">{{ Session::get('mensaje') }}</p>
                <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table cellspacing="0" width=100%>
            <thead>
                <tr style="text-align: center; border: 1px solid black">
                    <th width=5%>#</th>
                    <th width=15%>tipo</th>
                    <th width=15%>modelo</th>
                    <th width=15%>precio</th>
                    <th width=15%>stock</th>
                    <th width=15%>foto</th>
                    <th width=5% style="text-align: right; padding-right:14px; border-left:1px solid black">acciones</th>
                </tr>
            </thead>
            <tbody style="text-align: center">
                @foreach ($productos as $producto)
                    <tr style="border: 1px solid black">
                        <td>{{ $producto->id  }}</td>
                        <td>{{ $producto->tipo }}</td>
                        <td>{{ $producto->modelo }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>
                            <img src="{{ asset('storage') . '/' . $producto->foto }}" alt='' height="100px">
                        </td>
                        <td style="text-align: right; padding-right:14px; padding-bottom:0px; padding-top:13px; border-left:1px solid black">
                            <form action="{{ url('/producto/' . $producto->id . '/edit') }}">
                                <input type="submit" class="btn btn-primary" value="Editar">
                            </form>
                            <form action="{{ url('/producto/' . $producto->id) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger" value="Borrar" onclick="return confirm('Se eliminará el producto.')">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <a class="btn btn-success" href="{{ url('/producto/create') }}">Crear producto</a>
        {!! $productos->links() !!}
    </div>
    @endsection
