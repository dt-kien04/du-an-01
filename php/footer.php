<footer>
    <div class="footer-container">
        <div class="footer-box">
            <strong>
                <a href="#">
                    <img src="photo/logo.png" alt="logo">
                </a>
            </strong>
            <p>Hãy bấm theo dõi các trang mạng xã hội của chúng tôi để cập nhật các tin tức nổi bật mới nhất.</p>
            <div class="footer-lien-ket-link">
                <a href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>

        <div class="footer-box">
            <strong>Liên Kết</strong>
            <ul>
                <li><a href="index.php?pg=travel">Trang chủ</a></li>
                <li><a href="index.php?pg=tour">Tour</a></li>
                <li><a href="index.php?pg=gioithieu">Giới thiệu</a></li>
                <li><a href="index.php?pg=travel#trending">Nổi bật</a></li>
                <!-- <li><a href="#">Đặt trực tuyến</a></li> -->
            </ul>
        </div>

        <div class="footer-box">
            <strong>Liên Hệ</strong>
            <span><i class="fa fa-map-marker-alt"></i>Hà Nội, Việt Nam</span>
            <span><i class="fa fa-envelope"></i><a href="#">travel@gmail.com</a></span>
            <span><i class="fa fa-phone-square-alt"></i><a href="#">0123456789</a></span>
        </div>

    </div>
</footer>
<span class="copyright">Web Travel 2025 - All Copyright Reserved</span>




<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        loop: true,
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
        },
    });
    var swiper = new Swiper(".mySwipertest", {
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        loop: true,
    });
</script>
</body>

</html>