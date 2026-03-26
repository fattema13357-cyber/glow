<?php
session_start();
// لو السلة فاضية، رجعه للمتجر
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Checkout | Glow ✨</title>
</head>
<body style="background-color: #fcf8f5;">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm p-4">
                <h3 class="text-center mb-4">Complete Your Order 🛍️</h3>
                <form action="confirm.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" placeholder="City, Street, Building" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" name="phone" class="form-control" placeholder="01xxxxxxxxx" required>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h5>Payment Method:</h5>
                        <p class="text-success fw-bold">Cash on Delivery 💵</p>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 mt-3">Confirm Order</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>