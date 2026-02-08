@foreach($divisions as $division)
<div id="modal-{{ $division->slug }}" class="fixed inset-0 z-[60] hidden division-modal">
    <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" onclick="closeAllModals()"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-7xl px-4">
        <div class="bg-gray-900 border border-gray-700 rounded-xl p-6 md:p-8 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-400 to-orange-400 bg-clip-text text-transparent uppercase">{{ $division->name }}</h2>
                    <p class="text-gray-400">Tim Roster Lengkap</p>
                </div>
                <button onclick="closeAllModals()" class="text-gray-400 hover:text-white">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>

            <div class="space-y-6">
                <!-- <div class="relative h-48 md:h-64 rounded-lg overflow-hidden">
                    <img src="{{ Storage::url($division->image) }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                </div> -->

                <div>
                    <h4 class="text-2xl font-bold mb-6 text-white">Roster Pemain:</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($division->players as $player)
                        <div class="bg-gray-800/80 border border-gray-600 rounded-xl overflow-hidden group relative">
                            <div class="relative aspect-[3/4] overflow-hidden">
                                <img src="{{ Storage::url($player->image) }}" class="w-full h-full object-cover object-top group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/60 to-transparent"></div>
                                <div class="absolute bottom-4 left-4 right-4">
                                    <h5 class="text-xl font-bold text-white mb-1 truncate">{{ $player->name }}</h5>
                                    <p class="text-blue-400 font-medium">{{ $player->role }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@push('scripts')
<script>
    function openDivisionModal(slug) {
        document.getElementById('modal-' + slug).classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeAllModals() {
        document.querySelectorAll('.division-modal').forEach(el => el.classList.add('hidden'));
        document.body.style.overflow = 'auto';
    }

    // Close on Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            closeAllModals();
        }
    });
</script>
@endpush