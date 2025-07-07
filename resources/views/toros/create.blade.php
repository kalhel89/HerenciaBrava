<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-[#7A1124]">Registrar nuevo toro</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-2xl p-8 space-y-6 border border-gray-200">
        <form 
            action="{{ route('toros.store') }}" 
            method="POST" 
            enctype="multipart/form-data" 
            class="space-y-6"
        >
            @csrf

            <div>
                <label class="block text-[#7A1124] font-semibold mb-1">Nombre</label>
                <input 
                    name="nombre" 
                    placeholder="Ej: Bravucón" 
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-[#7A1124] focus:border-[#7A1124]"
                    required
                >
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-[#7A1124] font-semibold mb-1">Edad (años)</label>
                    <input 
                        name="edad" 
                        type="number" 
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-[#7A1124] focus:border-[#7A1124]"
                        required
                    >
                </div>
                <div>
                    <label class="block text-[#7A1124] font-semibold mb-1">Peso (kg)</label>
                    <input 
                        name="peso" 
                        type="number"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-[#7A1124] focus:border-[#7A1124]"
                        required
                    >
                </div>
                <div>
                    <label class="block text-[#7A1124] font-semibold mb-1">Categoría</label>
                    <select 
                        name="categoria" 
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-[#7A1124] focus:border-[#7A1124]"
                        required
                    >
                        <option value="S">Semipesado</option>
                        <option value="P">Pesado</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-[#7A1124] font-semibold mb-1">Nro de victorias</label>
                    <input 
                        name="victorias"
                        type="number"
                        min="0"
                        value="0"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-[#7A1124] focus:border-[#7A1124]"
                    >
                </div>
                <div>
                    <label class="block text-[#7A1124] font-semibold mb-1">Nro de derrotas</label>
                    <input 
                        name="derrotas"
                        type="number"
                        min="0"
                        value="0"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-[#7A1124] focus:border-[#7A1124]"
                    >
                </div>
                <div>
                    <label class="block text-[#7A1124] font-semibold mb-1">Nro de empates</label>
                    <input 
                        name="empates"
                        type="number"
                        min="0"
                        value="0"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-[#7A1124] focus:border-[#7A1124]"
                    >
                </div>
            </div>

            <div>
                <label class="block text-[#7A1124] font-semibold mb-1">ID propietario</label>
                <input 
                    name="propietario_id" 
                    type="number" 
                    placeholder="Ej: 14" 
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-[#7A1124] focus:border-[#7A1124]"
                    required
                >
            </div>

            <div>
                <label class="block text-[#7A1124] font-semibold mb-1">Foto del toro</label>
                <input 
                    name="foto" 
                    type="file"
                    accept="image/*"
                    class="w-full border border-gray-300 rounded-lg p-2 focus:ring-[#7A1124] focus:border-[#7A1124]"
                >
            </div>

            <div class="text-right">
                <button 
                    class="bg-[#7A1124] hover:bg-[#5a0c1a] text-white px-6 py-2 rounded-lg transition"
                >
                    Guardar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
