<section id="hero" class="relative h-screen w-full overflow-hidden">
    <div id="hero-slider" class="relative h-full w-full">
        @foreach($slides as $index => $slide)
        <div class="absolute inset-0 transition-opacity duration-1000 hero-slide {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" 
             style="z-index: {{ $index === 0 ? '10' : '0' }}">
            
            <div class="absolute inset-0">
                <img src="{{ Storage::url($slide->image) }}" alt="{{ $slide->title }}" class="w-full h-full object-cover">
                
                <div class="absolute inset-0 bg-gradient-to-r"
                     style="background-image: linear-gradient(to right, 
                            {{ $slide->overlay_color ?? '#000000' }} 0%, 
                            {{ $slide->overlay_color ?? '#000000' }}80 50%, 
                            transparent 100%); 
                            opacity: {{ $slide->overlay_opacity ?? '0.5' }};">
                </div>
            </div>

            <div class="relative h-full flex items-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="max-w-3xl">
<!--                         <div class="text-blue-400 tracking-widest mb-4 font-bold text-lg uppercase">{{ $slide->game_tag }}</div>
                        <h1 class="text-5xl md:text-7xl mb-6 text-white font-bold">{{ $slide->title }}</h1>
                        <p class="text-xl text-gray-200 mb-8">{{ $slide->description }}</p> -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <button id="prev-slide" class="absolute left-4 top-1/2 -translate-y-1/2 p-2 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur-sm z-20 text-white">
        <i data-lucide="chevron-left" class="w-8 h-8"></i>
    </button>
    <button id="next-slide" class="absolute right-4 top-1/2 -translate-y-1/2 p-2 rounded-full bg-white/10 hover:bg-white/20 backdrop-blur-sm z-20 text-white">
        <i data-lucide="chevron-right" class="w-8 h-8"></i>
    </button>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex space-x-3 z-20">
        @foreach($slides as $index => $slide)
            <button onclick="setSlide({{ $index }})" 
                    class="slide-indicator h-3 rounded-full transition-all {{ $index === 0 ? 'bg-blue-500 w-8' : 'bg-white/30 w-3' }}"
                    id="indicator-{{ $index }}">
            </button>
        @endforeach
    </div>
</section>

@push('scripts')
<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.hero-slide');
    const indicators = document.querySelectorAll('.slide-indicator');

    function updateSlide() {
        slides.forEach((el, index) => {
            if (index === currentSlide) {
                el.classList.remove('opacity-0');
                el.classList.add('opacity-100');
                el.style.zIndex = 10;
            } else {
                el.classList.remove('opacity-100');
                el.classList.add('opacity-0');
                el.style.zIndex = 0;
            }
        });
        
        indicators.forEach((el, index) => {
            if (index === currentSlide) {
                el.classList.remove('bg-white/30', 'w-3');
                el.classList.add('bg-blue-500', 'w-8');
            } else {
                el.classList.add('bg-white/30', 'w-3');
                el.classList.remove('bg-blue-500', 'w-8');
            }
        });
    }

    function nextSlide() { currentSlide = (currentSlide + 1) % slides.length; updateSlide(); }
    function prevSlide() { currentSlide = (currentSlide - 1 + slides.length) % slides.length; updateSlide(); }
    function setSlide(index) { currentSlide = index; updateSlide(); }

    document.getElementById('next-slide').addEventListener('click', nextSlide);
    document.getElementById('prev-slide').addEventListener('click', prevSlide);
    setInterval(nextSlide, 5000);
</script>
@endpush