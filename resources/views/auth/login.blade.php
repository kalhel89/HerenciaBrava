<x-guest-layout>
    <section class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md bg-[#F9F4EF]/90 backdrop-blur-md
                    rounded-lg shadow-xl p-8 space-y-6">

            <h2 class="text-center text-2xl font-bold text-[#7B0522] tracking-widest uppercase">
                Iniciar sesión
            </h2>

            {{-- status de sesión (éxito de reset o verificación) --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <input id="email" name="email" type="email"
                       placeholder="Correo" autofocus
                       class="w-full border rounded px-3 py-2 focus:ring-[#7B0522]"
                       value="{{ old('email') }}" required>

                <input id="password" name="password" type="password"
                       placeholder="Contraseña"
                       class="w-full border rounded px-3 py-2 focus:ring-[#7B0522]" required>

                {{-- Remember me --}}
                <label class="inline-flex items-center text-sm">
                    <input name="remember" type="checkbox"
                           class="rounded border-gray-300 text-[#7B0522] shadow-sm">
                    <span class="ms-2 text-gray-700">Recuérdame</span>
                </label>

                {{-- errores --}}
                <x-input-error :messages="$errors->all()" class="text-red-600"/>

                <button
                    class="w-full bg-[#7B0522] hover:bg-[#5d041a] text-white py-2 rounded font-semibold transition">
                    Entrar
                </button>

                @if (Route::has('password.request'))
                    <p class="text-center text-sm mt-4">
                        <a class="text-[#7B0522] hover:underline" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </p>
                @endif
                
                {{-- 🔹 Enlace para crear cuenta --}}
                <p class="text-center text-sm mt-4">
                    ¿Aún no tienes cuenta?
                    <a href="{{ route('register') }}" class="text-[#7B0522] hover:underline">
                        Regístrate aquí
                    </a>
                </p>
            </form>
        </div>
    </section>
</x-guest-layout>
