<!-- <section id="updates" class="py-20 bg-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl md:text-5xl font-bold mb-12 text-center bg-gradient-to-r from-blue-400 to-orange-400 bg-clip-text text-transparent">
            Updates Terbaru
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-bold mb-6 text-white">Video Terbaru</h3>
                @if($videos->isNotEmpty())
                    <div class="relative group cursor-pointer mb-4 rounded-lg overflow-hidden border border-gray-800">
                        <img src="{{ Storage::url($videos[0]->thumbnail) }}" class="w-full h-64 object-cover">
                        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/60 transition-all flex items-center justify-center">
                            <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i data-lucide="play" class="w-8 h-8 ml-1 text-white"></i>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black via-black/80 to-transparent">
                            <p class="text-sm text-white font-medium">{{ $videos[0]->title }}</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        @foreach($videos->skip(1) as $video)
                        <div class="relative group cursor-pointer rounded-lg overflow-hidden border border-gray-800">
                            <img src="{{ Storage::url($video->thumbnail) }}" class="w-full h-32 object-cover">
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/60 transition-all flex items-center justify-center">
                                <div class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <i data-lucide="play" class="w-5 h-5 ml-0.5 text-white"></i>
                                </div>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 p-2 bg-gradient-to-t from-black via-black/80 to-transparent">
                                <p class="text-xs text-white font-medium line-clamp-1">{{ $video->title }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div>
                <h3 class="text-2xl font-bold mb-6 text-white">Artikel & Berita</h3>
                <div class="space-y-4">
                    @foreach($articles as $article)
                    <div class="bg-gray-900/80 border border-gray-700 rounded-xl overflow-hidden hover:border-blue-500/50 transition-all cursor-pointer group flex gap-4 p-0">
                        <div class="w-32 h-24 flex-shrink-0 overflow-hidden">
                            <img src="{{ Storage::url($article->thumbnail) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="flex-1 py-2 pr-4 flex flex-col justify-center">
                            <h4 class="mb-2 line-clamp-2 text-white font-medium group-hover:text-blue-400 transition-colors">{{ $article->title }}</h4>
                            <div class="flex items-center gap-2 text-sm text-gray-300">
                                <i data-lucide="calendar" class="w-4 h-4"></i> {{ \Carbon\Carbon::parse($article->published_date)->translatedFormat('d M Y') }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section> -->


    <section id="updates" class="py-20 bg-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl md:text-5xl font-bold mb-12 text-center bg-gradient-to-r from-blue-400 to-orange-400 bg-clip-text text-transparent">
                Updates Terbaru
            </h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-bold mb-6 text-white">Video Terbaru</h3>
                    <div class="relative group cursor-pointer mb-4 rounded-lg overflow-hidden border border-gray-800">
                        <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&q=80&w=800" alt="Video Thumb" class="w-full h-64 object-cover">
                        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/60 transition-all flex items-center justify-center">
                            <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                <i data-lucide="play" class="w-8 h-8 ml-1 text-white"></i>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black via-black/80 to-transparent">
                            <p class="text-sm text-white font-medium">KAGENDRA VS RRQ - Highlights MPL S13</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="relative group cursor-pointer rounded-lg overflow-hidden border border-gray-800">
                            <img src="https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&q=80&w=400" class="w-full h-32 object-cover">
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/60 transition-all flex items-center justify-center">
                                <div class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <i data-lucide="play" class="w-5 h-5 ml-0.5 text-white"></i>
                                </div>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 p-2 bg-gradient-to-t from-black via-black/80 to-transparent">
                                <p class="text-xs text-white font-medium">Training Session</p>
                            </div>
                        </div>
                        <div class="relative group cursor-pointer rounded-lg overflow-hidden border border-gray-800">
                            <img src="https://images.unsplash.com/photo-1534423861386-85a16f5d13fd?auto=format&fit=crop&q=80&w=400" class="w-full h-32 object-cover">
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/60 transition-all flex items-center justify-center">
                                <div class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <i data-lucide="play" class="w-5 h-5 ml-0.5 text-white"></i>
                                </div>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 p-2 bg-gradient-to-t from-black via-black/80 to-transparent">
                                <p class="text-xs text-white font-medium">Player Interview</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-bold mb-6 text-white">Artikel & Berita</h3>
                    <div class="space-y-4">
                        <div class="bg-gray-900/80 border border-gray-700 rounded-xl overflow-hidden hover:border-blue-500/50 transition-all cursor-pointer group flex gap-4 p-0">
                            <div class="w-32 h-24 flex-shrink-0 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&q=80&w=400" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="flex-1 py-2 pr-4 flex flex-col justify-center">
                                <h4 class="mb-2 line-clamp-2 text-white font-medium group-hover:text-blue-400 transition-colors">KAGENDRA Raih Juara 1 di MPL Season 13!</h4>
                                <div class="flex items-center gap-2 text-sm text-gray-300">
                                    <i data-lucide="calendar" class="w-4 h-4"></i> 10 Nov 2025
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-900/80 border border-gray-700 rounded-xl overflow-hidden hover:border-blue-500/50 transition-all cursor-pointer group flex gap-4 p-0">
                            <div class="w-32 h-24 flex-shrink-0 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&q=80&w=400" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="flex-1 py-2 pr-4 flex flex-col justify-center">
                                <h4 class="mb-2 line-clamp-2 text-white font-medium group-hover:text-blue-400 transition-colors">Rekrutmen Pemain Baru untuk Divisi Valorant</h4>
                                <div class="flex items-center gap-2 text-sm text-gray-300">
                                    <i data-lucide="calendar" class="w-4 h-4"></i> 08 Nov 2025
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-900/80 border border-gray-700 rounded-xl overflow-hidden hover:border-blue-500/50 transition-all cursor-pointer group flex gap-4 p-0">
                            <div class="w-32 h-24 flex-shrink-0 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1593305841991-05c297ba4575?auto=format&fit=crop&q=80&w=400" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="flex-1 py-2 pr-4 flex flex-col justify-center">
                                <h4 class="mb-2 line-clamp-2 text-white font-medium group-hover:text-blue-400 transition-colors">Partnership Baru dengan ASUS ROG</h4>
                                <div class="flex items-center gap-2 text-sm text-gray-300">
                                    <i data-lucide="calendar" class="w-4 h-4"></i> 05 Nov 2025
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>