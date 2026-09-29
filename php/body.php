<section id="main">
    <div class="content">
        <div class="text-main">
            <strong>Khám phá Việt Nam</strong>
            <h1>Hãy khám phá và tận hưởng chuyến đi của bạn</h1>
            <p>Khám phá những điểm đến ngoạn mục và tạo nên những kỉ niệm khó quên cùng Travel. Từ phong cảnh tuyệt đẹp đến những thành phố sôi động, chuyến phiêu lưu tiếp theo của bạn sẽ thật sự bùng nổ. Hãy để chúng tôi biến những chuyến đi ước mơ của bạn thành hiện thực</p>
            <a href="index.php?pg=tour">Đặt trực tuyến</a>
        </div>
        <div class="img-main">
            <img src="photo/img1.jpg" alt="img">
        </div>
    </div>
</section>
<section id="search">
    <div class="tim-tour">
        <form action="index.php" method="GET">
            <input type="hidden" name="pg" value="tour">
            <div class="tim-box">
                <div class="s-b-icon">
                    <i class="ri-map-pin-line"></i>
                </div>
                <div class="s-b-input">
                    <span>Địa điểm <i class="ri-arrow-down-s-line"></i></span>
                    <input type="text" name="diadiem" placeholder="Hà Nội, Việt Nam" required />
                </div>
            </div>
            <div class="tim-box">
                <div class="s-b-icon">
                    <i class="ri-calendar-2-line"></i>
                </div>
                <div class="s-b-input">
                    <span>Lịch <i class="ri-arrow-down-s-line"></i></span>
                    <input type="date" name="lich" min="2025-01-01" required />
                </div>
            </div>
            <div class="tim-box">
                <div class="s-b-icon">
                    <i class="ri-team-line"></i>
                </div>
                <div class="s-b-input">
                    <span>Thành viên <i class="ri-arrow-down-s-line"></i></i></span>
                    <input type="number" name="solg" placeholder="3 người" min="3" required />
                </div>
            </div>
            <div class="lup">
                <button type="submit"><i class="ri-search-line"></i></button>
            </div>
        </form>
        <div>
