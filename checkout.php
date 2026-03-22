<?php require_once 'includes/header.php'; ?>
<?php
// Ensure user is "logged in"
$user_id = $_SESSION['user_id'] ?? 1;

// Process Checkout
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $address = $_POST['address'] ?? '';
    $payment = isset($_POST['payment']) ? 'COD' : 'COD';

    $order_id = placeOrder($user_id, $name, $email, $address, $payment);
    if ($order_id) {
        // Redirect to thank you
        echo "<script>window.location.href='thank_you.php?order_id=$order_id';</script>";
        exit;
    } else {
        $error = "Failed to place order or cart is empty.";
    }
}

// Fetch Cart
$cart = mysqli_query($conn, "SELECT c.quantity, p.name, p.price FROM cart c JOIN products p ON c.product_id = p.id WHERE c.user_id=$user_id");
$total = 0;
?>
<section class="py-5 mt-5">
  <div class="container-lg">
    <div class="row">
      <div class="col-md-8">
        <h2 class="mb-4">Billing Details</h2>
        <?php if(isset($error)) echo '<div class="alert alert-danger">'.$error.'</div>'; ?>
        <form action="checkout.php" method="POST">
          <div class="mb-3">
            <label>Full Name</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="mb-3">
            <label>Email Address</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="mb-3">
            <label>Shipping Address</label>
            <textarea class="form-control" name="address" rows="3" required></textarea>
          </div>
          <h4 class="mt-4 mb-3">Payment Method</h4>
          <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="payment" id="cod" checked>
            <label class="form-check-label" for="cod">
              Cash on Delivery (COD)
            </label>
          </div>
          <button type="submit" class="btn btn-primary btn-lg mt-3">Place Order</button>
        </form>
      </div>

      <div class="col-md-4 mt-5 mt-md-0">
        <h4 class="mb-4">Your Order Summary</h4>
        <ul class="list-group mb-3 shadow-sm">
          <?php while($row = mysqli_fetch_assoc($cart)): 
                $subtotal = $row['quantity'] * $row['price'];
                $total += $subtotal;
          ?>
          <li class="list-group-item d-flex justify-content-between lh-sm p-3">
            <div>
              <h6 class="my-0"><?php echo htmlspecialchars($row['name']); ?></h6>
              <small class="text-body-secondary">Qty: <?php echo $row['quantity']; ?></small>
            </div>
            <span class="text-body-secondary text-end">₹<?php echo number_format($subtotal, 2); ?></span>
          </li>
          <?php endwhile; ?>
          <li class="list-group-item d-flex justify-content-between bg-light p-3">
            <span class="fw-bold fs-5">Total</span>
            <strong class="text-primary fs-5">₹<?php echo number_format($total, 2); ?></strong>
          </li>
        </ul>
      </div>

    </div>
  </div>
</section>
<?php require_once 'includes/footer.php'; ?>
