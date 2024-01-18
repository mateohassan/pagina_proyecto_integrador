<script>
    var loadFile = function(event) {
        var image = document.getElementById('fotoVista');
        fotoVista.style.display = "inline";
        image.src=URL.createObjectURL(event.target.files[0]);
    };
</script>

@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@csrf
<div class="row">
    <div class="col-lg-3">
<label for="tipo">Tipo: </label>
<input type="text" class="form-control" name="tipo" id="tipo" value="{{ isset($producto->tipo) ? $producto->tipo : old('tipo') }}" required>
    </div>
    <div class="col-lg-3">
<label for="modelo">Modelo: </label>
<input type="varchar" class="form-control" name="modelo" id="modelo" value="{{ isset($producto->modelo) ? $producto->modelo : old('modelo') }}" required>
    </div>
</div>
<br>

<div class="row">
    <div class="col-lg-3">
<label for="precio" >Precio: </label>
<input type="number" class="form-control" name="precio" id="precio" value="{{ isset($producto->precio) ? $producto->precio : old('precio') }}" required>
    </div>
    <div class="col-lg-3">
<label for="stock">Stock: </label>
<input type="number" class="form-control" name="stock" id="stock" value="{{ isset($producto->stock) ? $producto->stock : old('stock') }}" required>
    </div>
</div>
<br>

<label for="foto">Foto: </label>
@if (isset($producto->foto))
    <img id="fotoVista" alt="" class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $producto->foto }}" style="height:200px">
@else
    <img id="fotoVista" alt="" class="img-thumbnail img-fluid" style="height:200px; display:none">
@endif
<input type="file" multiple="false" name="foto" id="foto" onchange="loadFile(event)">
<br><br>

<input type="submit" class="btn btn-success" value="{{ $accion }} producto">
<a class="btn btn-primary" href="{{ url('/producto/') }}">Regresar</a>