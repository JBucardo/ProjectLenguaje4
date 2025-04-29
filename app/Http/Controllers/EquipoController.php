<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function portada()
    {
        return view('layout/portada');
    }

    public function index()
    {
        $equipos = Equipo::paginate(20);
        return view('equipos.index')->with('equipos', $equipos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
         
    {
        $usuarios = User::all();  // Obtener todos los usuarios
        return view('Equipos.formulario')->with('usuarios', $usuarios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
         // VALIDAR
         $request->validate([
            'nombre'   => 'required|string|min:0|max:20',
            'disciplina' => ['required', Rule::in(['futbol', 'voleibol', 'baloncesto'])],
            'fecha_creacion' => 'required|date',
            'sede'   => 'required|string|min:0|max:30',
            'user_id' => 'required|exists:users,id',  // Validar que el user_id existe
            
        ]);
        $nuevoEquipo = new Equipo();
        // Formulario
        $nuevoEquipo->nombre = $request->input('nombre');
        $nuevoEquipo->disciplina = $request->input('disciplina');
        $nuevoEquipo->sede = $request->input('sede');
        $nuevoEquipo->fecha_creacion = $request->input('fecha_creacion');
        $nuevoEquipo->user_id = $request->input('user_id');  // Asignar el usuario seleccionado
        
        $creado = $nuevoEquipo->save();
        
        if ($creado) {
            return redirect()->route('equipo.index')
                ->with('mensaje', 'El equipo ha sido creado exitosamente.');
        } else {
            return back()->with('error', 'Ocurrió un error al guardar el equipo.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $equipo = Equipo::with(['jugadores', 'user'])->findOrFail($id);
        return view('equipos.show')->with('equipo', $equipo);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

         // Obtener el equipo por su ID
    $equipo = Equipo::findOrFail($id);

    // Obtener todos los usuarios para el select
    $usuarios = User::all();

    // Pasar el equipo y los usuarios a la vista utilizando 'with'
    return view('Equipos.formulario')
        ->with('equipo', $equipo)
        ->with('usuarios', $usuarios);
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
              // Validar los datos del formulario
       $request->validate([
        'nombre'     => 'required|string|min:0|max:20',
        'disciplina' => ['required', Rule::in(['futbol', 'voleibol', 'baloncesto'])],
        'fecha_creacion' => 'required|date',
        'sede'       => 'required|string|min:0|max:30',
        'user_id'    => 'required|exists:users,id',  // Validar que el user_id exista
         ]);

              // Buscar el equipo por su ID
            $equipo = Equipo::findOrFail($id);

          // Actualizar los datos del equipo con los nuevos valores del formulario
         $equipo->nombre = $request->input('nombre');
         $equipo->disciplina = $request->input('disciplina');
         $equipo->sede = $request->input('sede');
         $equipo->fecha_creacion = $request->input('fecha_creacion');
         $equipo->user_id = $request->input('user_id');  // Asignar el usuario seleccionado

         // Guardar los cambios en la base de datos
         $actualizado = $equipo->save();

         // Redirigir dependiendo del resultado de la actualización
         if ($actualizado) {
            return redirect()->route('equipo.index')
                ->with('mensaje', 'El equipo ha sido actualizado exitosamente.');
        } else {
            return back()->with('error', 'Ocurrió un error al actualizar el equipo.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Equipo::destroy($id);

        //Redirigir

        return redirect('/equipos')->with('mensaje', 'El equipo ha sido eliminado exitosamente.');
        
    }
}
