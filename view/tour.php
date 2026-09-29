<div class="book-tour">
    <h1 class="page-title">Danh Sách Tour</h1>
    <?php
    if (isset($_GET['diadiem']) && !empty($_GET['diadiem'])) {
        echo "Kết quả tìm kiếm cho: '" . htmlspecialchars($_GET['diadiem']) . "'";
    }
    ?>
    <div class="product-grid">
        <?php
        // 1. Truy vấn danh sách tour
        $sql = "SELECT * FROM tours WHERE 1=1";
        if (isset($_GET['diadiem']) && !empty(trim($_GET['diadiem']))) {
            $tukhoa = mysqli_real_escape_string($conn, $_GET['diadiem']);
            // Lọc theo tên tour hoặc điểm khởi hành
            $sql .= " AND (ten_tour LIKE '%$tukhoa%' OR lich_trinh LIKE '%$tukhoa%')";
        }

        $sql .= " ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);

        // 2. Vòng lặp hiển thị dữ liệu
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Kiểm tra xem có giảm giá không để hiện badge
                $has_discount = ($row['gia_tien'] > $row['gia_tien_moi']);
        ?>
                <div class="product-card">
                    <?php if ($has_discount): ?>
                        <div class="badge">Giảm giá!</div>
                    <?php endif; ?>

                    <div class="product-image">
                        <img src="photo/<?php echo $row['hinh_anh']; ?>" alt="<?php echo $row['ten_tour']; ?>">
                    </div>

                    <div class="product-info">
                        <h3 class="product-title"><?php echo $row['ten_tour']; ?></h3>
                        <p class="meta"><i class="fa fa-calendar"></i> <?php echo $row['thoi_gian_tour']; ?></p>
                        <p class="meta"><i class="fa fa-map-marker-alt"></i> <?php echo $row['diem_xuat_phat']; ?></p>

                        <div class="price-section">
                            <div class="price-group">
                                <?php if ($has_discount): ?>
                                    <span class="old-price"><?php echo number_format($row['gia_tien']); ?> ₫</span>
                                <?php endif; ?>
                                <span class="price"><?php echo number_format($row['gia_tien_moi']); ?> ₫</span>
                            </div>
                            <!-- Thay vì detail=tour1, tour2... ta dùng ID của tour đó -->
                            <a href="index.php?pg=tour&id=<?php echo $row['id']; ?>" class="view-detail">Xem Chi Tiết >></a>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p>Hiện chưa có tour nào.</p>";
        }
        ?>
    </div>
</div>