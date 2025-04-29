@extends('layout.plantillaMadre')

@section('nombredepestana', 'Portada')

@section('cuerpodepagina')


    <h1 class="display-3">BIENVENIDO AL SISTEMA CLUB DEPORTIVO </h1>

    <div class="d-flex justify-content-between">
        <a href="{{ route('equipo.index') }}" class="card-link">
            <img src="{{ asset('Foto_de_Equipos.png') }}" alt="Ir al inicio" width="400">
        </a>

        <a href="{{ route('jugador.index') }}" class="card-link">
            <img src="{{ asset('Foto_de_Jugadores.png') }}" alt="Ir al inicio" width="400">
        </a>
    </div>



@endsection
