<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-white">Nueva pelea</h2>
    </x-slot>

    {{-- fondo con rojo sangre e imagen opcional --}}
    <div class="relative min-h-screen pt-24 px-4 overflow-hidden">

        {{-- imagen de fondo opcional --}}
        <div class="absolute inset-0">
            <img 
                src="{{ asset('images/estadio.jpg') }}"  {{-- <-- cambia este nombre si quieres --}}
                alt="Fondo nueva pelea"
                class="w-full h-full object-cover opacity-30"
            >
            <div class="absolute inset-0 bg-primary opacity-80"></div>
        </div>

        {{-- contenido sobre el fondo --}}
        <div class="relative z-10 max-w-2xl mx-auto bg-dark bg-opacity-90 rounded shadow p-6 text-white space-y-4">

            <form action="{{ route('peleas.store') }}" method="POST" class="space-y-4">
                @csrf

                {{-- evento --}}
                <div>
                    <label class="block mb-1 font-semibold">Evento</label>
                    <select name="evento_id" class="w-full rounded p-2 text-dark" required>
                        @foreach ($eventos as $ev)
                            <option value="{{ $ev->id }}">{{ $ev->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- toro 1 --}}
                <div>
                    <label class="block mb-1 font-semibold">Toro 1</label>
                    <select name="toro_1_id" class="w-full rounded p-2 text-dark" required>
                        @foreach ($toros as $t)
                            <option value="{{ $t->id }}">{{ $t->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- toro 2 --}}
                <div>
                    <label class="block mb-1 font-semibold">Toro 2</label>
                    <select name="toro_2_id" class="w-full rounded p-2 text-dark" required>
                        @foreach ($toros as $t)
                            <option value="{{ $t->id }}">{{ $t->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- ganador --}}
                <div>
                    <label class="block mb-1 font-semibold">Ganador (opcional)</label>
                    <select name="ganador_id" class="w-full rounded p-2 text-dark">
                        <option value="">-- Elegir --</option>
                        @foreach ($toros as $t)
                            <option value="{{ $t->id }}">{{ $t->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- observaciones --}}
                <div>
                    <label class="block mb-1 font-semibold">Observaciones</label>
                    <textarea 
                        name="observaciones" 
                        class="w-full rounded p-2 text-dark"
                        rows="3"
                        placeholder="Observaciones adicionales"
                    ></textarea>
                </div>

                <div class="text-right">
                    <button 
                        class="bg-secondary text-dark px-6 py-2 rounded hover:bg-yellow-500 transition"
                    >
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
