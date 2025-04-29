<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function portada()
    {
        return view('layout/portada');
    }
    public function index()
    {
        $jugadores = Jugador::paginate(20);
        return view('jugadores.index')->with('jugadores', $jugadores);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    
    {
        $equipos = Equipo::all();  // Obtener todos los equipos
        return view('jugadores.formulario')->with('equipos', $equipos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validar los datos recibidos
         $request->validate([
            'nombre' => 'required|string|max:255',
            'genero' => ['required', Rule::in(['masculino', 'femenino'])],
            'edad' => 'required|integer|min:19|max:40',
            'nacionalidad' => 'required|string|max:100',
            'equipo_id' => 'required|exists:equipos,id',
        ]);

        $nuevoJugador = new Jugador();
        $nuevoJugador->nombre = $request->input('nombre');
        $nuevoJugador->genero = $request->input('genero');
        $nuevoJugador->edad = $request->input('edad');
        $nuevoJugador->nacionalidad = $request->input('nacionalidad');
        $nuevoJugador->equipo_id = $request->input('equipo_id');

        $creado =  $nuevoJugador->save();
        
        if ($creado) {
            return redirect()->route('jugador.index')
                ->with('mensaje', 'El jugador ha sido creado exitosamente.');
        } else {
            return back()->with('error', 'Ocurrió un error al guardar el equipo.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jugador = Jugador::with(['equipo'])->findOrFail($id);
        return view('jugadores.show')->with('jugador',  $jugador);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    // Buscar el jugador por ID
    $jugador = Jugador::findOrFail($id);

    // Obtener todos los equipos para llenar el select
    $equipos = Equipo::all();

    // Pasar el equipo y los usuarios a la vista utilizando 'with'
    return view('jugadores.formulario')
        ->with('jugador', $jugador)
        ->with('equipos', $equipos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'genero' => ['required', Rule::in(['masculino', 'femenino'])],
            'edad' => 'required|integer|min:19|max:40',
            'nacionalidad' => 'required|string|max:100',
            'equipo_id' => 'required|exists:equipos,id',
        ]);

         // 🔥 AQUÍ: Buscar el jugador
    $jugador = Jugador::findOrFail($id);

    
        // Aquí SÍ actualizas el jugador recibido
        $jugador->nombre = $request->input('nombre');
        $jugador->genero = $request->input('genero');
        $jugador->edad = $request->input('edad');
        $jugador->nacionalidad = $request->input('nacionalidad');
        $jugador->equipo_id = $request->input('equipo_id');
    
        $jugador->save();
    
        return redirect()->route('jugador.index')->with('mensaje', 'El jugador ha sido modificado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         Jugador::destroy($id);

        //Redirigir

        return redirect('/jugadores')->with('mensaje', 'El equipo ha sido eliminado exitosamente.');
    }
}
