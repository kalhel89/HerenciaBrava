<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-[#7A1124]">Editar toro</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-2xl p-8 space-y-6 border border-gray-200">
        <form 
            action="{{ route('toros.update', $toro) }}" 
            method="POST" 
            enctype="multipart/form-data" 
            class="space-y-6"
        >
            @csrf
            @method('PUT')

            {{-- Nombre --}}
            <div>
                <label class="block text-[#7A1124] font-semibold mb-1">Nombre</label>
                <input 
                    name="nombre" 
                    value="{{ $toro->nombre }}" 
                    placeholder="Nombre"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-[#7A1124] focus:border-[#7A1124]"
                    required
                >
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                {{-- Edad --}}
                <div>
                    <label class="block text-[#7A1124] font-semibold mb-1">Edad (años)</label>
                    <input 
                        name="edad" 
                        type="number" 
                        value="{{ $toro->edad }}" 
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-[#7A1124] focus:border-[#7A1124]"
                        required
                    >
                </div>

                {{-- Peso --}}
                <div>
                    <label class="block text-[#7A1124] font-semibold mb-1">Peso (kg)</label>
                    <input 
                        name="peso" 
                        type="number"
                        value="{{ $toro->peso }}"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-[#7A1124] focus:border-[#7A1124]"
                        required
                    >
                </div>

                {{-- Categoría --}}
                <div>
                    <label class="block text-[#7A1124] font-semibold mb-1">Categoría</label>
                    <select 
                        name="categoria" 
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-[#7A1124] focus:border-[#7A1124]"
                        required
                    >
                        <option value="S" {{ $toro->categoria == 'S' ? 'selected' : '' }}>Semipesado</option>
                        <option value="P" {{ $toro->categoria == 'P' ? 'selected' : '' }}>Pesado</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                {{-- Victorias --}}
                <div>
                    <label class="block text-[#7A1124] font-semibold mb-1">Nro de victorias</label>
                    <input 
                        name="victorias"
                        type="number"
                        min="0"
                        value="{{ $toro->victorias ?? 0 }}"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-[#7A1124] focus:border-[#7A1124]"
                    >
                </div>

                {{-- Derrotas --}}
                <div>
                    <label class="block text-[#7A1124] font-semibold mb-1">Nro de derrotas</label>
                    <input 
                        name="derrotas"
                        type="number"
                        min="0"
                        value="{{ $toro->derrotas ?? 0 }}"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-[#7A1124] focus:border-[#7A1124]"
                    >
                </div>

                {{-- Empates --}}
                <div>
                    <label class="block text-[#7A1124] font-semibold mb-1">Nro de empates</label>
                    <input 
                        name="empates"
                        type="number"
                        min="0"
                        value="{{ $toro->empates ?? 0 }}"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-[#7A1124] focus:border-[#7A1124]"
                    >
                </div>
            </div>

            {{-- Propietario --}}
            <div>
                <label class="block text-[#7A1124] font-semibold mb-1">ID propietario</label>
                <input 
                    name="propietario_id" 
                    type="number" 
                    value="{{ $toro->propietario_id }}" 
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-[#7A1124] focus:border-[#7A1124]"
                    required
                >
            </div>

            {{-- Foto --}}
            <div>
                <label class="block text-[#7A1124] font-semibold mb-1">Foto actual:</label>
                @if($toro->foto)
                    <img 
                        src="{{ asset('storage/fotos/'.$toro->foto) }}" 
                        alt="Foto actual del toro" 
                        class="h-40 object-cover rounded shadow mb-2"
                    >
                @else
                    <p class="text-gray-500">No hay foto subida</p>
                @endif

                <input 
                    name="foto" 
                    type="file"
                    accept="image/*"
                    class="w-full border border-gray-300 rounded-lg p-2 mt-2 focus:ring-[#7A1124] focus:border-[#7A1124]"
                >
            </div>

            {{-- Botón --}}
            <div class="text-right">
                <button 
                    class="bg-[#7A1124] hover:bg-[#5a0c1a] text-white px-6 py-2 rounded-lg transition"
                >
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
