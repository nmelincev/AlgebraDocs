
<?php
class Product {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllProducts() {
        $stmt = $this->db->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $quantity, $price) {
        $stmt = $this->db->prepare("INSERT INTO products (name, quantity, price, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())");
        return $stmt->execute([$name, $quantity, $price]);
    }

    public function editProduct($id, $name, $quantity, $price) {
        $stmt = $this->db->prepare("UPDATE products SET name = ?, quantity = ?, price = ?, updated_at = NOW() WHERE id = ?");
        return $stmt->execute([$name, $quantity, $price, $id]);
    }

    public function deleteProduct($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getProductById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
