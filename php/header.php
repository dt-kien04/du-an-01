<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Travel</title>
    <!-- <base href="http://localhost/travel_test/"> -->
    <link rel="stylesheet" href="css/travel.css">
    <link rel="stylesheet" href="css/gioithieu.css">
    <link rel="stylesheet" href="css/tour.css">
    <link rel="stylesheet" href="css/tourchitiet.css">
    <link rel="stylesheet" href="css/lienhe.css">
    <link rel="stylesheet" href="css/dat_cho.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/bang_tour_da_dat.css">
    <link rel="shortcut icon" href="photo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=reviews">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
</head>

<body>
    <nav>
        <div class="container">
            <div class="nav__header">
                <div class="nav__logo">
                    <a href="#">
                        <img src="photo/logo.png" alt="logo">
                    </a>
                </div>
            </div>
            <ul class="menu">
                <li class="bar"><a href="index.php?pg=travel">Trang chủ</a></li>
                <li class="bar"><a href="index.php?pg=tour">Tour</a></li>
                <li class="bar"><a href="index.php?pg=gioithieu">Giới thiệu</a></li>
                <li class="bar"><a href="index.php?pg=lienhe">Liên hệ</a></li>

                <?php if (isset($_SESSION['username'])): ?>

                    <li class="user-item">
                        <a href="index.php?pg=hien_thi_tours" class="user-link">
                            <i class="fa fa-user-circle"></i>
                            <strong><?php echo $_SESSION['username']; ?></strong>
                        </a>
                        <ul class="submenu">
                            <li><a href="index.php?pg=logout">Thoát</a></li>
                        </ul>
                    </li>
                <?php else: ?>

                    <form action="index.php?pg=DK_TK" method="POST" style="display: inline;">
                        <button type="submit" class="btn_dang_ky">Đăng Ký</button>
                    </form>


                    <form action="index.php?pg=login" method="POST" style="display: inline;">
                        <button type="submit" class="btn">Đăng Nhập
                            <span><i class="fa fa-long-arrow-right"></i></span>
                        </button>
                    </form>
                <?php endif; ?>
            </ul>
        </div>
    </nav>