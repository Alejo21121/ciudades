<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/ciudades.css') }}">
    <title>Ciudades</title>
</head>
<body>
    
@php
    $sort = request('sort');
    $direction = request('direction') === 'asc' ? 'desc' : 'asc';

    function arrow($col) {
        return request('sort') === $col
            ? (request('direction') === 'asc' ? '↑' : '↓')
            : '';
    }
@endphp

<h1>Ciudades</h1>

<form method="GET" action="{{ route('ciudades.index') }}" class="search-form">
    <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="Buscar ciudad..." />
    <button type="submit">Buscar</button>
</form>

<a href="{{ route('ciudades.create') }}" class="btn-crear">Crear Ciudad</a>
<a href="{{ route('ciudades.create2') }}" class="btn-crear">Crear Pais</a>

<table border="1">
    <thead>
        <tr>
            <th>
                <a href="{{ route('ciudades.index', ['sort' => 'id', 'direction' => $direction]) }}">
                    ↑↓ ID {{ arrow('id') }}
                </a>
            </th>
            <th>
                <a href="{{ route('ciudades.index', ['sort' => 'nombre', 'direction' => $direction]) }}">
                    ↑↓ Nombre {{ arrow('nombre') }}
                </a>
            </th>
            <th>
                <a href="{{ route('ciudades.index', ['sort' => 'estado', 'direction' => $direction]) }}">
                    ↑↓ Estado {{ arrow('estado') }}
                </a>
            </th>
            <th>
                <a href="{{ route('ciudades.index', ['sort' => 'pais', 'direction' => $direction]) }}">
                    ↑↓ País {{ arrow('pais') }}
                </a>
            </th>
            <th>
                <a href="{{ route('ciudades.index', ['sort' => 'created_at', 'direction' => $direction]) }}">
                    ↑↓ Fecha Creación {{ arrow('created_at') }}
                </a>
            </th>
            <th>Imagen</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ciudades as $ciudad)
            <tr>
                <td>{{ $ciudad->id }}</td>
                <td>{{ $ciudad->nombre }}</td>
                <td class="estado-{{ strtolower($ciudad->estado) }}">{{ $ciudad->estado }}</td>
                <td>{{ $ciudad->pais->nombre ?? 'Sin país' }}</td>
                <td>{{ $ciudad->created_at }}</td>
                <td >
                    @if($ciudad->imagen)
                        <a href="{{ asset('imagenes_ciudades/'.$ciudad->imagen) }}" target="_blank">
                            <img src="{{ asset('imagenes_ciudades/'.$ciudad->imagen) }}" alt="Imagen Ciudad" style="width: 180px; height: auto; border-radius: 6px;">
                        </a>
                    @else
                        <a href="{{ route('ciudades.imagen.form', $ciudad->id) }}" class="btn-agregar-imagen">Agregar Imagen</a>
                    @endif
                </td>
                <td>
                    <a href="{{ route('ciudades.edit', $ciudad) }}" class="btn-editar">Editar</a>

                    <form action="{{ route('ciudades.destroy', $ciudad) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-eliminar" onclick="return confirm('¿Eliminar esta ciudad?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    
</body>
</html>


