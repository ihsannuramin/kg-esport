<section id="divisi" class="py-20 bg-gradient-to-b from-black to-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-center bg-gradient-to-r from-blue-400 to-orange-400 bg-clip-text text-transparent">
            Divisi Kami
        </h2>
        <p class="text-center text-gray-300 mb-12 font-medium">Tim profesional di berbagai game esports</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($divisions as $division)
            <div onclick="openDivisionModal('{{ $division->slug }}')" class="bg-gray-900/80 border border-gray-700 rounded-xl overflow-hidden cursor-pointer group hover:border-blue-500/50 transition-all hover:scale-105">
                <div class="relative h-48 overflow-hidden">
                    <img src="{{ Storage::url($division->image) }}" alt="{{ $division->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
                    <div class="absolute bottom-4 left-4">
                        <div class="text-sm text-blue-400 mb-1 font-bold">{{ $division->slug }}</div>
                        <h3 class="text-xl font-bold text-white">{{ $division->name }}</h3>
                    </div>
                </div>
                <!-- <div class="p-4">
                    <div class="text-sm text-gray-300 font-medium">{{ $division->players->count() }} Pemain</div>
                </div> -->
            </div>
            @endforeach
        </div>
    </div>
</section>