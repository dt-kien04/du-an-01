<?php
// session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
require_once 'php/ket_noi.php';

$error = "";
$success = "";

if (isset($_POST['btn_dang_ky'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $sdt  = $_POST['sdt_KH'];

    // Kiểm tra tên đăng nhập đã tồn tại chưa
    $check_stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR sdt_KH = ?");
    $check_stmt->bind_param("ss", $user, $sdt);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "Tên tài khoản hoặc số điện thoại đã tồn tại!";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, password, sdt_KH) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $user, $pass, $sdt);

        if ($stmt->execute()) {
            $success = "Đăng ký thành công! <a href='index.php?pg=login'>Đăng nhập ngay</a>";
        } else {
            $error = "Lỗi đăng ký, vui lòng thử lại!";
        }
    }
}
?>

<div class="login-container">
    <h2>Đăng Ký Thành Viên</h2>

    <?php if ($error) echo "<div style='color:red;'>$error</div>"; ?>
    <?php if ($success) echo "<div style='color:green;'>$success</div>"; ?>

    <form method="POST" action="">
        <input type="text" name="username" placeholder="Tên đăng nhập" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <input type="tel" name="sdt_KH" placeholder="Số điện thoại" required>
        <button type="submit" name="btn_dang_ky" class="btn-login">Đăng Ký</button>
    </form>
    <p><a href="index.php?pg=login">Đã có tài khoản? Đăng nhập</a></p>
</div>