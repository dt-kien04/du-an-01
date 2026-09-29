<?php
include('php/ket_noi.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ten_KH = $_POST['ten_KH'];
    $sdt_KH = $_POST['sdt_KH'];
    $noi_dung_tuvan = $_POST['noi_dung_tu_van'];

    $thong_bao = "";

    $sql = "INSERT INTO lien_he (ten_KH, sdt_KH, noi_dung_tu_van) VALUES ('$ten_KH', '$sdt_KH', '$noi_dung_tuvan')";
    if (mysqli_query($conn, $sql)) {
        $thong_bao = "Gửi yêu cầu thành công! Chúng tôi sẽ phản hồi sớm.";
        // exit();
    } else {
        $thong_bao = "Lỗi: " . mysqli_error($conn);
    }
}
?>


<div class="product-container">
    <div class="row">
        <div class="col-image">
            <div class="text-lienhe">
                <h1>Công Ty TNHH TM-DL Web Travel</h1>
                <div class="text-diachi">
                    <p class="dam">Trụ sở chính:<span class="nhat"> 9/2 Đường Bặch Đằng, TP. Thái Bình</span></p>
                    <p class="dam">Văn phòng giao dịch TP. HCM:<span class="nhat"> 30 Võ Thị Sáu, Quận 1, TP. Hồ Chí Minh</span></p>
                    <p class="dam">Chi nhánh Hà Nội:<span class="nhat"> 987, Ngô Gia Tự, Long Biên, TP. Hà Nội</span></p>
                    <p class="dam">Chi nhánh Đà nẵng:<span class="nhat"> 202/19/33 Trần Hưng Đạo, TP. Đà Nẵng</span></p>
                    <p class="dam">Hotline:<span class="nhat"> 0123456789</span></p>
                    <p class="dam">Email:<span class="nhat"> travel@gmail.com</span></p>
                </div>
            </div>
            <div class="image-bao-boc">
                <img src="photo/tour1.jpg" alt="Tour Hà Nội">
            </div>
        </div>

        <div class="col-thongtin">
            <div class="form-tu-van">
                <h3>Để đóng góp ý kiến về chất lượng dịch vụ, thắc mắc cần được giải đáp, xin vui lòng điền vào Form sau đây</h3>

                <?php echo "<p class='thong_bao'>" . $thong_bao . "</p>"; ?>
                <form id="AdviseForm" method="POST">
                    <div class="input-field">
                        <label for="full-name">Họ và tên:</label>
                        <input type="text" id="full-name" name="ten_KH" placeholder="Nhập họ tên" required>
                    </div>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <div class="input-field">
                            <label for="sdt">Số điện thoại:<span>*</span></label>
                            <input type="tel" id="sdt" name="sdt_KH" value="<?php echo $_SESSION['number_phone'] ?? ''; ?>" placeholder="Nhập số điện thoại" required>
                        </div>
                    <?php else: ?>
                        <div class="input-field">
                            <label for="sdt">Số điện thoại:<span>*</span></label>
                            <input type="tel" id="sdt" name="sdt_KH" placeholder="Nhập số điện thoại" required>
                        </div>
                    <?php endif; ?>
                    <div class="input-field">
                        <label>Nội dung cần tư vấn:</label>
                        <textarea rows="10" name="noi_dung_tu_van" placeholder="Nhập thông tin"></textarea>
                    </div>
                    <div class="gui">
                        <button type="submit" class="btn-gui">GỬI NGAY</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>