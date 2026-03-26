<?php
session_start();

// 1. التأكد إن الـ ID مبعوث فعلاً ومش فاضي
if (isset($_GET['id']) && !empty($_GET['id'])) {
    
    // 2. تحويل الـ ID لرقم صحيح (Integer) لزيادة الأمان ومنع الـ SQL Injection
    $id = intval($_GET['id']);

    // لو السلة مش موجودة نكريتها كـ Array
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // لو المنتج موجود نزود الكمية، لو مش موجود نضيفه بـ 1
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
}

// 3. نرجعه تاني للصفحة الرئيسية (index.php)
header("Location: index.php?added=1");
exit();
?>