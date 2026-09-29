<?php
session_start();
require_once 'php/ket_noi.php';

// 1. Bảo vệ trang: Chỉ Admin mới được vào
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$thong_bao = "";

// 2. Xử lý khi bấm nút "Thêm Tour"
if (isset($_POST['btn_them'])) {
    $ten_tour = mysqli_real_escape_string($conn, $_POST['ten_tour']);
    $gia_tien = $_POST['gia_tien'];
    $gia_tien_moi = $_POST['gia_tien_moi'];
    $ngay_khoi_hanh = mysqli_real_escape_string($conn, $_POST['ngay_khoi_hanh']);
    $thoi_gian = mysqli_real_escape_string($conn, $_POST['thoi_gian']);
    $diem_xuat_phat = mysqli_real_escape_string($conn, $_POST['diem_xuat_phat']);
    $phuong_tien = mysqli_real_escape_string($conn, $_POST['phuong_tien']);
    $lich_trinh = mysqli_real_escape_string($conn, $_POST['lich_trinh']);
    $loai_tour = $_POST['loai_tour'];

    // Xử lý Upload ảnh
    $hinh_anh = $_FILES['hinh_anh']['name'];
    $target = "photo/" . basename($hinh_anh);

    if (move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $target)) {
        $sql = "INSERT INTO tours (ten_tour, gia_tien, gia_tien_moi, hinh_anh, ngay_khoi_hanh, thoi_gian_tour, diem_xuat_phat, lich_trinh, tour_hot, phuong_tien) 
                VALUES ('$ten_tour', '$gia_tien', '$gia_tien_moi', '$hinh_anh', '$ngay_khoi_hanh', '$thoi_gian', '$diem_xuat_phat', '$lich_trinh', '$loai_tour', '$phuong_tien')";
        
        if (mysqli_query($conn, $sql)) {
            $thong_bao = "<p style='color:green;'>Thêm tour mới thành công!</p>";
        } else {
            $thong_bao = "<p style='color:red;'>Lỗi CSDL: " . mysqli_error($conn) . "</p>";
        }
    } else {
        $thong_bao = "<p style='color:red;'>Lỗi khi tải ảnh lên!</p>";
    }
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
        <h2>Thêm Tour Du Lịch Mới</h2>
        <?php echo $thong_bao; ?>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <label>Tên Tour:</label>
            <input type="text" name="ten_tour" required placeholder="Ví dụ: Tour Hà Nội - Hạ Long">

            <div class="khung_sua_tour_tien">
                <div>
                    <label>Giá gốc (VNĐ):</label>
                    <input type="number" name="gia_tien" required>
                </div>
                <div>
                    <label>Giá khuyến mãi (VNĐ):</label>
                    <input type="number" name="gia_tien_moi" required>
                </div>
            </div>

            <div class="khung_sua_tour_tien">
                <div>
                    <label>Ngày khởi hành:</label>
                    <input type="text" name="ngay_khoi_hanh" required>
                </div>
                <div>
                    <label>Thời gian:</label>
                    <input type="text" name="thoi_gian" placeholder="Ví dụ: 3 Ngày 2 Đêm" required>
                </div>    
            </div>

            <label>Phương tiện:</label>
            <input type="text" name="phuong_tien" required>

            <label>Điểm xuất phát:</label>
            <input type="text" name="diem_xuat_phat" placeholder="Ví dụ: Hà Nội" required>

            <label>Ảnh tour:</label>
            <input type="file" name="hinh_anh" accept="image/*" required>

            <label>Loại tour:</label>
            <input type="number" name="loai_tour" min=0 max=1 required value="<?php echo $tour['tour_hot']; ?>">

            <label>Lịch trình chi tiết:</label>
            <textarea name="lich_trinh" rows="5" placeholder="Mô tả lịch trình..." required></textarea>

            <button type="submit" name="btn_them" class="btn-add">Đăng Tour</button>
            <a href="admin.php">Quay lại trang quản trị</a>
        </form>
    </div>
</body>
</html>
