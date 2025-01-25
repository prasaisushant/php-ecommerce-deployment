<?php
// Start the session
session_start();

// Connect to database
include 'config/database.php';

// Include objects
include_once "objects/product.php";
include_once "objects/product_image.php";
include_once "objects/cart_item.php";

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Set page title
$page_title = "Products";

// Page header HTML
include 'layout_head.php';

// Initialize objects
$product = new Product($db);
$product_image = new ProductImage($db);
$cart_item = new CartItem($db);

// Prevent undefined index notice
$action = isset($_GET['action']) ? htmlspecialchars(strip_tags($_GET['action'])) : "";

// Pagination setup
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Cast to int for safety
$records_per_page = 6;
$from_record_num = ($records_per_page * $page) - $records_per_page;

// Read all products from the database
$stmt = $product->read($from_record_num, $records_per_page);
$num = $stmt->rowCount();

// If products retrieved are more than zero
if ($num > 0) {
    // Used for pagination
    $page_url = "products.php";
    $total_rows = $product->count();

    // Show the products
    include_once "read_products_template.php";
} else {
    echo "<div class='col-md-12'>";
    echo "<div class='alert alert-danger'>No products found.</div>";
    echo "</div>";
}

// Layout footer code
include 'layout_foot.php';
?>
