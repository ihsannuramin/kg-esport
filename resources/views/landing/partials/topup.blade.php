<!-- <section id="topup" class="py-20 bg-black">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="flex items-center justify-center gap-3 mb-4">
                <i data-lucide="gamepad-2" class="w-10 h-10 text-blue-500"></i>
                <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-blue-400 to-orange-400 bg-clip-text text-transparent">
                    Top Up Voucher Game
                </h2>
            </div>
            <p class="text-gray-300 font-medium">Top up mudah dan cepat untuk game favoritmu</p>
        </div>

        <div class="bg-gray-900/80 border border-gray-700 rounded-xl p-8">
            <form class="space-y-8" onsubmit="event.preventDefault(); alert('Ini hanya demo. Integrasikan dengan Payment Gateway pilihan.');">
                <div>
                    <label class="text-lg mb-4 block text-white font-bold">Pilih Game</label>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach(['HOK', 'MLBB', 'Free Fire'] as $game)
                        <button type="button" class="p-6 rounded-lg border-2 border-gray-600 hover:border-blue-500 hover:text-white text-gray-300 transition-all font-medium focus:border-blue-500 focus:bg-blue-500/20 focus:text-white">
                            <div class="text-sm font-bold">{{ $game }}</div>
                        </button>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label class="text-lg mb-4 block text-white font-bold">User ID Game</label>
                    <input type="text" placeholder="Masukkan User ID kamu" class="w-full bg-gray-800 border border-gray-600 h-12 px-3 rounded-md text-white placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="text-lg mb-4 block text-white font-bold">Pilih Nominal</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($topups as $topup)
                        <button type="button" class="p-4 rounded-lg border-2 border-gray-600 hover:border-blue-500 hover:text-white text-gray-300 transition-all text-left font-medium focus:border-blue-500 focus:bg-blue-500/20 focus:text-white">
                            <div class="mb-1">{{ $topup->diamonds }} Diamonds</div>
                            <div class="text-sm text-blue-400 font-bold">Rp {{ number_format($topup->price, 0, ',', '.') }}</div>
                        </button>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-orange-600 hover:from-blue-700 hover:to-orange-700 h-14 rounded-md text-lg text-white font-bold transition-all">
                    Bayar Sekarang
                </button>
            </form>
        </div>
    </div>
