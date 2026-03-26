<?php
session_start();
// مسح بيانات السلة بعد إتمام الطلب
session_destroy(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Order Confirmed!</title>
</head>
<body class="text-center mt-5" style="background-color: #fcf8f5;">
    <div class="container">
        <h1 style="font-size: 100px;">🎉</h1>
        <h2 class="mt-3">Thank you for your order!</h2>
        <p class="text-muted">Your skincare products are on the way to you.</p>
        <a href="index.php" class="btn btn-dark mt-3">Back to Home</a>
    </div>
</body>
</html>