</section>
<section id="trending" class="trending">
    <div class="content-trending">
        <div class="text-trending">
            <h2>Nổi bật 2025</h2>
            <p>Những trải nghiệm ấn tượng mà bạn không thể bỏ lỡ trong chuyến đi khám phá lần này!</p>
        </div>
    </div>
    <div class="trending-container">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                // 1. Truy vấn các tour nổi bật (giả sử bạn có cột trending hoặc lấy 6 tour mới nhất)
                $sql_trending = "SELECT * FROM tours WHERE tour_hot = 1 ORDER BY id DESC LIMIT 6";
                $result_trending = mysqli_query($conn, $sql_trending);

                // 2. Kiểm tra và lặp dữ liệu
                if (mysqli_num_rows($result_trending) > 0) {
                    while ($row = mysqli_fetch_assoc($result_trending)) {
                ?>
                        <div class="swiper-slide">
                            <div class="trending-box">
                                <div class="t-img">
                                    <!-- Sử dụng cột hinh_anh từ database -->
                                    <img src="photo/<?php echo $row['hinh_anh']; ?>" alt="travel">
                                </div>
                                <div class="t-text">
                                    <!-- Link tới trang chi tiết dựa trên ID -->
                                    <a href="index.php?pg=tour&id=<?php echo $row['id']; ?>"><?php echo $row['ten_tour']; ?></a>
                                    <!-- Hiển thị mô tả ngắn hoặc lịch trình -->
                                    <span><?php echo $row['thoi_gian_tour']; ?> | <?php echo $row['phuong_tien']; ?></span>
                                </div>
                                <div class="t-book">
                                    <!-- Định dạng giá tiền -->
                                    <span><?php echo number_format($row['gia_tien_moi'], 0, ',', '.'); ?> VNĐ</span>
                                    <?php if (isset($_SESSION['user_id'])): ?>
                                        <a href="booking_form.php?pg=tour&id=<?php echo $row['id']; ?>">Đặt ngay</a>
                                    <?php else: ?>
                                        <a href="index.php?pg=login">Đặt ngay</a>
                                    <?php endif; ?>
                                    <!-- <a href="index.php?pg=dat_cho&id=<?php echo $row['id']; ?>">Đặt ngay</a> -->
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<p style='text-align:center; width:100%;'>Hiện chưa có tour nổi bật.</p>";
                }
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>


<section id="diem-den">

    <div class="diem-den-heading">
        <h2>Điểm đến hàng đầu</h2>
        <p>Những lý do tuyệt vời khiến Việt Nam trở thành điểm đến của bạn!</p>
    </div>

    <div class="diem-den-grid">

        <div class="diem-den-box d-b-1">
            <img alt="Diemden" src="photo/ha-noi-1.jpg" />

            <div class="d-b-text-container">
                <span class="ration">3.5</span>
                <div class="d-b-text">
                    <strong>Hà Nội</strong>
                </div>
            </div>
        </div>

        <div class="diem-den-box d-b-2">
            <img alt="Diemden" src="photo/ha-giang.webp" />

            <div class="d-b-text-container">
                <span class="ration">3.6</span>
                <div class="d-b-text">
                    <strong>Hà Giang</strong>
                </div>
            </div>
        </div>

        <div class="diem-den-box d-b-3">
            <img alt="Diemden" src="photo/hoi-an.jpg" />

            <div class="d-b-text-container">
                <span class="ration">3.7</span>
                <div class="d-b-text">
                    <strong>Hội An</strong>
                </div>
            </div>
        </div>

        <div class="diem-den-box d-b-4">
            <img alt="Diemden" src="photo/TP-HCM.jpg" />

            <div class="d-b-text-container">
                <span class="ration">3.8</span>
                <div class="d-b-text">
                    <strong>Sài Gòn</strong>
                </div>
            </div>
        </div>

        <div class="diem-den-box d-b-5">
            <img alt="Diemden" src="photo/nha-trang.jpg" />

            <div class="d-b-text-container">
                <span class="ration">3.9</span>
                <div class="d-b-text">
                    <strong>Nha Trang</strong>
                </div>
            </div>
        </div>
    </div>

</section>
<section id="danh-gia">

    <div class="danh-gia-img">
        <img alt="Review" src="photo/review.png" />
    </div>

    <div class="danh-gia-slider">
        <div class="review__content">
            <h3>Đánh giá <span class="material-symbols-outlined">reviews</span></h3>
            <h2>Khách hàng quý giá nói gì về chúng tôi</h2>
        </div>

        <div class="swiper mySwipertest">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="khach-box">
                        <div class="khach-box-text">
                            <i class="ri-double-quotes-l"></i>
                            <p>Thiên nhiên Việt Nam thật hùng vĩ, một nơi tuyệt vời dành cho các bạn muốn khám phá.</p>
                            <strong>Maria</strong>
                        </div>

                        <div class="khach-box-img">
                            <img alt="Khach" src="photo/view1.jpeg">
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="khach-box">
                        <div class="khach-box-text">
                            <i class="ri-double-quotes-l"></i>
                            <p>Web Travel đã giúp tôi có một chuyến đi thật sự đáng nhớ với những kỉ niệm đẹp.</p>
                            <strong>Toyoshi</strong>
                        </div>

                        <div class="khach-box-img">
                            <img alt="Khach" src="photo/view2.jpg">
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="khach-box">
                        <div class="khach-box-text">
                            <i class="ri-double-quotes-l"></i>
                            <p>Đừng chần chừ mà không đặt ngay Web Travel để bạn tận hưởng kỳ nghỉ du lịch tuyệt vời.</p>
                            <strong>Nam Trần</strong>
                        </div>

                        <div class="khach-box-img">
                            <img alt="Khach" src="photo/view3.jpeg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<section id="dang-ky">
    <strong>Đăng ký với chúng tôi</strong>
    <p>Cập nhật tin tức, thông tin mới nhất và các nội dung khác mỗi tuần.</p>

    <?php
    $thong_bao = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btn_email'])) {
        // Sử dụng mysqli_real_escape_string để chống SQL Injection
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        // Kiểm tra email đã tồn tại trong bảng chưa (tránh trùng lặp)
        $check_sql = "SELECT id FROM lien_he WHERE email = '$email'";
        $check_res = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($check_res) > 0) {
            $thong_bao = "Email này đã đăng ký trước đó rồi!";
        } else {
            $sql = "INSERT INTO lien_he (email) VALUES ('$email')";
            if (mysqli_query($conn, $sql)) {
                $thong_bao = "Đăng ký nhận tin thành công!";
            } else {
                $thong_bao = "Lỗi: " . mysqli_error($conn);
            }
        }
    }
    ?>

    <!-- Hiển thị thông báo nếu có -->
    <?php if ($thong_bao): ?>
        <p style="color: #ff4a52; font-weight: bold;"><?php echo $thong_bao; ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Nhập địa chỉ email của bạn" required />
        <button type="submit" name="btn_email"><i class="fa fa-paper-plane"></i></button>
    </form>
</section>