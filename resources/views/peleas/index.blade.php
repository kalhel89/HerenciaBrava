<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-white">Peleas programadas</h2>
    </x-slot>

    {{-- fondo rojo sangre + imagen opcional --}}
    <div class="relative min-h-screen pt-24 px-4 overflow-hidden">

        {{-- imagen de fondo --}}
        <div class="absolute inset-0">
            <img 
                src="{{ asset('images/toritosmecha.jpg') }}"  {{-- <--- cambia el nombre aquí si lo deseas --}}
                alt="Fondo peleas"
                class="w-full h-full object-cover opacity-40"
            >
            <div class="absolute inset-0 bg-primary opacity-80"></div>
        </div>

        {{-- contenido por encima --}}
        <div class="relative z-10 space-y-6">
            @auth
                @if (auth()->user()->rol === 'admin')
                    {{-- Botón para crear --}}
                    <div class="flex justify-end">
                        <a href="{{ route('peleas.create') }}"
                        class="bg-secondary text-dark px-6 py-3 rounded shadow hover:bg-yellow-500 transition">
                            + Nueva pelea
                        </a>
                    </div>
                @endif
            @endauth
            {{-- tabla de peleas en modo cards estilo WWE --}}
            <div class="space-y-4">
                @forelse ($peleas as $pelea)
                    <div class="flex flex-col md:flex-row bg-dark bg-opacity-90 text-white rounded shadow overflow-hidden">
                        
                        {{-- Información de pelea --}}
                        <div class="flex-1 p-4 space-y-1">
                            <h3 class="text-xl font-bold">{{ $pelea->evento->nombre }}</h3>
                            <p class="text-sm text-gray-300">
                                <strong>Toro 1:</strong> {{ $pelea->toro1->nombre }}
                            </p>
                            <p class="text-sm text-gray-300">
                                <strong>Toro 2:</strong> {{ $pelea->toro2->nombre }}
                            </p>
                            <p class="text-sm text-secondary font-semibold">
                                Ganador: {{ optional($pelea->ganador)->nombre ?? 'Sin definir' }}
                            </p>
                        </div>
                        @if (auth()->user()->rol === 'admin')
                            {{-- Acciones --}}
                            <div class="flex flex-row md:flex-col justify-center items-center gap-2 p-4 bg-gray-800">
                                <a href="{{ route('peleas.edit', $pelea) }}"
                                class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1 rounded transition">
                                    Editar
                                </a>
                                <form action="{{ route('peleas.destroy', $pelea) }}" method="POST">
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
                        No hay registros de peleas aún.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
