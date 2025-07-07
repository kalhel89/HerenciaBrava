<x-guest-layout>
    <section class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md bg-[#F9F4EF]/90 backdrop-blur-md
                    rounded-lg shadow-xl p-8 space-y-6">

            <h2 class="text-center text-2xl font-bold text-[#7B0522] tracking-widest uppercase">
                Restablecer contraseña
            </h2>

            {{-- descripción --}}
            <p class="text-sm text-gray-700">
                ¿Olvidaste tu contraseña? No hay problema. Ingresa tu correo y te enviaremos
                un enlace para que elijas una nueva.
            </p>

            {{-- estado de sesión --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                {{-- email --}}
                <input id="email" name="email" type="email" placeholder="Correo"
                       class="w-full border rounded px-3 py-2 focus:ring-[#7B0522]"
                       value="{{ old('email') }}" required autofocus>
                <x-input-error :messages="$errors->get('email')" class="text-red-600" />

                {{-- botón guinda sólido --}}
                <x-primary-button
                    class="w-full bg-[#7B0522] hover:bg-[#5d041a] active:bg-[#7B0522] focus:bg-[#7B0522]
                           text-white font-semibold py-2 rounded flex justify-center">
                    {{ __('Enviar enlace') }}
                </x-primary-button>
            </form>
        </div>
    </section>
</x-guest-layout>


