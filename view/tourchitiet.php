<div class="product-container">
    <div class="row">
        <div class="col-image">
            <div class="image-bao-boc">
                <img src="photo/tour1.jpg" alt="Tour Hà Nội">
            </div>
        </div>

        <div class="col-thongtin">
            <div class="form-tu-van">
                <h3>Thông tin</h3>

                <div class="info-row">
                    <span class="label">Ngày khởi hành</span>
                    <span class="value">Thứ 3, thứ 6 hàng tuần</span>
                </div>
                <div class="info-row">
                    <span class="label">Thời gian</span>
                    <span class="value">5 ngày 4 đêm</span>
                </div>
                <div class="info-row">
                    <span class="label">Lịch trình</span>
                    <span class="value">Hà Nội – Hà Giang – Sapa</span>
                </div>
                <div class="info-row">
                    <span class="label">Vận chuyển</span>
                    <span class="value">Xe Du Lịch</span>
                </div>

                <div class="price-tag">
                    7,990,000<span> đ</span>
                </div>

                <?php if (isset($_SESSION[''])): ?>
                    <a href="booking_form.php?id=1" class="btn-dat-tour">Đặt Tour ngay</a>
                <?php else: ?>
                    <a href="index.php?pg=login" class="btn-dat-tour" style="background-color: #666;">Đăng nhập để đặt tour</a>
                <?php endif; ?>

                <div class="callback-section">
                    <p class="promo-text">Liên hệ càng sớm - Giá càng rẻ</p>
                    <p>Hoặc để lại số điện thoại, chúng tôi sẽ gọi lại cho bạn sau ít phút!</p>

                    <?php if (isset($_SESSION[''])): ?>
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