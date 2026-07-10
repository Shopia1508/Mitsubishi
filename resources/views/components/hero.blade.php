<style>
    /* Paksa ukuran font ikon panah di dalam Swiper menjadi kecil */
    .heroSwiper .swiper-button-prev::after, 
    .heroSwiper .swiper-button-next::after {
        font-size: 25px !important; /* Ukuran default Swiper itu 44px, kita paksa turun ke 16px biar kecil manis */
    }
</style>
<section class="hero" style="max-width: 500px; margin: 0 auto 40px auto; padding: 0 15px;">
    @isset($posters)
        @if($posters->count() > 0)
        <div class="swiper heroSwiper relative rounded-2xl shadow-md overflow-hidden" style="aspect-ratio: 4/5; --swiper-theme-color: #636363;">
            
            <div class="swiper-wrapper">
                @foreach($posters as $poster)
                    <div class="swiper-slide w-full h-full">
                        <img src="{{ route('baca.gambar.poster', $poster->image) }}" class="w-full h-full object-cover block" alt="Promo Mitsubishi">
                    </div>
                @endforeach
            </div>

            <div class="swiper-button-prev !text-zinc-800 !bg-white/70 hover:!bg-white/90 !w-8 !h-8 !rounded-full shadow after:!text-xs z-20 cursor-pointer"></div>

            <div class="swiper-button-next !text-zinc-800 !bg-white/70 hover:!bg-white/90 !w-8 !h-8 !rounded-full shadow after:!text-xs z-20 cursor-pointer"></div>

            <div class="swiper-pagination !bottom-5 z-20"></div>

        </div>
        @endif
    @endisset
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper(".heroSwiper", {
            loop: true,                         // Slider muter terus gak mentok
            autoplay: {
                delay: 4000,                    // Geser otomatis setiap 4 detik
                disableOnInteraction: false,    // Tetap auto slide walaupun habis diklik manual
                reverseDirection: false,        // Memastikan arah jalannya ke KANAN
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,                // Titik bulat bisa diklik manual
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    });
</script>