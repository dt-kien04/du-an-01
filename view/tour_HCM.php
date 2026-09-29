<div class="product-container">
    <div class="row">
        <div class="col-image">
            <div class="image-bao-boc">
                <img src="photo/tour2.jpg" alt="Tour HCM">
            </div>
        </div>

        <div class="col-thongtin">
            <div class="form-tu-van">
                <h3>Thông tin</h3>

                <div class="info-row">
                    <span class="label">Ngày khởi hành</span>
                    <span class="value">Thứ 6, Chủ nhật hàng tuần</span>
                </div>
                <div class="info-row">
                    <span class="label">Thời gian</span>
                    <span class="value">2 ngày 1 đêm</span>
                </div>
                <div class="info-row">
                    <span class="label">Lịch trình</span>
                    <span class="value">TP.Hồ Chí Minh - Phú Quốc</span>
                </div>
                <div class="info-row">
                    <span class="label">Vận chuyển</span>
                    <span class="value">Máy Bay, Xe Du Lịch</span>
                </div>

                <div class="price-tag">
                    3,580,000<span> đ</span>
                </div>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="booking_form.php?id=2" class="btn-dat-tour">Đặt Tour ngay</a>
                <?php else: ?>
                    <a href="index.php?pg=login" class="btn-dat-tour" style="background-color: #666;">Đăng nhập để đặt tour</a>
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