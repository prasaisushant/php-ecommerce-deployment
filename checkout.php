<?php
  // connect to database
  include 'config/database.php';

  // include objects
  include_once "objects/product.php";
  include_once "objects/product_image.php";
  include_once "objects/cart_item.php";

  // get database connection
  $database = new Database();
  $db = $database->getConnection();

  // initialize objects
  $product = new Product($db);
  $product_image = new ProductImage($db);
  $cart_item = new CartItem($db);

  // set page title
  $page_title = "Checkout";

  // include page header html
  include 'layout_head.php';

  // $cart_count variable is initialized in navigation.php
  if ($cart_count > 0) {

    $cart_item->user_id = 1;
    $stmt = $cart_item->read();

    $total = 0;
    $item_count = 0;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $sub_total = $price * $quantity;

      echo "<div class='cart-row'>";
      echo "<div class='col-md-8'>";
      echo "<div class='product-name m-b-10px'><h4>{$name}</h4></div>";
      echo $quantity > 1 ? "<div>{$quantity} items</div>" : "<div>{$quantity} item</div>";
      echo "</div>";
      echo "<div class='col-md-4'>";
      echo "<h4>Rs. " . number_format($price, 2, '.', ',') . "</h4>";
      echo "</div>";
      echo "</div>";

      $item_count += $quantity;
      $total += $sub_total;
    }

    echo "<div class='col-md-12 text-align-center'>";
    echo "<div class='cart-row'>";
    if ($item_count > 1) {
      echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
    } else {
      echo "<h4 class='m-b-10px'>Total ({$item_count} item)</h4>";
    }
    echo "<h4> Rs.  " . number_format($total, 2, '.', ',') . "</h4>";

    // Payment options with JavaScript to toggle content
    echo "<div class='payment-options' style='margin-top: 20px; padding: 10px; border: 1px solid #ddd; border-radius: 5px;'>";
    echo "<h4>Choose Payment Method:</h4>";
    echo "<div style='margin-bottom: 10px;'>";
    echo "<label style='display: block; margin-bottom: 10px;'><input type='radio' name='payment_method' value='online_payment' onclick='togglePaymentOptions()'> Online Payment</label>";
    echo "<label style='display: block;'><input type='radio' name='payment_method' value='cash_on_delivery' onclick='togglePaymentOptions()'> Cash on Delivery</label>";
    echo "</div>";
    echo "<div id='onlinePayment' style='display: none;'>";
    echo "<img src='pay.jpg' alt='Online Payment Image' style='max-width: 100%;'>";
    echo "<a href='place_order.php?method=online_payment' class='btn btn-lg btn-success m-b-10px'>Place Order (Online Payment)</a>";
    echo "</div>";
    echo "<div id='cashOnDelivery' style='display: none;'>";
    echo "<h4>Enter your address and phone number:</h4>";
    echo "<form>";
    echo "<label>Address:</label><br>";
    echo "<input type='text' name='address' placeholder='Enter your address' required><br><br>";
    echo "<label>Phone Number:</label><br>";
    echo "<input type='text' name='phone' placeholder='Enter your phone number' required><br><br>";
    echo "<a href='place_order.php?method=online_payment' class='btn btn-lg btn-success m-b-10px'>";
    echo "<button type='submit' class='btn btn-lg btn-success m-b-10px'>Place Order (Cash on Delivery)</button>";
    echo "</a>";
    echo "</form>";
    echo "</div>";
    echo "</div>";

    echo "</div>";

  } else {
    echo "<div class='col-md-12'>";
    echo "<div class='alert alert-danger'>";
    echo "No products found in your cart!";
    echo "</div>";
    echo "</div>";
  }

  include 'layout_foot.php';
?>
<script>
  function togglePaymentOptions() {
    var onlinePayment = document.getElementById('onlinePayment');
    var cashOnDelivery = document.getElementById('cashOnDelivery');
    var onlinePaymentRadio = document.querySelector('input[name="payment_method"][value="online_payment"]');
    var cashOnDeliveryRadio = document.querySelector('input[name="payment_method"][value="cash_on_delivery"]');

    if (onlinePaymentRadio.checked) {
      onlinePayment.style.display = 'block';
      cashOnDelivery.style.display = 'none';
    } else if (cashOnDeliveryRadio.checked) {
      onlinePayment.style.display = 'none';
      cashOnDelivery.style.display = 'block';
    }
  }
</script>
