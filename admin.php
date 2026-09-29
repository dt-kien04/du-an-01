<?php
session_start();
require_once 'php/ket_noi.php';

// 1. Bảo vệ trang Admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

// 2. Xử lý xóa nhanh tour (nếu cần)
if (isset($_GET['del_id'])) {
    $id_xoa = (int)$_GET['del_id'];
    mysqli_query($conn, "DELETE FROM tours WHERE id = $id_xoa");
    header("Location: admin.php?tab=tours");
    exit();
}

// 3. Xử lý cập nhật trạng thái đơn hàng
if (isset($_GET['trang_thai_xu_ly']) && isset($_GET['booking_id'])) {
    $trang_thai_xu_ly = mysqli_real_escape_string($conn, $_GET['trang_thai_xu_ly']);
    $booking_id = (int)$_GET['booking_id'];
    mysqli_query($conn, "UPDATE dat_cho SET trang_thai = '$trang_thai_xu_ly' WHERE id = $booking_id");
    header("Location: admin.php?tab=bookings");
    exit();
}


$tab = $_GET['tab'] ?? 'tours';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Hệ thống Quản trị - Web Travel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>

    <div class="admin-layout">

        <div class="sidebar">
            <h2>Web Travel</h2>
            <ul>
                <li class="<?php echo $tab == 'tours' ? 'active' : ''; ?>">
                    <a href="admin.php?tab=tours"><i class="fa fa- suitcase"></i> Quản lý Tours</a>
                </li>
                <li class="<?php echo $tab == 'bookings' ? 'active' : ''; ?>">
                    <a href="admin.php?tab=bookings"><i class="fa fa-list-alt"></i> Quản lý Đơn hàng</a>
                </li>
                <li><a href="index.php"><i class="fa fa-home"></i> Xem website</a></li>
                <li><a href="index.php?pg=logout"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
            </ul>
        </div>

        <div class="main-content">
            <?php if ($tab == 'tours'): ?>
                <div class="header-content">
                    <h1>Danh sách Tour</h1>
                    <a href="them_tour.php" class="btn-add"><i class="fa fa-plus"></i> Thêm Tour mới</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên Tour</th>
                            <th>Giá Gốc</th>
                            <th>Giá Mới</th>
                            <th>Thời gian</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tours ORDER BY id DESC";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)):
                        ?>
                            <tr>
                                <td><img src="photo/<?php echo $row['hinh_anh']; ?>" class="img-admin"></td>
                                <td><strong><?php echo $row['ten_tour']; ?></strong></td>
                                <td><?php echo number_format($row['gia_tien']); ?>đ</td>
                                <td><?php echo number_format($row['gia_tien_moi']); ?>đ</td>
                                <td><?php echo $row['thoi_gian_tour']; ?></td>
                                <td>
                                    <a href="sua_tour.php?id=<?php echo $row['id']; ?>" class="btn-edit">Sửa</a>
                                    <a href="admin.php?del_id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Xóa tour này?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

            <?php elseif ($tab == 'bookings'): ?>
                <h1>Danh sách Đơn hàng (Booking)</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Khách hàng</th>
                            <th>SĐT</th>
                            <th>Tên Tour</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Duyệt nhanh</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT dat_cho.*, tours.ten_tour FROM dat_cho 
                                JOIN tours ON dat_cho.id_tour = tours.id 
                                ORDER BY dat_cho.id DESC";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)):
                        ?>
                            <tr>
                                <td><?php echo $row['ten_KH']; ?></td>
                                <td><?php echo $row['sdt_KH']; ?></td>
                                <td><?php echo $row['ten_tour']; ?></td>
                                <td><strong><?php echo number_format($row['tong_tien']); ?>đ</strong></td>

                                <?php
                                $trang_thai_xu_ly = $row['trang_thai'];
                                $trang_thai_xu_lyClass = 'trang_thai_xu_ly-dang_xu_ly';

                                if ($trang_thai_xu_ly == 'Đã xác nhận/Đã thanh toán') {
                                    $trang_thai_xu_lyClass = 'trang_thai_xu_ly-xac_nhan';
                                } elseif ($trang_thai_xu_ly == 'Đã hủy') {
                                    $trang_thai_xu_lyClass = 'trang_thai_xu_ly-huy';
                                }
                                ?>
                                <td class="trang_thai_xu_ly <?php echo $trang_thai_xu_lyClass; ?>">
                                    <?php echo $trang_thai_xu_ly; ?>
                                </td>

                                <td class="btn_dieuhuong">
                                    <a href="admin.php?tab=bookings&trang_thai_xu_ly=Đã xác nhận/Đã thanh toán&booking_id=<?php echo $row['id']; ?>">
                                        Duyệt
                                    </a>

                                    <a href="admin.php?tab=bookings&trang_thai_xu_ly=Đã hủy&booking_id=<?php echo $row['id']; ?>">
                                        Hủy đơn
                                    </a>
                                </td>
                                <td>
                                    <a href="view/xoa.php?id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Xóa đơn này khỏi hệ thống?')">Xóa đơn</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php endif; ?>

        </div>
    </div>

</body>

</html>