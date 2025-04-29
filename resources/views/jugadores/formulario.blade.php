@extends('layout.plantillaMadre')

@section('nombredepestana', 'Formulario')

@section('cuerpodepagina')

    @if (isset($jugador))
        <h1 class="tituloM">Modificar Jugador</h1>
    @else
        <h1 class="tituloC">Crear un nuevo Jugador</h1>
    @endif

    {{-- Muestra errores --}}
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="post"
        action="{{ isset($jugador) ? route('jugador.update', ['id' => $jugador->id]) : route('jugador.store') }}">
        @csrf
        @if (isset($jugador))
            @method('put')
        @endif

        {{-- Nombre --}}
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombre" name="nombre"
                value="{{ old('nombre', $jugador->nombre ?? '') }}" required>
            <label for="nombre">Nombre</label>
        </div>

        {{-- Género --}}
        <label for="genero_select">Género</label>
        <select id="genero_select" class="form-select form-select-sm" name="genero" required>
            <option value="masculino" {{ old('genero', $jugador->genero ?? '') == 'masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="femenino" {{ old('genero', $jugador->genero ?? '') == 'femenino' ? 'selected' : '' }}>Femenino</option>
        </select>

        {{-- Edad --}}
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="edad" name="edad" min="19" max="40"
                value="{{ old('edad', $jugador->edad ?? '') }}" required>
            <label for="edad">Edad del Jugador</label>
        </div>

        {{-- Nacionalidad --}}
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nacionalidad" name="nacionalidad"
                value="{{ old('nacionalidad', $jugador->nacionalidad ?? '') }}" required>
            <label for="nacionalidad">Nacionalidad</label>
        </div>

        {{-- Equipo --}}
        <div class="form-floating mt-3">
            <select id="equipo_id" class="form-select" name="equipo_id" required>
                <option value="">Seleccione un equipo</option>
                @foreach ($equipos as $equipo)
                    <option value="{{ $equipo->id }}"
                        {{ (int) old('equipo_id', $jugador->equipo_id ?? 0) === $equipo->id ? 'selected' : '' }}>
                        {{ $equipo->nombre }}
                    </option>
                @endforeach
            </select>
            <label for="equipo_id">Seleccionar un equipo</label>
        </div>

        <br>

        {{-- Botones --}}
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('jugador.index') }}" class="btn btn-warning">Atrás</a>
        </div>

    </form>

    <br>

    <a href="{{ route('jugador.index') }}" class="btn btn-success card-link">Volver al inicio</a>

@endsection
