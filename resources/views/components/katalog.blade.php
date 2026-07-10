<section class="produk" style="padding: 40px 0;">
    <div class="container">
        
        <h2>Produk Terbaru</h2>
        <div class="produk-grid">
            @isset($products)
                @forelse($products as $product)
                    <div class="card-produk">
                        
                        <div class="inner-box-produk">
                            @if($product->image)
                                <img src="{{ route('baca.gambar', basename($product->image)) }}" alt="{{ $product->name }}">
                            @else
                                <div class="no-image-box">Tidak Ada Gambar</div>
                            @endif
                        </div>
                        
                        <div class="card-info">
                            <h3 class="text-produk-title">{{ $product->name }}</h3>
                            <p>Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            
                            <span style="color: #ffffff; font-size: 11px; opacity: 0.8; margin-top: 4px; text-align: center; display: block;">
                                *Harga Belum Termasuk Pajak
                            </span>
                        </div>
                        
                    </div> @empty
                <div style="grid-column: 1 / -1; text-align: center; color: #9ca3af; font-size: 14px; padding: 40px 0;">Belum ada produk inventaris.</div>
                @endforelse
            @endisset
        </div>

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const wrapper = document.getElementById('carousel-wrapper');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const dots = document.querySelectorAll('.carousel-dot');
        
        if (!wrapper || !nextBtn) return; 

        const totalSlides = {{ isset($posters) ? $posters->count() : 0 }};
        let currentIndex = 0;
        let slideInterval;

        function updateSlider(index) {
            currentIndex = index;
            wrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
            
            dots.forEach((dot, i) => {
                if (i === currentIndex) {
                    dot.classList.add('bg-white', '!w-4');
                    dot.classList.remove('bg-white/40');
                } else {
                    dot.classList.remove('bg-white', '!w-4');
                    dot.classList.add('bg-white/40');
                }
            });
        }

        function nextSlide() {
            let nextIndex = currentIndex + 1;
            if (nextIndex >= totalSlides) {
                nextIndex = 0;
            }
            updateSlider(nextIndex);
        }

        function prevSlide() {
            let prevIndex = currentIndex - 1;
            if (prevIndex < 0) {
                prevIndex = totalSlides - 1;
            }
            updateSlider(prevIndex);
        }

        function startAutoSlide() {
            slideInterval = setInterval(nextSlide, 4000);
        }

        function resetInterval() {
            clearInterval(slideInterval);
            startAutoSlide();
        }

        nextBtn.addEventListener('click', () => { nextSlide(); resetInterval(); });
        prevBtn.addEventListener('click', () => { prevSlide(); resetInterval(); });
        
        startAutoSlide();
    });
</script>