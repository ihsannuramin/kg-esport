<!-- <section id="shop" class="py-20 bg-gradient-to-b from-gray-900 to-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-center bg-gradient-to-r from-blue-400 to-orange-400 bg-clip-text text-transparent">
            Official Merchandise
        </h2>
        <p class="text-center text-gray-300 mb-12 font-medium">Koleksi merchandise resmi Kagendra Esports</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($products as $product)
            <div class="bg-gray-900/80 border border-gray-700 rounded-xl overflow-hidden group hover:border-blue-500/50 transition-all">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 text-white">{{ $product->name }}</h3>
                    <p class="text-2xl font-bold text-blue-400 mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <a href="{{ $product->link ?? '#' }}" class="w-full bg-gradient-to-r from-blue-600 to-orange-600 hover:from-blue-700 hover:to-orange-700 text-white font-bold py-2 rounded-md flex items-center justify-center gap-2">
                        <i data-lucide="shopping-cart" class="w-4 h-4"></i> Beli Sekarang
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> -->

    <section id="shop" class="py-20 bg-gradient-to-b from-gray-900 to-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-center bg-gradient-to-r from-blue-400 to-orange-400 bg-clip-text text-transparent">
                Official Merchandise
            </h2>
            <p class="text-center text-gray-300 mb-12 font-medium">
                Koleksi merchandise resmi Kagendra Esports
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gray-900/80 border border-gray-700 rounded-xl overflow-hidden group hover:border-blue-500/50 transition-all">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=400&q=80" alt="Jersey" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-white">Jersey Home 2025</h3>
                        <p class="text-2xl font-bold text-blue-400 mb-4">Rp 350.000</p>
                        <button class="w-full bg-gradient-to-r from-blue-600 to-orange-600 hover:from-blue-700 hover:to-orange-700 text-white font-bold py-2 rounded-md flex items-center justify-center gap-2">
                            <i data-lucide="shopping-cart" class="w-4 h-4"></i> Beli Sekarang
                        </button>
                    </div>
                </div>
                <div class="bg-gray-900/80 border border-gray-700 rounded-xl overflow-hidden group hover:border-blue-500/50 transition-all">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=400&q=80" alt="Hoodie" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-white">Hoodie Kagendra</h3>
                        <p class="text-2xl font-bold text-blue-400 mb-4">Rp 450.000</p>
                        <button class="w-full bg-gradient-to-r from-blue-600 to-orange-600 hover:from-blue-700 hover:to-orange-700 text-white font-bold py-2 rounded-md flex items-center justify-center gap-2">
                            <i data-lucide="shopping-cart" class="w-4 h-4"></i> Beli Sekarang
                        </button>
                    </div>
                </div>
                <div class="bg-gray-900/80 border border-gray-700 rounded-xl overflow-hidden group hover:border-blue-500/50 transition-all">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1588850561407-ed78c282e89b?w=400&q=80" alt="Cap" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-white">Snapback Cap</h3>
                        <p class="text-2xl font-bold text-blue-400 mb-4">Rp 150.000</p>
                        <button class="w-full bg-gradient-to-r from-blue-600 to-orange-600 hover:from-blue-700 hover:to-orange-700 text-white font-bold py-2 rounded-md flex items-center justify-center gap-2">
                            <i data-lucide="shopping-cart" class="w-4 h-4"></i> Beli Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>