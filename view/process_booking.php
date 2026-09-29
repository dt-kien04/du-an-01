<?php
include('../php/ket_noi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_tour = $_POST['id_tour'];
    $ten_KH = $_POST['ten_KH'];
    $sdt_KH = $_POST['sdt_KH'];
    $so_nguoi = $_POST['so_nguoi'];
    $ghi_chu = $_POST['ghi_chu'];

    // 1. Sửa câu lệnh SQL để lấy cả giá cũ và giá mới
    $sql_tour = "SELECT gia_tien, gia_tien_moi FROM tours WHERE id = '$id_tour' LIMIT 1";
    $result_tour = mysqli_query($conn, $sql_tour);
    $tour = mysqli_fetch_assoc($result_tour);

    if ($tour) {
        // 2. Logic lấy giá đúng: Ưu tiên gia_tien_moi nếu có, nếu không thì dùng gia_tien
        $gia_ap_dung = ($tour['gia_tien_moi'] > 0) ? $tour['gia_tien_moi'] : $tour['gia_tien'];
        
        $tong_tien = $gia_ap_dung * $so_nguoi;

        // 3. Thực hiện lưu vào database (giữ nguyên cấu trúc của bạn)
        $sql = "INSERT INTO dat_cho (id_tour, ten_KH, sdt_KH, so_nguoi, ghi_chu, tong_tien) 
                VALUES ('$id_tour', '$ten_KH', '$sdt_KH', '$so_nguoi', '$ghi_chu', '$tong_tien')";

        if (mysqli_query($conn, $sql)) {
            // Lưu ý: Phải xóa lệnh 'echo' trước 'header' để tránh lỗi không chuyển hướng được
            header('location: ../index.php?pg=hien_thi_tours');
            exit();
        } else {
            echo "Lỗi hệ thống: " . mysqli_error($conn);
        }
    } else {
        echo "Lỗi: Không tìm thấy tour.";
    }
}
?>
