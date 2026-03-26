<?php
class Product {
    private $db;

    // دي أهم حتة: أول ما نكريت الأوبجكت بياخد الـ connection ويخزنه عنده
    public function __construct($conn) {
        $this->db = $conn;
    }

    // دالة بتجيب كل المنتجات (اللي استخدمناها في index.php)
    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        $result = $this->db->query($sql);
        return $result;
    }

    // الدالة اللي إنتِ لسه مصلحاها (شغالة تمام دلوقتي)
    public function getProductById($id) {
        $safe_id = mysqli_real_escape_string($this->db, $id);
        $sql = "SELECT * FROM products WHERE id = '$safe_id'";
        $result = $this->db->query($sql);
        
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }
}
?>