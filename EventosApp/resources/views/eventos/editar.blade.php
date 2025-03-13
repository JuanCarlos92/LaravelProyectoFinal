@extends('templates.plantilla')

@section('titulo')
    EventosApp
@endsection

@section('contenido')
<div> 
    <h1 style="font-size: 48px; font-weight: bold; text-align: center; padding: 20px; border-radius: 10px;">
        Editar el evento
    </h1>
</div>
<div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
    <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
        <form action="{{ route('actualizar', $evento) }}" method="POST">
            @csrf
            @method('PUT')
            
            <label>Nombre del Evento</label><br>
            <input type="text" name="nombreEvento" value="{{$evento->nombreEvento}}"><br>
            <label>Fecha Inicio</label><br>
            <input type="text" name="fechaInicio" placeholder="dd-mm-yyyy" value="{{$evento->fechaInicio}}"> <br>
            <label>Fecha Fin</label><br>
            <input type="text" name="fechaFin" placeholder="dd-mm-yyyy" value="{{$evento->fechaFin}}"><br>
            <label>Tipo</label><br>
            <select name="tipo" style="width: 100%;" value="{{$evento->tipo}}">
                <option value="conferencia">Conferencia</option>
                <option value="taller">Taller</option>
                <option value="presentación">presentación</option>
            </select>
            <br>
            <label>Participantes (números)</label><br>
            <input type="number" name="participantes" min="1" max="15" placeholder="Máx 15" style="width: 100%;" value="{{$evento->participantes}}"><br>
            <label>Descripción</label><br>
            <input type="text" name="descripcion" placeholder="Un evento sobre..." value="{{$evento->descripcion}}"> <br>
            <br><br>
            <button type="submit" class="px-6 py-3 bg-blue-600 font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75 transition w-full">
            Actualizar el evento
            </button>
        </form>
    </main>
</div>
@endsection
