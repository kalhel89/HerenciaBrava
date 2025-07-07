<x-app-layout>
    <x-slot name="header">Crear usuario</x-slot>

    <div class="pt-24 max-w-md mx-auto space-y-6">

        @if(session('ok'))
            <div class="p-4 bg-green-100 text-green-700 rounded shadow">
                {{ session('ok') }}
            </div>
        @endif

        <form action="{{ route('usuarios.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
            @csrf

            <input name="name" class="w-full border rounded px-3 py-2" placeholder="Nombre" required>

            <input name="email" class="w-full border rounded px-3 py-2" placeholder="Correo" required>

            <input name="password" type="password" class="w-full border rounded px-3 py-2" placeholder="Contraseña" required>

            <input name="password_confirmation" type="password" class="w-full border rounded px-3 py-2" placeholder="Confirmar contraseña" required>

            <select name="rol" class="w-full border rounded px-3 py-2" required>
                <option value="usuario">Usuario normal</option>
                <option value="admin">Administrador</option>
            </select>

            <button class="bg-[#7B0522] text-white px-4 py-2 rounded w-full hover:bg-[#5d041a]">
                Crear usuario
            </button>
        </form>
    </div>
</x-app-layout>