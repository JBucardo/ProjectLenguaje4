@extends('layout.plantillaMadre')

@section('nombredepestana','Formulario')

@section('cuerpodepagina')

@if(isset($equipo))
    <h1 class="tituloM">Modificar Equipo</h1>
@else
    <h1 class="tituloC">Crear un nuevo Equipo</h1>
@endif

{{-- Muestra la lista de errores de validación del formulario --}}
@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="post" action="{{ isset($equipo) ? route('equipo.update', ['id'=> $equipo->id]) : route('equipo.store') }}">
    @csrf
    @if(isset($equipo))
        @method('put')
    @endif
    <br>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre del equipo" name="nombre" value="{{ isset($equipo) ? $equipo->nombre : old('nombre') }}" required>
        <label for="nombre">Nombre de equipo</label>
    </div>

    <label for="disciplina_select">Disciplina</label>
    <select id="disciplina_select" class="form-select form-select-sm" name="disciplina" required>
        <option value="futbol" {{ old('disciplina', $equipo->disciplina ?? '') == 'futbol' ? 'selected' : '' }}>Futbol</option>
        <option value="voleibol" {{ old('disciplina', $equipo->disciplina ?? '') == 'voleibol' ? 'selected' : '' }}>Voleibol</option>
        <option value="baloncesto" {{ old('disciplina', $equipo->disciplina ?? '') == 'baloncesto' ? 'selected' : '' }}>Baloncesto</option>
    </select>

    <div class="form-floating mt-3">
        <input type="date" class="form-control" id="fecha_creacion" placeholder="Ingrese la fecha de creación del equipo" name="fecha_creacion" value="{{ isset($equipo) ? $equipo->fecha_creacion : old('fecha_creacion') }}" required>
        <label for="fecha_creacion">Fecha de creación</label>
    </div>

    <div class="form-floating mt-3">
        <input type="text" class="form-control" id="sede" placeholder="Ingrese la sede del equipo" name="sede" value="{{ isset($equipo) ? $equipo->sede : old('sede') }}" required>
        <label for="sede">Sede</label>
    </div>
    <br>
    <div class="form-floating mt-3">
        <select id="user_id" class="form-select" name="user_id" required>
          
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}" 
                    {{ old('user_id', $equipo->user_id ?? '') == $usuario->id ? 'selected' : '' }}>
                    {{ $usuario->name }} <!-- Mostrar el nombre del usuario -->
                </option>
            @endforeach
        </select>
        <label for="user_id">Seleccionar Usuario</label>
    <br>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('equipo.index') }}" class="btn btn-warning">Atrás</a>
    </div>
    
</form>
<br>
<a href="{{ route('equipo.index') }}" class="btn btn-success card-link">Volver al inicio</a>

@endsection
