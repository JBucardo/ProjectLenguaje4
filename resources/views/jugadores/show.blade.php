@extends('layout.plantillaMadre')

@section('nombredepestana', 'Jugador')

@section('cuerpodepagina')

    <center>
        <h1 class="detallesEquipo">Detalles del Jugador  {{ $jugador->nombre }} del Equipo <strong>{{ $jugador->equipo->nombre}}</strong> <a class="btn btn-warning"
                href="{{ route('jugador.edit', ['id' => $jugador->id]) }}">Editar</a></h1>
        <div>
            <div>

                <table class="table table-bordered text-center">
                    <thead class="table-success text-uppercase">
                        <tr>
                            <th scope="col">Campos</th>
                            <th scope="col">Valores</th>
                        </tr>
                    </thead>
                    <tbody class="border border-primary"">
                        <tr>
                            <th scope="row">Nombre</th>
                            <td>{{ $jugador->nombre }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Genero</th>
                            <td>{{ $jugador->genero }}</td>
                        </tr <tr>
                        <th scope="row">Edad</th>
                        <td>{{ $jugador->edad }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nacionalidad</th>
                            <td>{{ $jugador->nacionalidad }}</td>
                        </tr>

                        <tr>
                            <th scope="row">Equipo</th>
                            <td>{{ $jugador->equipo->nombre}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
    
        
        <a class="btn btn-primary" href="{{ route('jugador.index') }}" class="card-link">Volver al inicio</a>
    </center>

@endsection
