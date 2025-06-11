<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="{{ asset('css/img.css') }}">
    <title>Agregar Imagen a Ciudad</title>
</head>
<body>

    <div class="container-img">
        <h1>Agregar Imagen a <span>{{ $ciudad->nombre }}</span></h1>

        <form action="{{ route('ciudades.imagen.guardar', $ciudad->id) }}" method="POST" enctype="multipart/form-data" class="form-img">
            @csrf
            <label for="imagen">Seleccionar imagen:</label>
            <input type="file" name="imagen" required>
            @if ($errors->has('imagen'))
                <div class="error">{{ $errors->first('imagen') }}</div>
            @endif

            <button type="submit">Guardar Imagen</button>
        </form>

        <a href="{{ route('ciudades.index') }}" class="btn-volver">← Volver a la lista de ciudades</a>
    </div>

</body>
</html>
