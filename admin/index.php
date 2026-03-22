<?php require_once 'includes/header.php'; ?>
<?php
// Fetch metrics
$product_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM products"))['count'];
$category_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM categories"))['count'];
$order_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM orders"))['count'];
$revenue = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total_price) as total FROM orders"))['total'];

// Fetch recent orders
$recent_orders = mysqli_query($conn, "SELECT o.id, o.created_at, o.total_price, u.name as user_name FROM orders o JOIN users u ON o.user_id = u.id ORDER BY o.id DESC LIMIT 5");
?>
<div class="row g-4 mb-5">
    <div class="col-md-3">
        <div class="card metric-card metric-card-primary p-3 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted fw-bold mb-2 text-uppercase" style="font-size: 0.8rem; letter-spacing: 1px;">Total Products</h6>
                    <h3 class="fw-bold mb-0 text-dark"><?php echo $product_count; ?></h3>
                </div>
                <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                    <i class="fas fa-box-open fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card metric-card metric-card-success p-3 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted fw-bold mb-2 text-uppercase" style="font-size: 0.8rem; letter-spacing: 1px;">Total Categories</h6>
                    <h3 class="fw-bold mb-0 text-dark"><?php echo $category_count; ?></h3>
                </div>
                <div class="bg-success bg-opacity-10 p-3 rounded-circle text-success">
                    <i class="fas fa-tags fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card metric-card metric-card-warning p-3 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted fw-bold mb-2 text-uppercase" style="font-size: 0.8rem; letter-spacing: 1px;">Total Orders</h6>
                    <h3 class="fw-bold mb-0 text-dark"><?php echo $order_count; ?></h3>
                </div>
                <div class="bg-warning bg-opacity-10 p-3 rounded-circle text-warning">
                    <i class="fas fa-shopping-cart fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card metric-card metric-card-danger p-3 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted fw-bold mb-2 text-uppercase" style="font-size: 0.8rem; letter-spacing: 1px;">Total Revenue</h6>
                    <h3 class="fw-bold mb-0 text-dark">₹<?php echo number_format($revenue ?? 0, 2); ?></h3>
                </div>
                <div class="bg-danger bg-opacity-10 p-3 rounded-circle text-danger">
                    <i class="fas fa-chart-line fs-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card p-4 shadow-sm border-0">
            <h5 class="fw-bold mb-4">Recent Orders</h5>
            <div class="table-responsive">
                <table class="table table-hover table-custom align-middle">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3 px-3">Order ID</th>
                            <th scope="col" class="py-3 px-3">Customer</th>
                            <th scope="col" class="py-3 px-3">Date</th>
                            <th scope="col" class="py-3 px-3">Total Amount</th>
                            <th scope="col" class="py-3 px-3">Status</th>
                            <th scope="col" class="py-3 px-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($recent_orders && mysqli_num_rows($recent_orders) > 0): ?>
                            <?php while($order = mysqli_fetch_assoc($recent_orders)): ?>
                            <?php 
                                $badge_class = 'bg-warning text-dark';
                                if(isset($order['status'])) {
                                    if($order['status'] == 'Approved') $badge_class = 'bg-info text-white';
                                    if($order['status'] == 'Delivered') $badge_class = 'bg-success text-white';
                                    if($order['status'] == 'Rejected') $badge_class = 'bg-danger text-white';
                                }
                            ?>
                            <tr>
                                <td class="px-3"><span class="fw-bold text-primary">#<?php echo $order['id']; ?></span></td>
                                <td class="px-3">
                                    <div class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($order['user_name']); ?>&background=random" class="rounded-circle me-2" width="30" height="30" alt="">
                                        <span class="fw-semibold"><?php echo htmlspecialchars($order['user_name']); ?></span>
                                    </div>
                                </td>
                                <td class="px-3 text-secondary"><?php echo date('M j, Y h:i A', strtotime($order['created_at'])); ?></td>
                                <td class="px-3"><span class="fw-bold text-dark">₹<?php echo number_format($order['total_price'], 2); ?></span></td>
                                <td class="px-3"><span class="badge <?php echo $badge_class; ?> px-3 py-2 rounded-pill"><?php echo htmlspecialchars($order['status'] ?? 'Pending'); ?></span></td>
                                <td class="px-3">
                                    <a href="order_details.php?id=<?php echo $order['id']; ?>" class="btn btn-sm text-primary bg-primary bg-opacity-10 border-0 rounded-pill px-3 fw-semibold text-decoration-none">View Details</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-5 text-uppercase fw-semibold" style="letter-spacing: 2px;">
                                    <i class="fas fa-box-open fs-2 mb-3 d-block text-secondary"></i>No recent orders found.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>
