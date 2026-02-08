<section class="py-24 bg-black relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <h2 class="text-4xl md:text-5xl font-black text-white italic tracking-tighter">
                    LATEST <span class="text-orange-500">MATCHES</span>
                </h2>
                <div class="h-1.5 w-24 bg-orange-600 mt-2"></div>
            </div>
            <a href="#" class="text-gray-400 hover:text-white transition font-bold tracking-widest text-sm flex items-center gap-2">
                VIEW ALL SCHEDULES 
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <div class="grid gap-6">
            @forelse($matches as $match)
                <div class="group relative bg-gray-900/50 border border-gray-800 rounded-2xl overflow-hidden hover:border-orange-500/50 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-r from-orange-600/5 to-blue-600/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    
                    <div class="p-6 md:p-8 flex flex-col md:flex-row items-center justify-between gap-8 relative z-10">
                        
                        <div class="w-full md:w-1/4 text-center md:text-left">
                            <span class="px-3 py-1 bg-gray-800 text-orange-400 text-xs font-bold rounded-full uppercase tracking-widest">
                                {{ $match->game_category }}
                            </span>
                            <h4 class="text-white font-bold mt-3 text-lg leading-tight">{{ $match->tournament_name }}</h4>
                            <p class="text-gray-500 text-sm mt-1 font-medium">
                                {{ $match->match_time->format('D, d M Y | H:i') }} WIB
                            </p>
                        </div>

                        <div class="flex-1 flex items-center justify-center gap-4 md:gap-12">
                            <div class="flex flex-col items-center gap-2 w-24 md:w-32 text-center">
                                <div class="w-16 h-16 md:w-20 md:h-20 flex items-center justify-center bg-gray-800 rounded-full p-3 group-hover:scale-110 transition-transform shadow-xl">
                                    <img src="{{ asset('storage/' . $match->team_internal_logo) }}" alt="Kagendra" class="w-full h-full object-contain">
                                </div>
                                <span class="text-white font-bold text-sm truncate w-full">{{ $match->team_internal_name }}</span>
                            </div>

                            <div class="flex flex-col items-center">
                                <div class="text-4xl md:text-5xl font-black italic tracking-tighter text-white flex gap-3">
                                    <span class="{{ $match->score_internal > $match->score_external ? 'text-orange-500' : '' }}">
                                        {{ $match->score_internal ?? 0 }}
                                    </span>
                                    <span class="text-gray-700">-</span>
                                    <span class="{{ $match->score_external > $match->score_internal ? 'text-red-500' : '' }}">
                                        {{ $match->score_external ?? 0 }}
                                    </span>
                                </div>
                                <div class="mt-2 px-4 py-1 rounded text-[10px] font-black uppercase tracking-[0.2em] {{ $match->result_status === 'Win' ? 'bg-green-500/20 text-green-500' : 'bg-gray-800 text-gray-400' }}">
                                    {{ $match->result_status }}
                                </div>
                            </div>

                            <div class="flex flex-col items-center gap-2 w-24 md:w-32 text-center">
                                <div class="w-16 h-16 md:w-20 md:h-20 flex items-center justify-center bg-gray-800 rounded-full p-3 group-hover:scale-110 transition-transform shadow-xl">
                                    @if($match->team_external_logo)
                                        <img src="{{ asset('storage/' . $match->team_external_logo) }}" alt="Opponent" class="w-full h-full object-contain">
                                    @else
                                        <span class="text-2xl font-bold text-gray-600">?</span>
                                    @endif
                                </div>
                                <span class="text-white font-bold text-sm truncate w-full">{{ $match->team_external_name ?? 'TBD' }}</span>
                            </div>
                        </div>

                        <div class="w-full md:w-auto">
                            <a href="{{ $match->match_link ?? '#' }}" class="block w-full text-center px-8 py-3 bg-white text-black font-black text-sm hover:bg-orange-500 hover:text-white transition-colors skew-x-[-12deg]">
                                <span class="inline-block skew-x-[12deg]">WATCH LIVE</span>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-20 border-2 border-dashed border-gray-800 rounded-3xl">
                    <p class="text-gray-500 font-bold italic">NO MATCHES SCHEDULED AT THE MOMENT</p>
                </div>
            @endforelse
        </div>
    </div>
</section>