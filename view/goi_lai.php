<?php
include('../php/ket_noi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sdt_KH = $_POST['sdt_KH'];

    $sql = "INSERT INTO yeu_cau_goi_lai (sdt_KH) 
            VALUES ('$sdt_KH')";

    if (mysqli_query($conn, $sql)) {
        echo "Yêu cầu thành công";
        exit();
    } else {
        echo "Lỗi hệ thống: " . mysqli_error($conn);
    }
}
