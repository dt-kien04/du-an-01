<?php
session_start();
//kết nối CSDL
include('../php/ket_noi.php');

$ma_ID_dat_cho = $_GET['id'];
//Viet cau lenh truy van
$sql = "DELETE FROM dat_cho WHERE id = '$ma_ID_dat_cho'";

//Thuc hien truy van
$result = mysqli_query($conn, $sql);

//hienthiketqua
if ($result) {
    if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
        header("Location: ../admin.php?tab=bookings");
    } else {
        // Nếu là khách hàng tự xóa ở trang lịch sử
        header("Location: ../index.php?pg=hien_thi_tours");
    }
    exit();
} else {
    echo "xoa thong tin that bai";
}
?>