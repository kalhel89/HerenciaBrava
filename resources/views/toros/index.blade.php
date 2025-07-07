<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-white">Nuestros Toros</h2>
    </x-slot>

    {{-- contenedor con fondo de imagen + overlay --}}
    <div class="relative min-h-screen pt-24 px-6 space-y-12 overflow-hidden">

        {{-- fondo de imagen --}}
        <div class="absolute inset-0">
            <img 
                src="{{ asset('images/volcan.jpg') }}" {{-- <-- AQUÍ puedes cambiar el archivo --}}
                alt="Fondo Toros"
                class="w-full h-full object-cover opacity-40"
            />
            <div class="absolute inset-0 bg-background opacity-70"></div>
        </div>

        {{-- contenido --}}
        <div class="relative z-10 space-y-6">
            @auth
                @if (auth()->user()->rol === 'admin')
                    {{-- Botón para crear un nuevo toro --}}
                    <div class="flex justify-end mt-4">
                        <a href="{{ route('toros.create') }}"
                        class="bg-secondary text-dark px-6 py-3 rounded shadow hover:bg-yellow-500 transition">
                            + Nuevo Toro
                        </a>
                    </div>
                @endif
            @endauth

            {{-- Listado de toros --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($toros as $toro)
                    <div class="bg-white border border-gray-300 overflow-hidden hover:scale-105 transition-transform duration-300 rounded">

                        {{-- Imagen --}}
                        <img 
                            src="{{ asset('storage/fotos/' . $toro->foto) }}" alt="Foto de {{ $toro->nombre }}"
                            class="h-64 w-full object-cover"
                        />

                        {{-- Nombre --}}
                        <div class="bg-primary text-white text-center py-2 font-bold uppercase tracking-wider">
                            {{ $toro->nombre }}
                        </div>

                        {{-- Detalles --}}
                        <div class="p-4 bg-gray-800 text-white text-sm space-y-2">
                            <p>
                                <strong>Edad:</strong> {{ $toro->edad }} años <br>
                                <strong>Peso:</strong> {{ $toro->peso }} kg <br>
                                <strong>Categoría:</strong> {{ $toro->categoria }}
                            </p>
                            <p class="text-yellow-400 font-bold text-base">
                                Ranking: {{ $toro->victorias ?? 0 }} - {{ $toro->empates ?? 0 }} - {{ $toro->derrotas ?? 0 }}
                            </p>
                            @if (auth()->user()->rol === 'admin')
                                {{-- Botones --}}
                                <div class="flex justify-center gap-4 pt-2">
                                    <a href="{{ route('toros.edit', $toro) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-dark px-4 py-1 transition rounded-none">
                                        Editar
                                    </a>
                                <form action="{{ route('toros.destroy', $toro) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="bg-primary hover:bg-red-900 text-white px-4 py-1 transition rounded-none">
                                    Eliminar
                                </button>
                                </form>

                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-center text-white mt-10 col-span-full">
                        No hay registros de toros aún.
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
