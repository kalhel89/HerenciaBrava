<x-app-layout>
    <x-slot name="header">Ranking de Toros</x-slot>

    {{-- 🔹 Fondo estilo “peleas”: foto + velo guinda --}}
    <div class="relative min-h-screen pt-24 px-4 overflow-hidden">

        {{-- imagen de fondo --}}
        <div class="absolute inset-0">
            <img src="{{ asset('images/toritosmecha.jpg') }}" alt="Fondo ranking"
                 class="w-full h-full object-cover opacity-40" />
            <div class="absolute inset-0 bg-primary opacity-80"></div>
        </div>

        {{-- Tabla mejorada --}}
        <div class="relative z-10 min-h-screen flex items-center justify-center pt-24 px-4">
            <div class="w-full max-w-6xl bg-[#F9F4EF]/90 backdrop-blur-md rounded-xl shadow-2xl overflow-hidden">
                <table class="w-full text-sm md:text-base divide-y divide-gray-300">
                    <thead class="bg-[#7B0522] text-yellow-50 sticky top-0">
                        <tr>
                            <th class="px-4 py-4 text-left font-bold uppercase tracking-wider w-16">#</th>
                            <th class="px-4 py-4 text-left font-bold uppercase tracking-wider">Toro</th>
                            <th class="px-4 py-4 text-center font-bold uppercase tracking-wider">Edad</th>
                            <th class="px-4 py-4 text-center font-bold uppercase tracking-wider">Peso</th>
                            <th class="px-4 py-4 text-center font-bold uppercase tracking-wider">Categoría</th>
                            <th class="px-4 py-4 text-center font-bold uppercase tracking-wider">Puntaje</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($toros as $index => $toro)
                            @php
                                $bgRow = match($index) {
                                    0 => 'bg-yellow-100',   // oro
                                    1 => 'bg-gray-200',     // plata
                                    2 => 'bg-orange-200',   // bronce
                                    default => 'hover:bg-gray-50'
                                };
                            @endphp
                            <tr class="{{ $bgRow }}">
                                <td class="px-4 py-3 font-semibold text-center">
                                    @switch($index)
                                        @case(0)
                                            🥇
                                            @break
                                        @case(1)
                                            🥈
                                            @break
                                        @case(2)
                                            🥉
                                            @break
                                        @default
                                            {{ $index + 1 }}
                                    @endswitch
                                </td>

                                {{-- Toro + avatar (placeholder) --}}
                                <td class="px-4 py-3 flex items-center gap-3">
                                    <img
    src="{{ $toro->foto ? asset('storage/fotos/' . $toro->foto) : asset('images/toro-placeholder.jpg') }}"
    alt="Foto de {{ $toro->nombre }}"
    class="h-10 w-10 rounded-full object-cover ring-2 ring-[#7B0522]"
>

                                    <span class="font-semibold text-[#1a1a1a]">{{ $toro->nombre }}</span>
                                </td>

                                <td class="px-4 py-3 text-center">{{ $toro->edad }}&nbsp;años</td>
                                <td class="px-4 py-3 text-center">{{ $toro->peso }}&nbsp;kg</td>

                                {{-- Badge categoría --}}
                                <td class="px-4 py-3 text-center">
                                    <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold
                                        {{ $toro->categoria === 'A' ? 'bg-green-200 text-green-800' : ($toro->categoria === 'B' ? 'bg-blue-200 text-blue-800' : 'bg-gray-200 text-gray-800') }}">
                                        {{ $toro->categoria }}
                                    </span>
                                </td>

                                <td class="px-4 py-3 text-center font-bold text-[#7B0522]">{{ $toro->ranking }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-500">No hay toros registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
