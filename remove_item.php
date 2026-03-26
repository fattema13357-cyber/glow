<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // حذف المنتج المعين من السلة
    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }
}

// الرجوع لصفحة السلة
header("Location: cart.php");
exit();
?>