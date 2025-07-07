<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-white">Editar evento</h2>
    </x-slot>

    {{-- fondo con rojo sangre e imagen opcional --}}
    <div class="relative min-h-screen pt-24 px-4 overflow-hidden">

        {{-- imagen de fondo opcional --}}
        <div class="absolute inset-0">
            <img 
                src="{{ asset('images/estadio.jpg') }}"  {{-- <--- aquí puedes cambiar el nombre de la imagen --}}
                alt="Fondo editar eventos"
                class="w-full h-full object-cover opacity-40"
            >
            <div class="absolute inset-0 bg-primary opacity-80"></div>
        </div>

        {{-- contenido sobre el fondo --}}
        <div class="relative z-10 max-w-2xl mx-auto bg-dark bg-opacity-90 rounded shadow p-6 space-y-6 text-white">

            <form action="{{ route('eventos.update', $evento) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                {{-- nombre --}}
                <div>
                    <label class="block mb-1 font-semibold">Nombre del evento</label>
                    <input 
                        name="nombre" 
                        value="{{ $evento->nombre }}" 
                        class="w-full rounded p-2 text-dark"
                        required
                    >
                </div>

                {{-- fecha --}}
                <div>
                    <label class="block mb-1 font-semibold">Fecha</label>
                    <input 
                        name="fecha" 
                        type="date" 
                        value="{{ \Carbon\Carbon::parse($evento->fecha)->format('Y-m-d') }}" 
                        class="w-full rounded p-2 text-dark"
                        required
                    >
                </div>

                {{-- lugar --}}
                <div>
                    <label class="block mb-1 font-semibold">Lugar</label>
                    <input 
                        name="lugar" 
                        value="{{ $evento->lugar }}" 
                        class="w-full rounded p-2 text-dark"
                        required
                    >
                </div>

                {{-- descripción --}}
                <div>
                    <label class="block mb-1 font-semibold">Descripción</label>
                    <textarea 
                        name="descripcion" 
                        class="w-full rounded p-2 text-dark"
                        rows="3"
                    >{{ $evento->descripcion }}</textarea>
                </div>

                <div class="text-right">
                    <button 
                        class="bg-secondary text-dark px-6 py-2 rounded hover:bg-yellow-500 transition"
                    >
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
