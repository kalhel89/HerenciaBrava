<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-white">Eventos programados</h2>
    </x-slot>

    {{-- fondo de página con imagen + overlay rojo --}}
    <div class="relative min-h-screen pt-24 px-4 space-y-6 overflow-hidden">

        {{-- imagen de fondo --}}
        <div class="absolute inset-0">
            <img 
                src="{{ asset('images/estadio.jpg') }}" {{-- <--- AQUÍ cambias el nombre de la imagen --}}
                alt="Fondo eventos"
                class="w-full h-full object-cover opacity-40"
            >
            <div class="absolute inset-0 bg-primary opacity-80"></div>
        </div>

        {{-- contenido por encima --}}
        <div class="relative z-10 space-y-6">

            @auth
                @if (auth()->user()->rol === 'admin')
                    <div class="flex justify-end">
                        <a href="{{ route('eventos.create') }}"
                        class="bg-secondary text-dark px-6 py-3 rounded shadow hover:bg-yellow-500 transition">
                            + Nuevo evento
                        </a>
                    </div>
                @endif  
            @endauth

            {{-- Lista de eventos estilo WWE --}}
            <div class="space-y-4">
                @forelse ($eventos as $evento)
                    <div class="flex flex-col md:flex-row bg-dark bg-opacity-90 text-white rounded shadow overflow-hidden">
                        
                        {{-- Fecha en el costado --}}
                        <div class="bg-gray-900 flex flex-col items-center justify-center p-4 w-full md:w-40 text-center">
                            <span class="uppercase text-xs">
                                {{ \Carbon\Carbon::parse($evento->fecha)->format('l') }}
                            </span>
                            <span class="text-2xl font-bold">
                                {{ \Carbon\Carbon::parse($evento->fecha)->format('M d') }}
                            </span>
                            <span class="text-xs">
                                {{ \Carbon\Carbon::parse($evento->fecha)->format('H:i') }}
                            </span>
                        </div>

                        {{-- Datos del evento --}}
                        <div class="flex-1 p-4 space-y-1">
                            <h3 class="text-xl font-bold">{{ $evento->nombre }}</h3>
                            <p class="text-sm text-gray-300">
                                {{ $evento->lugar }}
                            </p>
                            <p class="text-sm text-gray-400">
                                {{ $evento->descripcion }}
                            </p>
                        </div>
                        @if (auth()->user()->rol === 'admin')
                            {{-- Acciones --}}
                            <div class="flex flex-row md:flex-col justify-center items-center gap-2 p-4 bg-gray-800">
                                <a href="{{ route('eventos.edit', $evento) }}"
                                class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1 rounded transition">
                                    Editar
                                </a>
                                <form action="{{ route('eventos.destroy', $evento) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="bg-secondary hover:bg-yellow-500 text-dark px-3 py-1 rounded transition">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="text-center text-gray-200 py-12">
                        No hay registros de eventos aún.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
