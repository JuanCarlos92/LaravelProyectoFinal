<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Models\Evento;

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

    public function create()
    {
        // Verificar si el usuario puede crear más eventos
        if (Auth::user()->remaining_events <= 0) {
            return view('eventos.limit-reached');
        }
        return view('eventos.create');
    }

    public function store(StoreEventoRequest $request)
    {
        // Validar que el usuario tenga eventos disponibles
        if (Auth::user()->remaining_events <= 0) {
            return redirect()->route('eventos.create')
                ->with('error', 'Se han terminado el número máximo de creaciones por usuario, póngase en contacto con el administrador de la aplicación');
        }
        
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombreEvento' => 'required|max:255',
            'fechaInicio' => 'nullable|date',
            'fechaFin' => 'nullable|date|after_or_equal:fechaInicio',
            'tipo' => 'nullable|in:reunión,conferencia,taller,presentación,concierto',
            'participantes' => 'nullable|integer|min:1|max:15',
            'descripcion' => 'nullable',
        ]);

        // Crear el evento
        Event::create($validatedData);

        // Decrementar el contador de eventos disponibles
        $user = Auth::user();
        $user->remaining_events -= 1;
        $user->save();

        return redirect()->route('eventos.index')
            ->with('success', 'Evento creado exitosamente');
    }
    public function show(Evento $evento)
    {
        //
    }

    public function edit(Evento $evento)
    {
        //
    }

    public function update(UpdateEventoRequest $request, Evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        //
    }
}
