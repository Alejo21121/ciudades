<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/ciudades.css') }}">
    <title>Editar Ciudad</title>
</head>
<body>

<h2>Editar Ciudad</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('ciudades.update', $ciudad) }}" method="POST" class="form-verde">
    @csrf
    @method('PUT')

    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ old('nombre', $ciudad->nombre) }}" required>

    <label>Estado:</label>
    <select name="estado" required>
        <option value="">-- Seleccione estado --</option>
        <option value="Activo" {{ old('estado') == 'Activo' ? 'selected' : '' }}>Activo</option>
        <option value="Inactivo" {{ old('estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
    </select>

    <label>País:</label>
    <select name="id_pais" required>
        <option value="">-- Seleccione un país --</option>
        @foreach($paises as $pais)
            <option value="{{ $pais->id_pais }}" {{ old('id_pais', $ciudad->id_pais) == $pais->id_pais ? 'selected' : '' }}>
                {{ $pais->nombre }}
            </option>
        @endforeach
    </select>


    <button type="submit">Actualizar</button>
</form>
    
</body>
</html>

