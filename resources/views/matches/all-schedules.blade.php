<x-layout>
    {{-- Inisialisasi: activeTab default ke 'ALL' dan filterStatus ke 'All' --}}
    <div class="bg-black min-h-screen pt-32 pb-20" 
         x-data="{ 
            activeTab: 'ALL',
            filterStatus: 'All'
         }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-12 border-l-4 border-orange-500 pl-6 flex flex-col md:flex-row md:items-end justify-between gap-6">
                <h1 class="text-4xl md:text-5xl font-black text-white italic uppercase tracking-tighter">
                    Match <span class="text-orange-500">Schedules</span>
                </h1>

                <div class="flex items-center gap-2 bg-gray-900/50 p-1 rounded-lg border border-gray-800">
                    <template x-for="status in ['All', 'Win', 'Lose', 'Upcoming', 'Rank']">
                        <button 
                            @click="filterStatus = status"
                            :class="filterStatus === status ? 'bg-orange-600 text-white shadow-lg' : 'text-gray-400 hover:text-white'"
                            class="px-4 py-1.5 rounded-md text-[10px] font-black uppercase tracking-wider transition-all duration-200"
                            x-text="status">
                        </button>
                    </template>
                </div>
            </div>

            <div class="flex flex-wrap gap-2 mb-10 border-b border-gray-800 pb-4">
                <button 
                    @click="activeTab = 'ALL'"
                    :class="activeTab === 'ALL' ? 'border-orange-600 text-white font-black' : 'border-transparent text-gray-500 hover:text-gray-300'"
                    class="px-6 py-2 border-b-2 uppercase transition-all duration-200 text-sm tracking-widest">
                    ALL SCHEDULES
                </button>

                @foreach($divisions as $division)
                    <button 
                        @click="activeTab = '{{ $division->name }}'"
                        :class="activeTab === '{{ $division->name }}' ? 'border-orange-600 text-white font-black' : 'border-transparent text-gray-500 hover:text-gray-300'"
                        class="px-6 py-2 border-b-2 uppercase transition-all duration-200 text-sm tracking-widest">
                        {{ $division->name }}
                    </button>
                @endforeach
            </div>

            <div class="overflow-x-auto bg-gray-900/20 rounded-2xl border border-gray-800 backdrop-blur-sm">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-800 text-[10px] uppercase tracking-[0.2em] text-gray-500">
                            <th class="px-6 py-5 font-black text-center w-32">Date</th>
                            <th class="px-6 py-5 font-black">Tournament</th>
                            <th class="px-6 py-5 font-black text-center">Matchup</th>
                            <th class="px-6 py-5 font-black text-center">Status</th>
                            <th class="px-6 py-5 font-black text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-white">
                        @foreach($groupedMatches as $category => $matches)
                            @foreach($matches as $match)
                                {{-- 
                                   PERBAIKAN: Menggunakan data-attributes untuk perbandingan Alpine.js.
                                   Ini mencegah eror JavaScript jika nama kategori mengandung spasi atau simbol.
                                --}}
                                <tr class="border-b border-gray-800/50 hover:bg-white/5 transition-colors group"
                                    data-category="{{ $match->game_category }}"
                                    data-status="{{ $match->result_status }}"
                                    x-show="(activeTab === 'ALL' || activeTab === $el.getAttribute('data-category')) && (filterStatus === 'All' || filterStatus === $el.getAttribute('data-status'))">
                                    
                                    <td class="px-6 py-6 text-center">
                                        <div class="font-bold text-sm">{{ $match->match_time->format('d M') }}</div>
                                        <div class="text-gray-500 text-[10px] uppercase">{{ $match->match_time->format('H:i') }}</div>
                                    </td>
                                    
                                    <td class="px-6 py-6">
                                        <div class="text-orange-500 font-black text-sm uppercase tracking-tight">{{ $match->tournament_name }}</div>
                                        <div class="text-gray-400 text-[10px] uppercase mt-1 font-bold">{{ $match->game_category }}</div>
                                    </td>

                                    <td class="px-6 py-6">
                                        <div class="flex items-center justify-center gap-6">
                                            <div class="flex flex-col items-center w-20">
                                                <img src="{{ asset('storage/' . $match->team_internal_logo) }}" class="w-10 h-10 object-contain mb-2" alt="Logo">
                                                <span class="text-[9px] font-black uppercase text-center leading-none">{{ $match->team_internal_name }}</span>
                                            </div>
                                            <div class="text-gray-700 font-black italic text-xl">VS</div>
                                            <div class="flex flex-col items-center w-20">
                                                @if($match->team_external_logo)
                                                    <img src="{{ asset('storage/' . $match->team_external_logo) }}" class="w-10 h-10 object-contain mb-2" alt="Opponent">
                                                @else
                                                    <div class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center text-[10px] font-bold text-gray-500 mb-2 border border-gray-700 italic">?</div>
                                                @endif
                                                <span class="text-[9px] font-black uppercase text-center leading-none truncate w-full">{{ $match->team_external_name ?? 'TBD' }}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-6 text-center">
                                        @if($match->result_status === 'Upcoming')
                                            <span class="px-3 py-1 bg-blue-500/10 text-blue-500 text-[10px] font-black uppercase tracking-widest rounded italic">UPCOMING</span>
                                        @elseif($match->result_status === 'Rank')
                                            <div class="font-black text-white italic text-lg">{{ $match->score_internal }}</div>
                                            <div class="text-[9px] font-bold text-gray-500 uppercase tracking-widest">RANKED</div>
                                        @else
                                            <div class="inline-block px-4 py-1.5 bg-gray-800 rounded font-black text-lg italic group-hover:bg-orange-600 transition-all transform skew-x-[-10deg]">
                                                <span class="inline-block skew-x-[10deg]">{{ $match->score_internal }} - {{ $match->score_external }}</span>
                                            </div>
                                            <div class="text-[9px] mt-2 font-black tracking-[0.2em] {{ $match->result_status == 'Win' ? 'text-green-500' : 'text-red-500' }}">
                                                {{ strtoupper($match->result_status) }}
                                            </div>
                                        @endif
                                    </td>

                                    <td class="px-6 py-6 text-right">
                                        @if($match->match_link)
                                            <a href="{{ $match->match_link }}" target="_blank" class="inline-block px-6 py-2 bg-white text-black text-[10px] font-black uppercase hover:bg-orange-500 hover:text-white transition-all transform skew-x-[-10deg]">
                                                <span class="inline-block skew-x-[10deg]">WATCH</span>
                                            </a>
                                        @else
                                            <span class="text-gray-700 text-[10px] font-black uppercase italic tracking-widest">TBA</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Menampilkan pesan jika hasil filter kosong --}}
            <div x-show="activeTab && $el.closest('.max-w-7xl').querySelectorAll('tbody tr:not([style*=\'display: none\'])').length === 0" 
                 class="mt-8 text-center py-20 bg-gray-900/10 rounded-2xl border border-dashed border-gray-800"
                 x-cloak>
                <p class="text-gray-600 font-bold uppercase tracking-widest italic">No match found for this selection.</p>
            </div>

        </div>
    </div>
</x-layout>

<style>
    /* Mencegah elemen berkedip saat halaman baru dimuat */
    [x-cloak] { display: none !important; }
</style>