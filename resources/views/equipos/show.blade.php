@extends('layout.plantillaMadre')

@section('nombredepestana', 'Equipo')

@section('cuerpodepagina')

    <center>
        <h1 class="detallesEquipo">Detalles del equipo  {{ $equipo->nombre }} creado por el usuario  <strong>{{ $equipo->user->name }}</strong> <a class="btn btn-warning"
                href="{{ route('equipo.edit', ['id' => $equipo->id]) }}">Editar</a></h1>
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
                            <th scope="row">Nombre del Equipo</th>
                            <td>{{ $equipo->nombre }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Disciplina</th>
                            <td>{{ $equipo->disciplina }}</td>
                        </tr <tr>
                        <th scope="row">Fecha de creacion</th>
                        <td>{{ $equipo->fecha_creacion }}</td>
                        </tr>
                        <tr>
                            <th scope="row">sede</th>
                            <td>{{ $equipo->sede }}</td>
                        </tr>

                      
                    </tbody>
                </table>
            </div>
        </div>
        <br>
    
        <h2>Jugadores del Equipo</h2>

        @if ($equipo->jugadores->isEmpty())
            <div class="alert alert-warning">
                Este equipo no tiene jugadores registrados.
            </div>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del Jugador</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipo->jugadores as $jugador)
                        <tr>
                            <td>{{ $jugador->id }}</td>
                            <td>{{ $jugador->nombre }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        
        <a class="btn btn-primary" href="{{ route('equipo.index') }}" class="card-link">Volver al inicio</a>
    </center>

@endsection
