<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-white">Editar pelea</h2>
    </x-slot>

    {{-- fondo con imagen + overlay rojo --}}
    <div class="relative min-h-screen pt-24 px-4 flex justify-center items-center overflow-hidden">
        
        {{-- imagen de fondo --}}
        <div class="absolute inset-0">
            <img 
                src="{{ asset('images/fondoX.jpg') }}" {{-- <-- aquí cambia el nombre si gustas --}}
                alt="Fondo pelea"
                class="w-full h-full object-cover opacity-30"
            />
            <div class="absolute inset-0 bg-primary opacity-80"></div>
        </div>

        {{-- contenido --}}
        <div class="relative z-10 w-full max-w-md">
            <form
                action="{{ route('peleas.update', $pelea) }}"
                method="POST"
                class="bg-dark text-white p-6 rounded shadow space-y-4"
            >
                @csrf
                @method('PUT')

                <div>
                    <label class="block mb-1 font-semibold">Evento</label>
                    <select
                        name="evento_id"
                        class="w-full p-2 rounded bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-secondary"
                        required
                    >
                        @foreach ($eventos as $ev)
                            <option
                                value="{{ $ev->id }}"
                                @selected($pelea->evento_id == $ev->id)
                            >
                                {{ $ev->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Toro 1</label>
                    <select
                        name="toro_1_id"
                        class="w-full p-2 rounded bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-secondary"
                        required
                    >
                        @foreach ($toros as $t)
                            <option
                                value="{{ $t->id }}"
                                @selected($pelea->toro_1_id == $t->id)
                            >
                                {{ $t->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Toro 2</label>
                    <select
                        name="toro_2_id"
                        class="w-full p-2 rounded bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-secondary"
                        required
                    >
                        @foreach ($toros as $t)
                            <option
                                value="{{ $t->id }}"
                                @selected($pelea->toro_2_id == $t->id)
                            >
                                {{ $t->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Ganador (opcional)</label>
                    <select
                        name="ganador_id"
                        class="w-full p-2 rounded bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-secondary"
                    >
                        <option value="">-- Ninguno --</option>
                        @foreach ($toros as $t)
                            <option
                                value="{{ $t->id }}"
                                @selected($pelea->ganador_id == $t->id)
                            >
                                {{ $t->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Observaciones</label>
                    <textarea
                        name="observaciones"
                        rows="3"
                        class="w-full p-2 rounded bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-secondary"
                    >{{ $pelea->observaciones }}</textarea>
                </div>

                <div class="text-right">
                    <button
                        class="bg-secondary text-dark px-4 py-2 rounded hover:bg-yellow-500 transition shadow"
                    >
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
