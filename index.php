<?php 
// 1. لازم الـ Session تبدأ في أول سطر خالص قبل أي HTML
session_start(); 

require_once 'db.php';
require_once 'Product.php';

$productObj = new Product($conn);
$allProducts = $productObj->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glow Skincare Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #fcf8f5; }
        .card { border: none; border-radius: 15px; transition: 0.3s; overflow: hidden; }
        .card:hover { transform: translateY(-10px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .navbar { background-color: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .card-img-top { height: 250px; object-fit: cover; } /* لتوحيد حجم الصور */
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
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
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

<div class="container mt-4">
    <?php if(isset($_GET['added'])): ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <strong>Success!</strong> Product added to your cart successfully. ✨
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <h2 class="text-center my-5">Our Skincare Collection</h2>
    
    <div class="row">
        <?php while($row = $allProducts->fetch_assoc()): ?>
        <div class="col-md-4 mb-4">
            <div class="card p-3 h-100 text-center shadow-sm">
                <img src="images/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold"><?php echo $row['name']; ?></h5>
                    <p class="text-muted small"><?php echo $row['description']; ?></p>
                    <h6 class="fw-bold text-dark mt-auto">$<?php echo $row['price']; ?></h6>
                    <a href="add_to_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-dark w-100 mt-3">Add to Cart 🛒</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<footer class="bg-white py-4 mt-5 border-top">
    <div class="container text-center">
        <p class="mb-1 fw-bold">GLOW ✨ Skincare Store</p>
        <p class="text-muted small">© 2026 Made with Love in Suez, Egypt</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>