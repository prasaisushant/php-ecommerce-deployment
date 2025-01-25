<?php
 include_once "config/database.php";
 include_once "objects/cart_item.php"; // Include the CartItem class

// Create a new Database object and get a connection
$database = new Database();
$db = $database->getConnection();

$page_title = "Your Page Title"; // Set the page title for testing

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="products.php">
                <img src="logo.png" alt="Watchmen" style="height: 30px;">
            </a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php echo strpos($page_title, "Product") !== false ? "class='active'" : ""; ?>>
                    <a href="products.php">Products</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li <?php echo $page_title == "Cart" ? "class='active'" : ""; ?>>
                    <a href="cart.php">
                        <i class="fas fa-shopping-cart"></i>
                        <?php
                        // Count the products in the Cart
                        $cart_item = new CartItem($db);
                        $cart_item->user_id = 1; // Default to user with ID "1" for now
                        $cart_count = $cart_item->count();
                        ?>
                        Cart <span class="badge" id="comparison-count"><?php echo $cart_count ?></span>
                    </a>
                </li>
                <li>
                    <a href="index.html">
                        <i class="fas fa-sign-out-alt"></i>
                        LOGOUT
                    </a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<!-- /navbar -->
