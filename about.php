<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>About Us | Glow ✨</title>
    <style>
        body { background-color: #fcf8f5; }
        .about-section { background: white; padding: 60px; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); margin-top: 50px; }
        .navbar { background-color: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light py-3 sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">GLOW ✨</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link active fw-bold" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
            </ul>
            <div class="d-flex">
                <a href="cart.php" class="btn btn-dark position-relative">
                    Cart 🛒
                    <?php if(isset($_SESSION['cart']) && array_sum($_SESSION['cart']) > 0): ?>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?php echo array_sum($_SESSION['cart']); ?>
                    </span>
                    <?php endif; ?>
                </a>
            </div>
        </div>
    </div>
</nav>

<div class="container">
    <div class="about-section text-center">
        <h1 class="fw-bold mb-4">About GLOW ✨</h1>
        <p class="lead">We believe that everyone deserves to feel confident in their own skin. GLOW was founded in 2026 in Suez, Egypt, to provide high-quality, dermatologically tested skincare products.</p>
        <p>Our mission is to simplify your skincare routine with effective and affordable solutions.</p>
        <hr class="my-4" style="width: 50%; margin: auto;">
        <p class="text-muted small">This project is a technical demonstration for our E-commerce Website Task.</p>
        <a href="index.php" class="btn btn-dark mt-4">Back to Shop</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>