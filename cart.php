<?php
session_start();
require_once 'db.php';
require_once 'product.php'; // اتأكدي إن الحرف p صغير زي ما شفنا في الصورة

$productObj = new Product($conn);
$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Your Cart | Glow ✨</title>
</head>
<body style="background-color: #fcf8f5;">
<div class="container mt-5">
    <h2 class="mb-4">Shopping Cart 🛒</h2>
    <table class="table bg-white shadow-sm rounded">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                <?php foreach($_SESSION['cart'] as $id => $quantity): 
                    $product = $productObj->getProductById($id);
                    // لو المنتج موجود في الداتابيز فعلاً
                    if($product):
                        $subtotal = $product['price'] * $quantity;
                        $totalPrice += $subtotal;
                ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td>$<?php echo $product['price']; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td>$<?php echo $subtotal; ?></td>
                    <td><a href="remove_item.php?id=<?php echo $id; ?>" class="text-danger">Remove</a></td>
                </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4" class="text-center p-4">Your cart is empty! <a href="index.php">Go shopping</a></td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    
    <div class="text-end mt-4">
        <h4>Total: $<?php echo $totalPrice; ?></h4>
        <a href="index.php" class="btn btn-outline-secondary">Continue Shopping</a>
        <a href="checkout.php" class="btn btn-dark">Proceed to Checkout</a>
    </div>
</div>
</body>
</html>