</section> -->


    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    
    <style>
        :root {
            --rrq-gold: #F7B81C;
            --rrq-dark: #0a0a0a;
        }

        body { margin: 0; background: #000; font-family: 'Barlow', sans-serif; color: #fff; }

        .section.division { padding: 60px 0; background: #000; overflow: hidden; }
        .containerfull { width: 95%; max-width: 1600px; margin: 0 auto; }

        /* Judul Section */
        .division__text { text-align: center; margin-bottom: 40px; }
        .division__text img { max-width: 300px; transition: transform 0.5s ease; }
        .division__text:hover img { transform: scale(1.05); }

        /* Slider Styles */
        #division-slider { margin: 0 -15px; }
        
        .division__list--item {
            position: relative;
            height: 550px;
            margin: 0 15px;
            outline: none;
            overflow: hidden;
            border-radius: 4px;
            background: #111;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        /* Character Pop-up Effect */
        .item--char {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: 3;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.5s ease;
            pointer-events: none;
        }
        .item--char .char {
            width: 100%; height: 100%;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: bottom center;
        }

        /* Background Transition */
        .item--inner, .item__wrapper { width: 100%; height: 100%; position: relative; }
        .img {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-size: cover;
            background-position: center;
            transition: opacity 0.6s ease, transform 0.8s ease;
        }
        .img.second { opacity: 0; filter: brightness(0.7); }

        /* Hover State Animation */
        .division__list--item:hover { transform: skewX(-2deg); }
        .division__list--item:hover .img.main { opacity: 0; }
        .division__list--item:hover .img.second { opacity: 1; transform: scale(1.1); }
        .division__list--item:hover .item--char { opacity: 1; transform: translateY(0); }

        /* Content Overlay */
        .item--content {
            position: absolute;
            bottom: 40px; left: 0; width: 100%;
            z-index: 5; text-align: center;
            padding: 0 20px;
        }
        .item--content .logo {
            max-width: 180px; height: auto;
            margin: 0 auto 25px;
            filter: drop-shadow(0 5px 15px rgba(0,0,0,0.5));
        }

        /* Button Styling */
        .item--button { display: inline-block; text-decoration: none; position: relative; }
        .division-button { filter: drop-shadow(0 0 5px var(--rrq-gold)); transition: 0.3s; }
        .button-hover-state { opacity: 0; transition: 0.3s; }
        .item--button:hover .button-hover-state { opacity: 1; }
        .item--button:hover .division-button { transform: scale(1.05); }

        /* Category Icon */
        .item--category {
            position: absolute;
            top: 20px; right: 20px;
            z-index: 10;
            background: rgba(247, 184, 28, 0.8);
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 12px;
            color: #000;
            font-weight: bold;
        }

        /* Arrow Navigation */
        .slick-prev, .slick-next { width: 50px; height: 50px; z-index: 100; }
        .slick-prev:before, .slick-next:before { font-size: 40px; color: var(--rrq-gold); }
        .slick-prev { left: -50px; }
        .slick-next { right: -50px; }
    </style>

<section class="section division" id="division-section">
    <div class="containerfull">
        
<section id="topup" class="py-20 bg-black">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="flex items-center justify-center gap-3 mb-4">
                <i data-lucide="gamepad-2" class="w-10 h-10 text-blue-500"></i>
                <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-blue-400 to-orange-400 bg-clip-text text-transparent">
                    Top Up Voucher Game
                </h2>
            </div>
            <p class="text-gray-300 font-medium">Top up mudah dan cepat untuk game favoritmu</p>
        </div>
    </div>
</section>
        <div class="division--d">
            <ul class="division__list" id="division-slider">
                
                <li class="division__list--item">
                    <div class="item--category">MOBILE</div>
                    <div class="item--char">
                        <div class="char" style="background-image: url(https://teamrrq.com/assets/division/home_background/desktop/division_images67b46fe322462_MLBB-HOME%20BACKGROUND%20IMAGES-POPUP.png);"></div>
                    </div>
                    <div class="item--inner">
                        <div class="img main" style="background-image: url(https://teamrrq.com/assets/division/home_background/desktop/division_images67b337e85f857_MLBB-HOME%20BACKGROUND%20IMAGES-DESKTOP.jpg);"></div>
                        <div class="img second" style="background-image: url(https://teamrrq.com/assets/division/home_background/desktop/division_images67b337e85f857_MLBB-HOME%20BACKGROUND%20IMAGES-HOVER.jpg);"></div>
                    </div>
                    <div class="item--content">
                        <img src="https://teamrrq.com/assets/division/home_logo/division_images67b33145259d6_Logo%20Home%20Images%20mlbb.png" class="logo">
                        <a href="#" class="item--button">
                            <img src="https://teamrrq.com/images/division/btn-view.png" alt="View" class="division-button">
                        </a>
                    </div>
                </li>

                <li class="division__list--item">
                    <div class="item--category">MOBILE</div>
                    <div class="item--char">
                        <div class="char" style="background-image: url(https://teamrrq.com/assets/division/home_background/desktop/division_images666aab5249f2f_HOK-HOME%20BACKGROUND%20IMAGES-POPUP.png);"></div>
                    </div>
                    <div class="item--inner">
                        <div class="img main" style="background-image: url(https://teamrrq.com/assets/division/home_background/desktop/division_images666aab5249f2f_HOK-HOME%20BACKGROUND%20IMAGES-DESKTOP.jpg);"></div>
                        <div class="img second" style="background-image: url(https://teamrrq.com/assets/division/home_background/desktop/division_images666aab5249f2f_HOK-HOME%20BACKGROUND%20IMAGES-HOVER.jpg);"></div>
                    </div>
                    <div class="item--content">
                        <img src="https://teamrrq.com/assets/division/home_logo/division_images666aab5249f2f_HOK-LOGO%20HOME%20IMAGES.png" class="logo">
                        <a href="#" class="item--button">
                            <img src="https://teamrrq.com/images/division/btn-view.png" alt="View" class="division-button">
                        </a>
                    </div>
                </li>

                <li class="division__list--item">
                    <div class="item--category">MOBILE</div>
                    <div class="item--char">
                        <div class="char" style="background-image: url(https://teamrrq.com/assets/division/home_background/desktop/division_images67b46f069a718_PUBGM-HOME%20BACKGROUND%20IMAGES-POPUP.png);"></div>
                    </div>
                    <div class="item--inner">
                        <div class="img main" style="background-image: url(https://teamrrq.com/assets/division/home_background/desktop/division_images67b46f069a718_PUBGM-HOME%20BACKGROUND%20IMAGES-DESKTOP.jpg);"></div>
                        <div class="img second" style="background-image: url(https://teamrrq.com/assets/division/home_background/desktop/division_images67b46f069a718_PUBGM-HOME%20BACKGROUND%20IMAGES-HOVER.jpg);"></div>
                    </div>
                    <div class="item--content">
                        <img src="https://teamrrq.com/assets/division/home_logo/division_images67b46f069a718_Logo%20Home%20Images%20PUBGM.png" class="logo">
                        <a href="#" class="item--button">
                            <img src="https://teamrrq.com/images/division/btn-view.png" alt="View" class="division-button">
                        </a>
                    </div>
                </li>

                <li class="division__list--item">
                    <div class="item--category">MOBILE</div>
                    <div class="item--char">
                        <div class="char" style="background-image: url(https://teamrrq.com/assets/division/home_background/desktop/division_images67b46f672d6bc_FF-HOME%20BACKGROUND%20IMAGES-POPUP.png);"></div>
                    </div>
                    <div class="item--inner">
                        <div class="img main" style="background-image: url(https://teamrrq.com/assets/division/home_background/desktop/division_images67b4657e07b58_FF-HOME%20BACKGROUND%20IMAGES-DESKTOP.jpg);"></div>
                        <div class="img second" style="background-image: url(https://teamrrq.com/assets/division/home_background/desktop/division_images67b4657e07b58_FF-HOME%20BACKGROUND%20IMAGES-HOVER.jpg);"></div>
                    </div>
                    <div class="item--content">
                        <img src="https://teamrrq.com/assets/division/home_logo/division_images67b33161ab73b_Logo%20Home%20Images%20ff.png" class="logo">
                        <a href="#" class="item--button">
                            <img src="https://teamrrq.com/images/division/btn-view.png" alt="View" class="division-button">
                        </a>
                    </div>
                </li>

                <li class="division__list--item">
                    <div class="item--category">MOBILE</div>
                    <div class="item--char">
                        <div class="char" style="background-image: url(https://teamrrq.com/assets/division/home_background/desktop/division_images67b47031159b6_eFBM-HOME%20BACKGROUND%20IMAGES-POPUP.png);"></div>
                    </div>
                    <div class="item--inner">
                        <div class="img main" style="background-image: url(https://teamrrq.com/assets/division/home_background/desktop/division_images67b323e0eb31d_eFBM-HOME%20BACKGROUND%20IMAGES-DESKTOP.jpg);"></div>
                        <div class="img second" style="background-image: url(https://teamrrq.com/assets/division/home_background/desktop/division_images67b323e0eb31d_eFBM-HOME%20BACKGROUND%20IMAGES-HOVER.jpg);"></div>
                    </div>
                    <div class="item--content">
                        <img src="https://teamrrq.com/assets/division/home_logo/division_images67b323e0eb31d_Logo%20Home%20Images.png" class="logo">
                        <a href="#" class="item--button">
                            <img src="https://teamrrq.com/images/division/btn-view.png" alt="View" class="division-button">
                        </a>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    $(document).ready(function(){
        $('#division-slider').slick({
            dots: false,
            infinite: true,
            speed: 500,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: true,
            pauseOnHover: true,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: { slidesToShow: 3 }
                },
                {
                    breakpoint: 768,
                    settings: { slidesToShow: 1, arrows: false, dots: true }
                }
            ]
        });
    });
</script>
