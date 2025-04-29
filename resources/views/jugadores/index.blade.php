@extends('layout.plantillaMadre')

@section('nombredepestana','Lista de Jugadores')

@section('cuerpodepagina')

{{-- para colocar el mensaje de notificacion que se ha creado exitosamente el estudiante explicar ahora --}}
@if (session('mensaje'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Felicidades</strong> {{ session('mensaje') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif



<h1 class="display-2" style="color: green">Sistema Club Deportivo</h1>  
<br>
<h3>Tabla de Jugadores <a class="btn btn-primary" href="{{route('jugador.create')}}">Nuevo</a></h3>
<br>

<table class="table table-striped table-bordered text-center">
    <thead class="thead-light">
        <tr> 
             <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Genero</th>
          
            <th scope="col">Ver</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>


        </tr>
    </thead>
    <tbody>

        @forelse($jugadores as $jugador)
        <tr>
            <th scope="row">{{ $jugador->id }}</th>
            <td>{{ $jugador->nombre }}</td>
            <td>{{$jugador->genero }}</td>
           
            <td><a class="btn btn-info" href="{{ route('jugador.show', ['id'=>$jugador->id])}}">Ver</a></td>
            <td><a class="btn btn-warning" href="{{ route('jugador.edit', ['id'=> $jugador->id])}}">Editar</a></td>
            <td>
             <!-- Modal -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalConfirmar{{$jugador->id}}">
                    Eliminar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modalConfirmar{{$jugador->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿estas seguro que quieres eliminar al jugador : {{ $jugador->nombre }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <form method="post" action="{{ route("jugador.destroy", ['id'=> $jugador->id]) }}">
                                    @method("delete")
                                    @csrf
                                    <input type="submit" value="Eliminar" class="btn btn-danger">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">No se encuentran registros de ningun jugador en esta tabla</td>
        </tr>
        @endforelse

    </tbody>
</table>

<a class="btn btn-outline-success" href="{{ route('portada.index') }}" class="card-link">Volver a la Bienvenida</a>

{{ $jugadores->links() }}
    
@endsection