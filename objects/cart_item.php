<?php
// A cart item object
class CartItem {

    // Database connection and table name
    private $conn;
    private $table_name = "cart_items";

    // Object properties
    public $id;
    public $product_id;
    public $quantity;
    public $user_id;
    public $created;
    public $modified;

    // Constructor
    public function __construct($db) {
        $this->conn = $db;
    }

    // Check if a cart item exists
    public function exists() {
        $query = "SELECT count(*) FROM " . $this->table_name . " WHERE product_id=:product_id AND user_id=:user_id";
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->product_id = htmlspecialchars(strip_tags($this->product_id));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));

        // Bind parameters
        $stmt->bindParam(":product_id", $this->product_id);
        $stmt->bindParam(":user_id", $this->user_id);

        // Execute query
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_NUM);

        return $rows[0] > 0;
    }

    // Count user's items in the cart
    public function count() {
        $query = "SELECT count(*) FROM " . $this->table_name . " WHERE user_id=:user_id";
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $stmt->bindParam(":user_id", $this->user_id);

        // Execute query
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_NUM);

        return $rows[0];
    }

    // Create cart item record
    public function create() {
        $this->created = date('Y-m-d H:i:s');

        $query = "INSERT INTO " . $this->table_name . "
                  SET product_id = :product_id, quantity = :quantity, user_id = :user_id, created = :created";
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->product_id = htmlspecialchars(strip_tags($this->product_id));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));

        // Bind values
        $stmt->bindParam(":product_id", $this->product_id);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":created", $this->created);

        // Execute query
        return $stmt->execute();
    }

    // Read items in the cart
    public function read() {
        $query = "SELECT p.id, p.name, p.price, ci.quantity, ci.quantity * p.price AS subtotal
                  FROM " . $this->table_name . " ci
                  LEFT JOIN products p ON ci.product_id = p.id
                  WHERE ci.user_id=:user_id";
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $stmt->bindParam(":user_id", $this->user_id, PDO::PARAM_INT);

        // Execute query
        $stmt->execute();
        return $stmt;
    }

    // Update cart item record
    public function update() {
        $query = "UPDATE " . $this->table_name . "
                  SET quantity=:quantity
                  WHERE product_id=:product_id AND user_id=:user_id";
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->product_id = htmlspecialchars(strip_tags($this->product_id));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));

        // Bind values
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":product_id", $this->product_id);
        $stmt->bindParam(":user_id", $this->user_id);

        // Execute query
        return $stmt->execute();
    }

    // Remove cart item by user and product
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE product_id=:product_id AND user_id=:user_id";
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->product_id = htmlspecialchars(strip_tags($this->product_id));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));

        // Bind ids
        $stmt->bindParam(":product_id", $this->product_id);
        $stmt->bindParam(":user_id", $this->user_id);

        return $stmt->execute();
    }

    // Remove cart items by user
    public function deleteByUser() {
        $query = "DELETE FROM " . $this->table_name . " WHERE user_id=:user_id";
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        $stmt->bindParam(":user_id", $this->user_id);

        return $stmt->execute();
    }
}
?>
