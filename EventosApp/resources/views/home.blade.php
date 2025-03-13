@extends('templates.plantilla')

@section('titulo')
    EventosApp
@endsection

@section('contenido')
    <div> 
        <h1 style="font-size: 48px; font-weight: bold; text-align: center; padding: 20px; border-radius: 10px;">
            Página principal de eventos
        </h1>
    </div>
    <nav>
        <ul>
            <li class="mb-6 w-full flex justify-center">
                <a href="{{ route('eventos') }}" 
                   class="px-6 py-3 bg-blue-600 font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75 transition">
                    Mostrar Lista de Eventos
                </a>
            </li>
        </ul>
    </nav>
    <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
            <div class="text-[65px] font-bold leading-[70px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
                <h1>¡Bienvenido a nuestra plataforma de eventos! Descubre y participa en una amplia gama de actividades interesantes. 
                    <br><br>
                    Desde conferencias educativas hasta encuentros sociales, encuentra los eventos que te apasionan y mantente al día 
                    con lo último en tu comunidad. Explora, inscríbete y disfruta de experiencias inolvidables con nosotros.
                </h1>
            </div>
        </main>
    </div>
@endsection
