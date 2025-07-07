<x-app-layout>
    {{-- Navbar ya incluido por Breeze --}}
    
    {{-- Anchor offset para navegación --}}
    <div id="historia" class="pt-24"></div>
    
{{-- Sección Hero / Historia --}}
<section class="relative bg-[#7B0522] text-white py-20 overflow-hidden">
    <!-- Imagen de fondo -->
    <div class="absolute inset-0 bg-cover bg-center"
         style="background-image: url('{{ asset('images/torosnegros.jpg') }}');"></div>

    <!-- capa de color con opacidad -->
    <div class="absolute inset-0 bg-[#7B0522]/80"></div>
    
    <div class="relative max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center gap-8">
        
        {{-- Texto a la izquierda --}}
        <div class="w-full md:w-1/2 space-y-6 text-left">
            <h2 class="text-3xl md:text-5xl font-extrabold">Origen de las peleas de toros</h2>
            <p class="text-lg md:text-xl leading-relaxed">
                Las peleas de toros en Arequipa representan una tradición ancestral que fusiona valentía,
                respeto y orgullo ganadero. Surgidas en los antiguos pueblos altoandinos, estas justas son
                parte de la identidad cultural, reflejando el espíritu competitivo de los criadores y el arraigo por
                preservar las costumbres del campo arequipeño.
            </p>
        </div>

        {{-- Imagen a la derecha --}}
        <div class="w-full md:w-1/2 overflow-hidden rounded-lg shadow-lg">
            <img src="{{ asset('images/toros_peleando.jpg') }}"
                 alt="Toros peleando"
                 class="rounded-lg shadow-lg w-full h-full object-cover hover:scale-105 transition-transform duration-300">
        </div>
    </div>
</section>

{{-- Sección de contenido en bloques --}}
<section class="relative bg-[#F9F4EF] py-16 overflow-hidden">

    <!-- imagen de fondo -->
    <div class="absolute inset-0 bg-cover bg-center"
         style="background-image: url('{{ asset('images/yunta.jpg') }}');">
    </div>

    <!-- capa de color con opacidad -->
    <div class="absolute inset-0 bg-[#F9F4EF]/90"></div>

    <div class="relative max-w-5xl mx-auto px-6 space-y-12">
        {{-- Bloque 1 --}}
        <div class="flex flex-col md:flex-row items-center gap-8">
            <div class="md:w-1/2 overflow-hidden rounded-lg shadow-lg transition-transform duration-300 hover:scale-105">
                <img src="{{ asset('images/origen_peleas.jpg') }}"
                     alt="Orígenes de las peleas"
                     class="rounded-lg shadow-lg w-full h-full object-cover">
            </div>
            <div class="md:w-1/2 text-gray-900"> {{-- texto blanco para mejor contraste --}}
                <h3 class="text-2xl font-bold mb-4">Orígenes en el siglo XIX</h3>
                <p>
                    Las primeras referencias de peleas de toros en Arequipa datan del siglo XIX,
                     impulsadas por ganaderos que exhibían la bravura de sus animales en festividades locales. 
                     Estos eventos no solo servían como muestra de fuerza y resistencia de los toros, sino también 
                     como espacios de reunión comunitaria y celebración cultural. Con el paso del tiempo, las peleas 
                     de toros se consolidaron como una tradición profundamente arraigada en el corazón del pueblo arequipeño, 
                     destacando la valentía, la destreza y el orgullo de los criadores locales.
                </p>
            </div>
        </div>

        {{-- Bloque 2 --}}
        <div class="flex flex-col md:flex-row-reverse items-center gap-8">
            <div class="md:w-1/2 overflow-hidden rounded-lg shadow-lg transition-transform duration-300 hover:scale-105">
                <img src="{{ asset('images/actualemente.jpg') }}"
                     alt="premio mas toro"
                     class="rounded-lg shadow-lg w-full h-full object-cover">
            </div>
            <div class="md:w-1/2 text-gray-900"> {{-- texto blanco para mejor contraste --}}
                <h3 class="text-2xl font-bold mb-4">Presente y legado</h3>
                <p>
                    Actualmente, las peleas de toros siguen siendo parte esencial de la cultura arequipeña, 
                    destacando el cuidado y la crianza responsable de toros criollos para preservar esta tradición. 
                    A lo largo del año, se celebran diversos campeonatos y torneos que reúnen a ganaderos, aficionados 
                    y familias enteras, fomentando la convivencia y el respeto por estas costumbres. Estos eventos, 
                    además de enaltecer la bravura y nobleza de los animales, refuerzan los valores de identidad y pertenencia en la región.
                </p>
            </div>
        </div>
    </div>
</section>
</x-app-layout>
