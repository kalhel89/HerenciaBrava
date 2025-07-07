<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Herencia Brava') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="relative min-h-screen antialiased">

    {{-- 🔹 Fondo global (z‑10 negativo) --}}
    <div class="fixed inset-0 -z-10">
        <img src="{{ asset('images/estadio.jpg') }}"
             alt="Fondo eventos"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-primary/80"></div>
    </div>
    
    <div class="relative z-10 flex flex-col items-center justify-center min-h-screen px-4">
        {{-- Logo XL y margen negativo pegado al contenido --}}
        <div class="-mb-28">
            <img src="{{ asset('images/logo.png') }}"
                alt="Herencia Brava"
                class="h-64 w-auto max-w-xs mx-auto drop-shadow-lg">
        </div>

        {{-- Slot del contenido --}}
        <main class="w-full max-w-md">
            {{ $slot }}
        </main>
    </div>

</body>
</html>
