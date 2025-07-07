<x-guest-layout>
    <section class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md bg-[#F9F4EF]/90 backdrop-blur-md
                    rounded-lg shadow-xl p-8 space-y-6">

            <h2 class="text-center text-2xl font-bold text-[#7B0522] tracking-widest uppercase">
                Registrar
            </h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <input name="name"  placeholder="Nombre"
                       class="w-full border rounded px-3 py-2 focus:ring-[#7B0522]"
                       value="{{ old('name') }}" required>

                <input name="email" placeholder="Correo"
                       class="w-full border rounded px-3 py-2 focus:ring-[#7B0522]"
                       type="email" value="{{ old('email') }}" required>

                <input name="password" type="password" placeholder="Contraseña"
                       class="w-full border rounded px-3 py-2 focus:ring-[#7B0522]" required>

                <input name="password_confirmation" type="password" placeholder="Confirmar contraseña"
                       class="w-full border rounded px-3 py-2 focus:ring-[#7B0522]" required>

                {{-- errores --}}
                <x-input-error :messages="$errors->all()" class="text-red-600"/>

                <button
                    class="w-full bg-[#7B0522] hover:bg-[#5d041a] text-white py-2 rounded font-semibold transition">
                    Crear cuenta
                </button>

                <p class="text-center text-sm mt-4">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}" class="text-[#7B0522] hover:underline">Inicia sesión</a>
                </p>
            </form>
        </div>
    </section>
</x-guest-layout>

