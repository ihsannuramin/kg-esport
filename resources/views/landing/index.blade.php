<x-layout>
    @include('landing.partials.hero')
    @include('landing.partials.sponsor')

    <section class="py-32 bg-gradient-to-b from-gray-900 to-black relative overflow-hidden">
        <div class="absolute inset-0 opacity-20 pointer-events-none">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-blue-500 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 left-1/4 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-orange-500 rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-6xl md:text-8xl lg:text-9xl font-black bg-gradient-to-r from-blue-400 via-purple-400 to-orange-400 bg-clip-text text-transparent tracking-tight">
                #GGKAGENDRA
            </h2>
            <p class="mt-8 text-xl text-gray-200 tracking-widest font-bold">
                KAMI DATANG UNTUK MENANG
            </p>
        </div>
    </section>

    @include('landing.partials.match')
    @include('landing.partials.division')
    @include('landing.partials.updates')
    @include('landing.partials.shop')
    @include('landing.partials.topup')

    @include('landing.partials.division-modals')
</x-layout>