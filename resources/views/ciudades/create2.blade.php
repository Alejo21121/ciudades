<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/ciudades.css') }}">
    <title>Crear Pais</title>
</head>
<body>
    
<h2>Crear Pais</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('ciudades.store2') }}" method="POST" class="form-verde">
     @csrf
    <label>Nombre del país:</label>
    <input type="text" name="nombre" required>
    <button type="submit">Guardar País</button>
</form>
    
</body>
</html>

