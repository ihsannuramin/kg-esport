<nav id="navbar" class="fixed top-0 w-full z-50 transition-all duration-300 bg-black/30 backdrop-blur-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <div class="flex-shrink-0">
                <a href="#" class="focus:outline-none">
                    <img class="w-[110px] h-[110px] object-contain" src="{{ asset('images/Kagendra-logo.png') }}" alt="KAGENDRA"/>
                </a>
            </div>
            <div class="hidden md:block">
                <div class="ml-10 flex items-center space-x-8">
                    @foreach(['Home', 'Sponsor', 'Match', 'Divisi', 'Updates', 'Shop', 'Top Up'] as $item)
                        <a href="#{{ strtolower(str_replace(' ', '', $item)) }}" class="text-gray-200 hover:text-white transition-colors relative group font-medium">
                            {{ $item }}
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-500 to-orange-500 transition-all group-hover:w-full"></span>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="md:hidden">
                <button id="mobile-menu-btn" class="text-white hover:bg-white/10 p-2 rounded-md">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>
        </div>
    </div>
    <div id="mobile-menu" class="hidden md:hidden bg-black/95 backdrop-blur-md border-t border-gray-800 absolute w-full">
        <div class="px-2 pt-2 pb-3 space-y-1">
            @foreach(['Home', 'Sponsor', 'Match', 'Divisi', 'Updates', 'Shop', 'Top Up'] as $item)
                <a href="#{{ strtolower(str_replace(' ', '', $item)) }}" class="block px-3 py-2 text-gray-200 hover:text-white hover:bg-blue-500/20 rounded-md font-medium mobile-link">
                    {{ $item }}
                </a>
            @endforeach
        </div>
    </div>
</nav>

@push('scripts')
<script>
    // 2. Navbar Logic
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('bg-black/70', 'shadow-lg', 'shadow-blue-500/10');
            navbar.classList.remove('bg-black/30');
        } else {
            navbar.classList.remove('bg-black/70', 'shadow-lg', 'shadow-blue-500/10');
            navbar.classList.add('bg-black/30');
        }
    });


    document.getElementById('mobile-menu-btn').addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
@endpush