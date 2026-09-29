<?php
session_start();
require_once 'php/ket_noi.php';

$id = (int)$_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tours WHERE id = $id");
$tour = mysqli_fetch_assoc($result);

if (isset($_POST['btn_update'])) {
    $ten_tour = mysqli_real_escape_string($conn, $_POST['ten_tour']);
    $gia_tien = $_POST['gia_tien'];
    $gia_tien_moi = $_POST['gia_tien_moi'];
    $thoi_gian = mysqli_real_escape_string($conn, $_POST['thoi_gian']);
    $diem_xuat_phat = mysqli_real_escape_string($conn, $_POST['diem_xuat_phat']);
    $lich_trinh = mysqli_real_escape_string($conn, $_POST['lich_trinh']);
    $loai_tour = $_POST['loai_tour'];
    
    // Nếu có chọn ảnh mới thì upload, không thì giữ ảnh cũ
    if ($_FILES['hinh_anh']['name'] != "") {
        $hinh_anh = $_FILES['hinh_anh']['name'];
        move_uploaded_file($_FILES['hinh_anh']['tmp_name'], "photo/" . $hinh_anh);
    } else {
        $hinh_anh = $tour['hinh_anh'];
    }

    $sql = "UPDATE tours SET ten_tour='$ten_tour', gia_tien='$gia_tien', gia_tien_moi='$gia_tien_moi', hinh_anh='$hinh_anh', thoi_gian_tour='$thoi_gian', diem_xuat_phat='$diem_xuat_phat', lich_trinh='$lich_trinh', tour_hot='$loai_tour' WHERE id=$id";
    mysqli_query($conn, $sql);
    header("Location: admin.php?tab=tours");
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin - Thêm Tour Mới</title>
    <link rel="stylesheet" href="css/them_sua_tour.css">
    <link rel="stylesheet" href="css/login.css"> <!-- Tận dụng lại CSS form của bạn -->
</head>
<body>
    <div class="admin-form">
        <h2>Sửa Tour Du Lịch</h2>
        <?php echo $thong_bao; ?>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <label>Tên Tour:</label>
            <input type="text" name="ten_tour" required value="<?php echo $tour['ten_tour']; ?>">

            <div class="khung_sua_tour_tien">
                <div>
                    <label>Giá gốc (VNĐ):</label>
                    <input type="number" name="gia_tien" required value="<?php echo $tour['gia_tien']; ?>">
                </div>
                <div>
                    <label>Giá khuyến mãi (VNĐ):</label>
                    <input type="number" name="gia_tien_moi" required value="<?php echo $tour['gia_tien_moi']; ?>">
                </div>
            </div>

            <label>Thời gian:</label>
            <input type="text" name="thoi_gian" required value="<?php echo $tour['thoi_gian_tour']; ?>">

            <label>Điểm xuất phát:</label>
            <input type="text" name="diem_xuat_phat" required value="<?php echo $tour['diem_xuat_phat']; ?>">

            <label>Ảnh tour:</label>
            <input type="file" name="hinh_anh" accept="image/*">

            <label>Loại tour</label>
            <input type="number" name="loai_tour" min=0 max=1 required value="<?php echo $tour['tour_hot']; ?>">

            <label>Lịch trình chi tiết:</label>
            <textarea name="lich_trinh" rows="5" required><?php echo $tour['lich_trinh']; ?></textarea>

            <button type="submit" name="btn_update" class="btn-add">Đăng Tour</button>
            <a href="admin.php">Quay lại trang quản trị</a>
        </form>
    </div>
</body>
</html>