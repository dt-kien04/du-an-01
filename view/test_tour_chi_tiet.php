<?php
$id = $_GET['id']; // Lấy ID từ URL
$sql = "SELECT * FROM tours WHERE id = $id";
$result = mysqli_query($conn, $sql);
$tour = mysqli_fetch_assoc($result);
?>

<div class="product-container">
    <div class="row">
        <div class="col-image">
            <div class="image-bao-boc">
                <img src="photo/<?php echo $tour['hinh_anh']; ?>" alt="Tour Hà Nội">
            </div>
        </div>

        <div class="col-thongtin">
            <div class="form-tu-van">
                <h3>Thông tin</h3>

                <div class="info-row">
                    <span class="label">Ngày khởi hành</span>
                    <span class="value"><?php echo $tour['ngay_khoi_hanh']; ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Thời gian</span>
                    <span class="value"><?php echo $tour['thoi_gian_tour']; ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Lịch trình</span>
                    <span class="value"><?php echo $tour['lich_trinh']; ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Vận chuyển</span>
                    <span class="value"><?php echo $tour['phuong_tien']; ?></span>
                </div>

                <div class="price-tag">
                    <?php
                    // Kiểm tra nếu có giá mới (giá sau khi giảm)
                    if (!empty($tour['gia_tien_moi']) && $tour['gia_tien_moi'] < $tour['gia_tien']): ?>

                        <!-- Hiển thị giá mới nổi bật -->
                        <span>
                            <?php echo number_format($tour['gia_tien_moi'], 0, ',', '.'); ?> đ
                        </span>
                    <?php else: ?>
                        <!-- Nếu không giảm giá, chỉ hiện giá gốc -->
                        <?php echo number_format($tour['gia_tien_moi'], 0, ',', '.'); ?><span> đ</span>
                    <?php endif; ?>
                </div>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="booking_form.php?pg=tour&id=<?php echo $tour['id']; ?>" class="btn-dat-tour">Đặt Tour ngay</a>
                <?php else: ?>
                    <a href="index.php?pg=login" class="btn-dat-tour btn-locked">Đăng nhập để đặt tour</a>
                <?php endif; ?>

                <div class="callback-section">
                    <p class="promo-text">Liên hệ càng sớm - Giá càng rẻ</p>
                    <p>Hoặc để lại số điện thoại, chúng tôi sẽ gọi lại cho bạn sau ít phút!</p>

                    <?php if (isset($_SESSION['user_id'])): ?>
                        <form class="form-callback" action="view/goi_lai.php" method="POST">
                            <input type="tel" name="sdt_KH" placeholder="Số điện thoại" value="<?php echo $_SESSION['number_phone'] ?? ''; ?>" required>
                            <button type="submit">Yêu cầu gọi lại</button>
                        </form>
                    <?php else: ?>
                        <div class="login-require-msg">
                            <i class="fa fa-lock"></i> Vui lòng <a href="index.php?pg=login">đăng nhập</a> để gửi yêu cầu gọi lại.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>