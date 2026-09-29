<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
require_once 'php/ket_noi.php';

$error = "";

if (isset($_POST['btn_login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password, sdt_KH, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($pass == $row['password']) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $user;
            $_SESSION['number_phone'] = $row['sdt_KH'];
            $_SESSION['role'] = $row['role'];

            if ($_SESSION['role'] == 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            $error = "Mật khẩu không chính xác!";
        }
    } else {
        $error = "Tên tài khoản không tồn tại!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Đăng Nhập Hệ Thống</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com">
</head>

<body>

    <div class="login-container">
        <h2><i class="fa fa-user-circle"></i> Đăng Nhập</h2>

        <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>

        <form method="POST" action="">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit" name="btn_login" class="btn-login">
                Vào hệ thống <i class="fa fa-long-arrow-right"></i>
            </button>
        </form>
        <p><a href="index.php?pg=DK_TK">Chưa có tài khoản? Đăng ký ngay!</a></p>
    </div>

</body>

</html>