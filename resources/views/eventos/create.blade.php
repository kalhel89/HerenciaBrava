<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-white">Crear nuevo evento</h2>
    </x-slot>

    {{-- contenedor con imagen de fondo y overlay --}}
    <div class="relative min-h-screen pt-24 px-4 flex justify-center items-center overflow-hidden">
        
        {{-- imagen de fondo --}}
        <div class="absolute inset-0">
            <img 
                src="{{ asset('images/estadio.jpg') }}"   {{-- <-- cambia el nombre del archivo aquí si quieres --}}
                alt="Fondo crear evento"
                class="w-full h-full object-cover opacity-40"
            />
            <div class="absolute inset-0 bg-primary opacity-70"></div>
        </div>

        {{-- formulario en primer plano --}}
        <div class="relative z-10 w-full max-w-md">
            <form
                action="{{ route('eventos.store') }}"
                method="POST"
                class="bg-dark text-white p-6 rounded shadow space-y-4"
            >
                @csrf

                <div>
                    <label class="block mb-1 font-semibold">Nombre del evento</label>
                    <input
                        name="nombre"
                        placeholder="Ej: Peleas de Toros por el Aniversario"
                        class="w-full p-2 rounded bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-secondary"
                        required
                    >
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Fecha</label>
                    <input
                        type="date"
                        name="fecha"
                        class="w-full p-2 rounded bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-secondary"
                        required
                    >
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Lugar</label>
                    <input
                        name="lugar"
                        placeholder="Lugar del evento"
                        class="w-full p-2 rounded bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-secondary"
                        required
                    >
                </div>

                <div>
                    <label class="block mb-1 font-semibold">Descripción</label>
                    <textarea
                        name="descripcion"
                        placeholder="Breve descripción"
                        class="w-full p-2 rounded bg-gray-800 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-secondary"
                    ></textarea>
                </div>

                <div class="text-right">
                    <button
                        class="bg-secondary text-dark px-4 py-2 rounded hover:bg-yellow-500 transition shadow"
                    >
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
