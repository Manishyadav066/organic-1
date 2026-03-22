<?php require_once 'includes/header.php'; ?>
<section class="py-5 mt-5">
  <div class="container-lg">
    <div class="row min-vh-50 align-items-center justify-content-center text-center">
      <div class="col-md-8 py-5 shadow-sm rounded-4 border bg-light">
        <!-- Reusing check icon from default header icons -->
        <svg width="120" height="120" class="text-success mb-4"><use xlink:href="#check"></use></svg>
        <h1 class="display-4 fw-bold text-dark">Order Confirmed!</h1>
        <p class="fs-4 text-muted mb-4 mt-3">Your order (ID: <strong>#<?php echo isset($_GET['order_id']) ? (int)$_GET['order_id'] : ''; ?></strong>) has been placed successfully.</p>
        <p class="text-secondary mb-5">We will deliver your items soon. Thank you for shopping with Desi Oil & Masala Store!</p>
        <a href="index.php" class="btn btn-primary btn-lg px-5 py-3 rounded-pill">Continue Shopping</a>
      </div>
    </div>
  </div>
</section>
<?php require_once 'includes/footer.php'; ?>
