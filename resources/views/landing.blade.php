<x-guest-layout>   {{-- ← tu nuevo layout --}}

    <section class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md bg-[#F9F4EF]/90 backdrop-blur-md
                    rounded-lg shadow-xl p-8 space-y-6">

            <h2 class="text-center text-2xl font-bold text-[#7B0522] tracking-widest uppercase">
                Registrar
            </h2>

            @if (session('ok'))
                <div class="p-4 bg-green-100 text-green-700 rounded shadow">
                    {{ session('ok') }}
                </div>
            @endif

            <form action="{{ route('usuarios.store') }}" method="POST" class="space-y-4">
                @csrf
                <input name="name"  placeholder="Nombre"
                       class="w-full border rounded px-3 py-2 focus:ring-[#7B0522]" required>

                <input name="email" placeholder="Correo"
                       class="w-full border rounded px-3 py-2 focus:ring-[#7B0522]" required>

                <input name="password" type="password" placeholder="Contraseña"
                       class="w-full border rounded px-3 py-2 focus:ring-[#7B0522]" required>

                <input name="password_confirmation" type="password" placeholder="Confirmar contraseña"
                       class="w-full border rounded px-3 py-2 focus:ring-[#7B0522]" required>


                <button
                    class="w-full bg-[#7B0522] hover:bg-[#5d041a] text-white py-2 rounded font-semibold transition">
                    Registrar Usuario
                </button>
            </form>
        </div>
    </section>

</x-guest-layout>