<section id="sponsor" class="py-20 bg-gradient-to-b from-black to-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-center text-gray-300 tracking-widest mb-12 font-bold text-xl">DIDUKUNG OLEH</h2>
        
        @php
            // Membagi koleksi sponsor menjadi grup berisi 5 item
            $sponsorChunks = $sponsors->chunk(4);
            $totalFaces = $sponsorChunks->count();
        @endphp

        <div class="relative flex items-center justify-center max-w-6xl mx-auto">
            {{-- Jika tidak ada sponsor, tampilkan pesan --}}
            @if($sponsors->isEmpty())
                <div class="text-gray-500 italic">Belum ada partner/sponsor.</div>
            @else
                <div id="cubeScene" class="w-full h-52 md:h-64" style="perspective: 1000px;">        
                    <div id="sponsorCube" class="relative w-full h-full duration-700 ease-in-out" style="transform-style: preserve-3d; transform: rotateY(0deg);">                                    
                        
                        {{-- Loop untuk setiap sisi kubus (per 5 item) --}}
                        @foreach($sponsorChunks as $index => $chunk)
                            <div class="cube-face" style="transform: rotateY({{ $index * 90 }}deg) translateZ(576px);">
                                <div class="flex items-center justify-center gap-8 md:gap-12 h-full px-4">                            
                                    
                                    {{-- Loop item sponsor di dalam satu sisi --}}
                                    @foreach($chunk as $sponsor)
                                        <div class="flex-shrink-0 group">
                                            <a 
                                                href="{{ $sponsor->website_url ?? '#' }}" 
                                                class="w-32 h-24 flex items-center justify-center transition-all duration-300"
                                                @if($sponsor->website_url) target="_blank" rel="noopener noreferrer" @endif
                                            >
                                                @if($sponsor->logo)
                                                    <img 
                                                        src="{{ $sponsor->logo }}" 
                                                        alt="{{ $sponsor->name }}" 
                                                        class="max-w-full max-h-full object-contain transition-all duration-300"
                                                    >
                                                @else
                                                    {{-- Fallback jika tidak ada logo --}}
                                                    <span class="text-sm font-bold text-gray-400 group-hover:text-white text-center">
                                                        {{ $sponsor->name }}
                                                    </span>
                                                @endif
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<style>
    /* Menyembunyikan sisi belakang elemen saat rotasi 3D */
    .cube-face {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        /* Tambahkan background transparan/gelap agar item lebih terbaca jika overlap (opsional) */
        /* background: rgba(0,0,0,0.5); */ 
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const cube = document.getElementById('sponsorCube');
    
    // Pastikan elemen ada sebelum menjalankan script
    if (!cube) return;

    let currentFace = 0;
    
    // MENGAMBIL JUMLAH TOTAL FACE DARI PHP
    const totalFaces = {{ $totalFaces > 0 ? $totalFaces : 1 }}; 
    
    const autoplayDelay = 5000; // 5 detik
    let autoplayTimer; 

    // Fungsi untuk memperbarui rotasi kubus
    const updateCube = () => {
        const rotationAngle = currentFace * -90; 
        cube.style.transform = `rotateY(${rotationAngle}deg)`;
    };

    // Fungsi untuk maju ke slide berikutnya
    const nextFace = () => {
        currentFace = (currentFace + 1) % totalFaces;
        updateCube();
    };

    // Fungsi untuk memulai Autoplay
    const startAutoplay = () => {
        // Hanya jalankan autoplay jika ada lebih dari 1 sisi
        if (totalFaces > 1) {
            autoplayTimer = setInterval(() => {
                nextFace(); 
            }, autoplayDelay);
        }
    };

    // --- Inisialisasi ---
    updateCube(); 
    startAutoplay(); 
});
</script>