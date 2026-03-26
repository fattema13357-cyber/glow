<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Contact Us | Glow ✨</title>
    <style>
        body { background-color: #fcf8f5; }
        .navbar { background-color: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .contact-container { margin-top: 50px; margin-bottom: 50px; }
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
                <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link active fw-bold" href="contact.php">Contact Us</a></li>
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

<div class="container contact-container">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-white p-5 rounded shadow-sm">
            <h2 class="text-center mb-4 text-dark">Contact Us 📧</h2>
            <p class="text-center text-muted mb-4">Have questions? We'd love to hear from you.</p>
            
            <form id="contactForm">
                <div class="mb-3">
                    <label class="form-label fw-bold">Your Name</label>
                    <input type="text" class="form-control" placeholder="Enter your full name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Email Address</label>
                    <input type="email" class="form-control" placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Message</label>
                    <textarea class="form-control" rows="4" placeholder="How can we help you?" required></textarea>
                </div>
                <button type="submit" class="btn btn-dark w-100 py-2">Send Message</button>
            </form>
        </div>
    </div>
</div>

<footer class="bg-white py-4 border-top">
    <div class="container text-center">
        <p class="mb-1 fw-bold text-dark">GLOW ✨ Skincare Store</p>
        <p class="text-muted small">© 2026 Made with Love in Suez, Egypt</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        // ميزة تفاعلية إضافية: تغيير نص الزرار لحظياً
        const btn = this.querySelector('button');
        btn.innerText = 'Sending...';
        btn.disabled = true;

        setTimeout(() => {
            alert('Thank you! Your message has been sent successfully. ✨');
            btn.innerText = 'Send Message';
            btn.disabled = false;
            this.reset();
        }, 1500);
    });
</script>

</body>
</html>