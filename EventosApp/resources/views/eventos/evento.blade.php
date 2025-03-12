@extends('templates.plantilla')

@section('titulo')
    EventosApp
@endsection

@section('contenido')
    <div class="max-w-4xl mx-auto mt-6">
        <h1 style="font-size: 48px; font-weight: bold; text-align: center; padding: 20px; border-radius: 10px;">{{$evento->nombreEvento}}</h1>
    </div>
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
                <table class="w-full border border-gray-300 rounded-lg shadow-lg">
                    <tbody>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2 text-left">Fecha de Inicio</th>
                            <td class="border px-4 py-2">{{$evento->fechaInicio}}</td>
                        </tr>
                        <tr>
                            <th class="border px-4 py-2 text-left">Fecha Fin</th>
                            <td class="border px-4 py-2">{{$evento->fechaFin}}</td>
                        </tr>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2 text-left">Tipo</th>
                            <td class="border px-4 py-2">{{$evento->tipo}}</td>
                        </tr>
                        <tr>
                            <th class="border px-4 py-2 text-left">Participantes</th>
                            <td class="border px-4 py-2">{{$evento->participantes}}</td>
                        </tr>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2 text-left">Descripción</th>
                            <td class="border px-4 py-2">{{$evento->descripcion}}</td>
                        </tr>
                    </tbody>
                </table>
            </main>
        </div>
    </div>
@endsection


