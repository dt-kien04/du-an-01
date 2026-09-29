<?php
session_start();
include('./php/header.php');
include('./php/ket_noi.php');

$ma_ID_dat_cho = $_GET['id'];

$sql = "SELECT dat_cho.*, tours.ten_tour, tours.gia_tien FROM dat_cho 
            JOIN tours ON dat_cho.id_tour = tours.id 
            WHERE dat_cho.id = '$ma_ID_dat_cho'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['sua'])) {
    $ten_KH = $_POST['ten_KH'];
    $so_nguoi = $_POST['so_nguoi'];
    $ghi_chu = $_POST['ghi_chu'];

    $gia_goc = $row['gia_tien'];
    $tong_tien_moi = $gia_goc * $so_nguoi;

    $sql_update = "UPDATE dat_cho SET 
                       ten_KH='$ten_KH', 
                       so_nguoi='$so_nguoi', 
                       ghi_chu='$ghi_chu', 
                       tong_tien = '$tong_tien_moi' 
                       WHERE id='$ma_ID_dat_cho'";

    if (mysqli_query($conn, $sql_update)) {
        header("Location: ./index.php?pg=hien_thi_tours");
        exit();
    } else {
        echo "Sửa thất bại: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin đặt tour</title>
</head>

<body>
    <div class="booking-container">
        <h2>Chỉnh sửa đơn đặt</h2>
        <form action="" method="post">
            <div class="form-group">
                <label class="tt">Tên Tour (Không được sửa):</label>
                <input class="dien dien1" type="text" class="readonly" value="<?php echo $row['ten_tour']; ?>" readonly>
            </div>

            <div class="form-group">
                <label class="tt">Tên khách hàng:</label>
                <input class="dien" type="text" name="ten_KH" value="<?php echo $row['ten_KH']; ?>" required>
            </div>

            <div class="form-group">
                <label class="tt">Số người đi:</label>
                <input class="dien" type="number" name="so_nguoi" value="<?php echo $row['so_nguoi']; ?>" min="1" required>
            </div>

            <div class="form-group">
                <label class="tt">Ghi chú:</label>
                <textarea class="dien" name="ghi_chu" rows="3"><?php echo $row['ghi_chu']; ?></textarea>
            </div>
            <input class="mau_khung" type="submit" name="sua" value="Lưu thay đổi" class="btn-save">
            <a href="./index.php?pg=hien_thi_tours" style="display:block; text-align:center; margin-top:10px; color:#666;">Hủy bỏ</a>
        </form>
    </div>
</body>

</html>
<?php
// session_start();
include('php/footer.php');
?>