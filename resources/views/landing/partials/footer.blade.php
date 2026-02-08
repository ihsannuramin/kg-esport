<footer class="bg-gradient-to-b from-black to-gray-950 border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
            <div>
                <h3 class="text-3xl font-black mb-4 bg-gradient-to-r from-blue-400 via-purple-400 to-orange-400 bg-clip-text text-transparent">KAGENDRA</h3>
                <p class="text-gray-300 mb-6 font-medium">Tim esports profesional Indonesia yang berdedikasi untuk meraih prestasi di tingkat nasional dan internasional.</p>
                <div class="flex items-center gap-2 text-gray-300">
                    <i data-lucide="mail" class="w-4 h-4"></i>
                    <a href="mailto:partnership@kagendra.com" class="hover:text-blue-400 transition-colors font-medium">partnership@kagendra.com</a>
                </div>
            </div>
            <div>
                <h4 class="text-lg font-bold mb-4 text-white">Quick Links</h4>
                <ul class="space-y-2">
                    @foreach(['Home', 'Match', 'Divisi', 'Shop'] as $link)
                    <li><a href="#{{ strtolower($link) }}" class="text-gray-300 hover:text-blue-400 transition-colors font-medium">{{ $link }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-bold mb-4 text-white">Follow Us</h4>
                <div class="flex gap-4">
                    @foreach(['instagram', 'youtube', 'twitter'] as $social)
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-gradient-to-r hover:from-blue-600 hover:to-orange-600 flex items-center justify-center transition-all">
                        <i data-lucide="{{ $social }}" class="w-5 h-5 text-white"></i>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="border-t border-gray-800 pt-8 text-center text-gray-300 text-sm font-medium">
            <p>&copy; {{ date('Y') }} Kagendra Esports. All Rights Reserved.</p>
        </div>
    </div>
</footer>