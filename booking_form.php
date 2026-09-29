<?php
session_start();
include('php/header.php');
?>
<div class="booking-container">
    <h2>Thông tin đặt tour</h2>
    <form action="view/process_booking.php" method="POST">
        <input class="dien" type="hidden" name="id_tour" value="<?php echo $_GET['id']; ?>">

        <div class="form-group">
            <label class="tt">Họ và tên</label>
            <input class="dien" type="text" name="ten_KH" required placeholder="Nguyễn Văn A">
        </div>
        <div class="form-group">
            <label class="tt">Số điện thoại</label>
            <input class="dien" type="tel" name="sdt_KH" value="<?php echo $_SESSION['number_phone'] ?? ''; ?>" required placeholder="090..." readonly>
        </div>
        <div class="form-group">
            <label class="tt">Số người</label>
            <input class="dien" type="number" name="so_nguoi" value="1" min="1">
        </div>
        <div class="form-group">
            <label class="tt">Ghi chú (nếu có)</label>
            <textarea class="dien" name="ghi_chu" rows="3"></textarea>
        </div>
        <button class="mau_khung" type="submit">Xác nhận đặt tour</button>
    </form>
</div>

<?php
// session_start();
include('php/footer.php');
?>