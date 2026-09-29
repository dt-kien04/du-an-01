<?php
session_start();
require_once 'php/ket_noi.php';

$isLoggedIn = isset($_SESSION['user_id']);
$username = $isLoggedIn ? $_SESSION['username'] : "";
if (isset($_GET['pg']) && $_GET['pg'] == 'logout') {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

include_once 'php/header.php';

if (isset($_GET['pg'])) {
    $page = $_GET['pg'];
    switch ($page) {
        case 'tour':
            // if(isset($_GET['detail'])){
            //     $detail = $_GET['detail'];
            //     switch($detail){
            //         case 'tour1':
            //             include_once 'view/tourchitiet.php';
            //             break;
            //         case 'tour2':
            //             include_once 'view/tour_HCM.php';
            //             break;
            //         case 'tour3':
            //             include_once 'view/tour_NhaTrang.php';
            //             break;
            //         case 'tour4':
            //             include_once 'view/tour_TayNguyen.php';
            //             break;
            //         default:
            //             include_once 'view/tour.php';
            //     }
            // } 
            if (isset($_GET['id'])) {
                // Chỉ cần 1 file xử lý cho tất cả các tour dựa trên ID
                include_once 'view/test_tour_chi_tiet.php';
            } else {
                include_once 'view/tour.php';
            }
            break;
        case 'gioithieu':
            include_once 'view/gioithieu.php';
            break;
        case 'lienhe':
            include_once 'view/lienhe.php';
            break;
        case 'DK_TK':
            include_once 'view/dang_ky_TK.php';
            break;
        case 'hien_thi_tours':
            include_once 'view/lich_su_dat_tour.php';
            break;
        case 'login':
            include_once 'view/login.php';
            break;
        default:
            include_once 'php/body.php';
    }
} else {
    include_once 'php/body.php';
}

// include_once 'php/body.php'; 
include_once 'php/footer.php';
?>