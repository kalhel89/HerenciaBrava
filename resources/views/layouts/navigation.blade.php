{{-- navigation-menu.blade.php --}}
<nav x-data="{ menuOpen: false }"
     class="bg-dark backdrop-blur fixed top-0 w-full z-50 shadow-md">

    {{-- 🔹 Barra superior (logo + links desktop + botón) --}}
    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-3">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-4">
            <img src="{{ asset('images/logo2.png') }}" alt="Herencia Brava"
                 class="h-20 w-20 object-contain -ml-24">
            <span class="hidden lg:block uppercase tracking-widest text-white font-extrabold text-xl">
                Herencia Brava
            </span>
        </a>

        <div class="hidden md:flex items-center space-x-8">
            {{-- … tus <x-nav-link> de escritorio … --}}
        </div>
        {{-- botón hamburguesa (sin cambios) --}}
        <button @click="menuOpen = true" class="flex text-white">
            <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

    {{-- RECTÁNGULO NEGRO FIJO A LA DERECHA --}}
    <aside x-show="menuOpen"
       x-transition:enter="transition transform duration-300"
       x-transition:enter-start="translate-x-full"
       x-transition:enter-end="translate-x-0"
       x-transition:leave="transition transform duration-200"
       x-transition:leave-start="translate-x-0"
       x-transition:leave-end="translate-x-full"
       class="fixed top-0 right-0 h-screen w-64
              bg-dark           {{-- ← mismo color que la barra --}}
              z-60 flex flex-col px-6 pt-10 space-y-6">

        {{-- botón cerrar --}}
        <button @click="menuOpen = false" class="absolute top-4 right-4 text-gray-200">
            <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        {{-- enlaces (siempre clicables) --}}
        <a href="{{ route('toros.index') }}"
        class="{{ request()->routeIs('toros.*') ? 'text-secondary' : 'text-white' }}
                block py-2 hover:text-secondary uppercase tracking-widest font-semibold">
        Toros
        </a>

        <a href="{{ route('eventos.index') }}"
        class="{{ request()->routeIs('eventos.*') ? 'text-secondary' : 'text-white' }}
                block py-2 hover:text-secondary uppercase tracking-widest font-semibold">
        Eventos
        </a>

        <a href="{{ route('peleas.index') }}"
        class="{{ request()->routeIs('peleas.*') ? 'text-secondary' : 'text-white' }}
                block py-2 hover:text-secondary uppercase tracking-widest font-semibold">
        Peleas
        </a>

        <a href="{{ route('ranking.index') }}"
        class="{{ request()->routeIs('ranking.*') ? 'text-secondary' : 'text-white' }}
                block py-2 hover:text-secondary uppercase tracking-widest font-semibold">
        Ranking
        </a>

        @auth
            @if(auth()->user()->rol === 'admin')
                <a href="{{ route('usuarios.create') }}"
                class="{{ request()->routeIs('usuarios.*') ? 'text-secondary' : 'text-white' }}
                        block py-2 hover:text-secondary uppercase tracking-widest font-semibold">
                Usuarios
                </a>
            @endif

            {{-- cerrar sesión --}}
            <form id="logout-form-mobile" method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="#" onclick="event.preventDefault(); this.closest('form').submit();"
                class="block py-2 text-white hover:text-secondary uppercase tracking-widest font-semibold">
                Cerrar sesión
                </a>
            </form>
        @endauth
    </aside>
</nav>