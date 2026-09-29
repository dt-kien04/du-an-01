<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?pg=login");
    exit();
}

$user_id = $_SESSION['user_id'];
$sdt_KH = $_SESSION['number_phone'];

$sql = "SELECT dat_cho.*, users.username, users.sdt_KH, tours.ten_tour, tours.gia_tien_moi
        FROM dat_cho 
        JOIN tours ON dat_cho.id_tour = tours.id 
        JOIN users ON dat_cho.sdt_KH = users.sdt_KH 
        WHERE dat_cho.sdt_KH = '$sdt_KH' 
        ORDER BY dat_cho.id DESC";

$result = mysqli_query($conn, $sql);
?>

<div class="bang_thông_tin_dat_tour">
    <h2>Tour Bạn Đã Đặt</h2>

    <table class="bang_tour">
        <thead class="noi_dung1">
            <tr>
                <td>Tên Tour</td>
                <td>Tên khách hàng</td>
                <td>SĐT</td>
                <td>Giá tiền/người</td>
                <td>Số người</td>
                <td>Tổng tiền</td>
                <td>Ghi chú</td>
                <td>Trạng thái</td>
                <td>Sửa</td>
                <td>Xoá</td>
            </tr>
        </thead>
        <tbody class="noi_dung">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><strong><?php echo $row['ten_tour']; ?></strong></td>
                        <td><?php echo $row['ten_KH']; ?></td>
                        <td><?php echo $row['sdt_KH']; ?></td>
                        <td><?php echo number_format($row['gia_tien_moi'], 0, ',', '.'); ?></td>
                        <td><?php echo $row['so_nguoi']; ?></td>
                        <td>
                            <?php echo number_format($row['tong_tien'], 0, ',', '.'); ?> ₫
                        </td>
                        <td><?php echo $row['ghi_chu']; ?></td>
                        <td><?php echo $row['trang_thai']; ?></td>
                        <td>
                            <?php if ($row['trang_thai'] == 'Đang xử lý/Chưa thanh toán'): ?>
                                <a href="sua.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc muốn sửa?')">Sửa</a>
                            <?php else: ?>
                                <span style="color: #ccc;">Khóa</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($row['trang_thai'] == 'Đang xử lý/Chưa thanh toán'): ?>
                                <a href="view/xoa.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xoá</a>
                            <?php else: ?>
                                <span style="color: #ccc;">Khóa</span>
                            <?php endif; ?>
                        </td>

                        <!-- <td><a href="sua.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc muốn sửa?')">Sửa</a></td> -->
                        <!-- <td><a href="view/xoa.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xoá</a></td> -->
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td>Bạn chưa đặt tour nào. <a href="index.php?pg=tour">Khám phá ngay!</a></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>