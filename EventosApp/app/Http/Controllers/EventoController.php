<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::orderBy('nombreEvento')->paginate(10);
        return view('eventos.eventos', ['lista_eventos' => $eventos]);
    }

    public function evento(Evento $evento)
    {
        return view('eventos.evento', ['evento' => $evento]);
    }

    public function crear()
    {
        $usuario = auth()->user();

        if ($usuario->remaining_events > 0) {
            return view('eventos.crear');
    
        }else{
            return view('eventos.crear')->with('error', 'Se han terminado el número máximo de creaciones por usuario, póngase en contacto con el administrador de la aplicación.');
        }
    }

    public function agregar(Request $datosRecibidos)
    {
   
        $usuario = auth()->user();

        if ($usuario->remaining_events > 0) {

            $evento = new Evento();
            $evento->nombreEvento = $datosRecibidos->nombreEvento;
            $evento->fechaInicio = Carbon::createFromFormat('Y-m-d', $datosRecibidos->fechaInicio)->format('Y-m-d');
            $evento->fechaFin = Carbon::createFromFormat('Y-m-d', $datosRecibidos->fechaFin)->format('Y-m-d');
            $evento->tipo = $datosRecibidos->tipo;
            $evento->participantes = $datosRecibidos->participantes;
            $evento->descripcion = $datosRecibidos->descripcion;

            $evento->save();
            $usuario->remaining_events -= 1;
            $usuario->save();
    
            return redirect()->route('evento', $evento);

        }else{
            return redirect()->route('crear')->with('error', 'Que ya has alcanzado el límite pesadillaa!!');
        }
    }

    public function editar(Evento $evento){
        return view('eventos.editar', ['evento' => $evento]);
    }

    public function actualizar(Evento $evento, Request $datosRecibidos)
    {
    
        $evento->nombreEvento = $datosRecibidos->nombreEvento;
        $evento->fechaInicio = Carbon::createFromFormat('Y-m-d', $datosRecibidos->fechaInicio)->format('Y-m-d');
        $evento->fechaFin = Carbon::createFromFormat('Y-m-d', $datosRecibidos->fechaFin)->format('Y-m-d');
        $evento->tipo = $datosRecibidos->tipo;
        $evento->participantes = $datosRecibidos->participantes;
        $evento->descripcion = $datosRecibidos->descripcion;

        $evento->save();

        return redirect()->route('evento', $evento);
    }

    public function delete(Evento $evento)
        {
            $evento->delete();
            return redirect()-> route('eventos');
        }
}
