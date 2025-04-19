<!-- Latest jQuery -->
    <script src="{{ url('assets/js/jquery-1.12.4.min.js') }}"></script>
<!-- Latest compiled and minified Bootstrap -->
    <script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>			
<!-- owl-carousel min js  -->
    <script src="{{ url('assets/owlcarousel/js/owl.carousel.min.js') }}"></script>	
<!-- jquery.slicknav -->
    <script src="{{ url('assets/js/jquery.slicknav.js') }}"></script>			
<!-- magnific-popup js -->               
    <script src="{{ url('assets/js/jquery.magnific-popup.min.js') }}"></script>	
<!-- Animated Headline js-->
    <script src="{{ url('assets/js/animated-headline.js') }}"></script>		
<!-- scrolltopcontrol js -->
    <script src="{{ url('assets/js/scrolltopcontrol.js') }}"></script>		
<!-- WOW - Reveal Animations When You Scroll -->
    <script src="{{ url('assets/js/wow.min.js') }}"></script>				
<!-- scripts js -->	
    <script src="{{ url('assets/js/scripts.js') }}"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var grid = document.querySelector('[data-masonry]');

            // Tunggu sampai semua gambar di dalam grid selesai load
            imagesLoaded(grid, function () {
            // Ambil instance Masonry yang otomatis dibuat oleh data-masonry
            var msnry = Masonry.data(grid);
            if (msnry) {
                msnry.layout(); // Paksa Masonry atur ulang layout
            }
            });

            const images = Array.from(document.querySelectorAll('.gallery-img'));
            const modalImage = document.getElementById('modalImage');
            const nextBtn = document.getElementById('nextBtn');
            const prevBtn = document.getElementById('prevBtn');
            const modal = document.getElementById('imageModal');
            let currentIndex = 0;
    
            function showImage(index) {
                if (index >= 0 && index < images.length) {
                const img = images[index];
                const bigImg = img.getAttribute('data-img') || img.getAttribute('src');
                modalImage.setAttribute('src', bigImg);
                currentIndex = index;
                }
            }
        
            images.forEach((img, index) => {
                img.addEventListener('click', function () {
                showImage(index);
                });
            });
        
            nextBtn.addEventListener('click', function () {
                currentIndex = (currentIndex + 1) % images.length;
                showImage(currentIndex);
            });
        
            prevBtn.addEventListener('click', function () {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                showImage(currentIndex);
            });
        
            // ⌨️ Navigasi pakai keyboard
            document.addEventListener('keydown', function (e) {
                const isModalOpen = modal.classList.contains('show');
                if (!isModalOpen) return;
        
                if (e.key === 'ArrowRight') {
                // Panah kanan = next
                currentIndex = (currentIndex + 1) % images.length;
                showImage(currentIndex);
                } else if (e.key === 'ArrowLeft') {
                // Panah kiri = prev
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                showImage(currentIndex);
                }
            });
        });
    </script>