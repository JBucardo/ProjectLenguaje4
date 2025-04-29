@extends('layout.plantillaMadre')

@section('nombredepestana','Lista de Equipos')

@section('cuerpodepagina')

{{-- para colocar el mensaje de notificacion que se ha creado exitosamente el estudiante explicar ahora --}}
@if (session('mensaje'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Felicidades</strong> {{ session('mensaje') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif


<h1 class="display-2" style="color: blue">Sistema Club Deportivo</h1>  

<br>
<h3>Tabla de equipos <a class="btn btn-primary" href="{{route('equipo.create')}}">Nuevo</a></h3>
<br>
<table class="table table-striped table-bordered text-center">
    <thead class="thead-light">
        <tr> 
             <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Disciplina</th>
          
            <th scope="col">Ver</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>


        </tr>
    </thead>
    <tbody>

        @forelse($equipos as $equipo)
        <tr>
            <th scope="row">{{ $equipo->id }}</th>
            <td>{{ $equipo->nombre }}</td>
            <td>{{$equipo->disciplina }}</td>
           
            <td><a class="btn btn-info" href="{{ route('equipo.show', ['id'=>$equipo->id])}}">Ver</a></td>
            <td><a class="btn btn-warning" href="{{ route('equipo.edit', ['id'=> $equipo->id])}}">Editar</a></td>
            <td>
             <!-- Modal -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalConfirmar{{$equipo->id}}">
                    Eliminar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="modalConfirmar{{$equipo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿estas seguro que quieres eliminar el equipo con nombre: {{ $equipo->nombre }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <form method="post" action="{{ route("equipo.destroy", ['id'=> $equipo->id]) }}">
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
            <td colspan="4">no se encuentran registros de ningun equipo en esta tabla</td>
        </tr>
        @endforelse

    </tbody>
</table>
<a class="btn btn-outline-success" href="{{ route('portada.index') }}" class="card-link">Volver a la Bienvenida</a>

{{ $equipos->links() }}
    
@endsection