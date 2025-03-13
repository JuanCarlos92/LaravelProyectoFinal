@extends('templates.plantilla')

@section('titulo')
    EventosApp
@endsection

@section('contenido')
<div> 
    <h1 style="font-size: 48px; font-weight: bold; text-align: center; padding: 20px; border-radius: 10px;">
        Lista de Eventos
    </h1>
</div>
<div class=" flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
    <main class="flex max-w-[600px] w-full flex-col-reverse lg:max-w-5xl lg:flex-row">
        <div class=" text-[65px] font-bold leading-[70px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
            
            <div class="mb-6 w-full flex justify-center space-x-4">
                @auth
                <a href="{{ route('crear')}}" 
                   class="px-6 py-3 bg-blue-600 font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75 transition">
                    + Crear evento
                </a>
                @endauth
                
                <a href="{{ route('home') }}" 
                   class="px-6 py-3 bg-green-600 font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-75 transition">
                    Volver al Home
                </a>
            </div>

            <ul>
                @foreach($lista_eventos as $evento)
                <li class="flex justify-between items-center mb-4 p-4 bg-gray-100 rounded-lg shadow-lg">
                    <span>- <a href="{{ route('evento', $evento)}}">{{ $evento->nombreEvento }} | Fecha Inicio: {{ $evento->fechaInicio }} | Tipo: {{ $evento->tipo }} </a></span>

                    @auth
                    <div class="flex space-x-4">
                        <a href="{{ route('editar', $evento) }}" 
                           class="px-6 py-3 bg-blue-600 font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75 transition">
                            Editar
                        </a>

                        <form action="{{ route('delete', $evento) }}" method="POST" class="flex">
                            @method('delete')
                            @csrf
                            <button type="submit" class="px-6 py-3 bg-red-600 font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-75 transition">
                                Eliminar
                            </button>
                        </form>
                    </div>
                    @endauth
                </li>
                @endforeach
                {{$lista_eventos->links()}}
            </ul>
        </div>
    </main>
</div>
@endsection
