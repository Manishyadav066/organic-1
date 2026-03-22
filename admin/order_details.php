<?php 
require_once 'includes/header.php'; 

$order_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($order_id === 0) {
    echo "<div class='alert alert-danger'>Invalid Order ID.</div>";
    require_once 'includes/footer.php';
    exit;
}

// Handle Status Update
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['status'])){
    $new_status = mysqli_real_escape_string($conn, $_POST['status']);
    mysqli_query($conn, "UPDATE orders SET status = '$new_status' WHERE id = $order_id");
    echo "<script>window.location.href='order_details.php?id=$order_id';</script>";
    exit;
}

// Fetch order & user details
$order_query = mysqli_query($conn, "
    SELECT o.*, u.name as user_name, u.email as user_email 
    FROM orders o 
    JOIN users u ON o.user_id = u.id 
    WHERE o.id = $order_id
");

if (!$order_query || mysqli_num_rows($order_query) === 0) {
    echo "<div class='alert alert-warning'>Order not found!</div>";
    require_once 'includes/footer.php';
    exit;
}

$order = mysqli_fetch_assoc($order_query);

// Fetch order items
$items_query = mysqli_query($conn, "
    SELECT oi.*, p.name, p.image 
    FROM order_items oi 
    JOIN products p ON oi.product_id = p.id 
    WHERE oi.order_id = $order_id
");

$badge_class = 'bg-warning text-dark';
if(isset($order['status'])) {
    if($order['status'] == 'Approved') $badge_class = 'bg-info text-white';
    if($order['status'] == 'Delivered') $badge_class = 'bg-success text-white';
    if($order['status'] == 'Rejected') $badge_class = 'bg-danger text-white';
}
?>

<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <h3 class="fw-bold mb-0">Order Details <span class="text-primary">#<?php echo $order['id']; ?></span></h3>
        <a href="orders.php" class="btn btn-outline-secondary rounded-pill px-4"><i class="fas fa-arrow-left me-2"></i>Back to Orders</a>
    </div>
</div>

<div class="row g-4">
    <!-- Customer Info Card -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-0 py-3">
                <h6 class="mb-0 fw-bold text-uppercase" style="letter-spacing: 1px;"><i class="fas fa-user-circle text-primary me-2"></i>Customer Info</h6>
            </div>
            <div class="card-body bg-light rounded-bottom text-center">
                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($order['shipping_name'] ?? $order['user_name']); ?>&background=random&size=80" class="rounded-circle mb-3 border shadow-sm" alt="Customer">
                <h5 class="fw-bold text-dark mb-1"><?php echo htmlspecialchars($order['shipping_name'] ?? $order['user_name']); ?></h5>
                
                <hr class="my-3 opacity-25">
                
                <div class="text-start">
                    <h6 class="fw-bold mb-2 text-dark">Shipping Information</h6>
                    <p class="mb-1"><i class="fas fa-user text-secondary me-2"></i><?php echo htmlspecialchars($order['shipping_name'] ?? $order['user_name']); ?></p>
                    <p class="mb-1"><i class="fas fa-map-marker-alt text-secondary me-2"></i><?php echo nl2br(htmlspecialchars($order['shipping_address'] ?? 'No address provided.')); ?></p>
                    <p class="mb-0"><i class="fas fa-envelope text-secondary me-2"></i><?php echo htmlspecialchars($order['shipping_email'] ?? $order['user_email']); ?></p>
                </div>
                
                <hr class="my-3 opacity-25">
                
                <div class="text-start">
                    <p class="mb-1"><span class="text-muted fw-semibold d-inline-block" style="width: 80px;">Order Date:</span> <?php echo date('d M Y, h:i A', strtotime($order['created_at'])); ?></p>
                    <p class="mb-1"><span class="text-muted fw-semibold d-inline-block" style="width: 80px;">Status:</span> <span class="badge <?php echo $badge_class; ?> px-2"><?php echo htmlspecialchars($order['status'] ?? 'Pending'); ?></span></p>
                    <p class="mb-1"><span class="text-muted fw-semibold d-inline-block" style="width: 80px;">Method:</span> <?php echo htmlspecialchars($order['payment_method'] ?? 'COD'); ?></p>
                </div>
                
                <hr class="my-3 opacity-25">
                
                <form method="POST" action="" class="d-flex flex-wrap justify-content-center gap-2 mt-3">
                    <h6 class="w-100 fw-bold text-dark text-start mb-2">Update Status:</h6>
                    <button type="submit" name="status" value="Pending" class="btn btn-sm btn-outline-warning rounded-pill flex-grow-1">Pending</button>
                    <button type="submit" name="status" value="Approved" class="btn btn-sm btn-outline-info rounded-pill flex-grow-1">Approve</button>
                    <button type="submit" name="status" value="Delivered" class="btn btn-sm btn-outline-success rounded-pill flex-grow-1">Deliver</button>
                    <button type="submit" name="status" value="Rejected" class="btn btn-sm btn-outline-danger rounded-pill flex-grow-1">Reject</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Order Items Card -->
    <div class="col-md-8">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-0 py-3">
                <h6 class="mb-0 fw-bold text-uppercase" style="letter-spacing: 1px;"><i class="fas fa-shopping-bag text-success me-2"></i>Purchased Items</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="px-4 py-3 border-0">Product</th>
                                <th class="text-center py-3 border-0">Price</th>
                                <th class="text-center py-3 border-0">Qty</th>
                                <th class="text-end px-4 py-3 border-0">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($item = mysqli_fetch_assoc($items_query)): ?>
                            <tr>
                                <td class="px-4 py-3">
                                    <div class="d-flex align-items-center">
                                        <img src="../<?php echo htmlspecialchars($item['image']); ?>" width="50" height="50" class="rounded border object-fit-cover me-3" alt="">
                                        <span class="fw-semibold text-dark"><?php echo htmlspecialchars($item['name']); ?></span>
                                    </div>
                                </td>
                                <td class="text-center py-3 text-secondary">₹<?php echo number_format($item['price'], 2); ?></td>
                                <td class="text-center py-3">
                                    <span class="badge bg-secondary rounded-pill px-3"><?php echo $item['quantity']; ?></span>
                                </td>
                                <td class="text-end px-4 py-3 fw-bold text-dark">₹<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                        <tfoot class="bg-light border-top">
                            <tr>
                                <td colspan="3" class="text-end px-4 py-3 fw-bold text-uppercase text-secondary" style="letter-spacing: 1px;">Total Amount</td>
                                <td class="text-end px-4 py-3 fw-bold text-primary fs-5">₹<?php echo number_format($order['total_price'], 2); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
