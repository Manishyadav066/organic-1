<?php require_once 'includes/header.php'; ?>
<?php
// Fetch all orders
$query = "SELECT o.*, u.name as user_name FROM orders o JOIN users u ON o.user_id = u.id ORDER BY o.id DESC";
$orders = mysqli_query($conn, $query);
?>

<div class="row mb-4 align-items-center">
    <div class="col-md-12">
        <h3 class="fw-bold mb-0">Manage Orders</h3>
        <p class="text-muted mb-0">View all customer orders and processing status</p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card p-0 shadow-sm border-0 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover table-custom align-middle mb-0 text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3 px-4">Order ID</th>
                            <th scope="col" class="py-3 px-3">Customer</th>
                            <th scope="col" class="py-3 px-3">Date</th>
                            <th scope="col" class="py-3 px-3">Total Amount</th>
                            <th scope="col" class="py-3 px-3">Status</th>
                            <th scope="col" class="py-3 px-4 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        <?php if($orders && mysqli_num_rows($orders) > 0): ?>
                            <?php while($row = mysqli_fetch_assoc($orders)): ?>
                            <?php 
                                $badge_class = 'bg-warning text-dark';
                                if(isset($row['status'])) {
                                    if($row['status'] == 'Approved') $badge_class = 'bg-info text-white';
                                    if($row['status'] == 'Delivered') $badge_class = 'bg-success text-white';
                                    if($row['status'] == 'Rejected') $badge_class = 'bg-danger text-white';
                                }
                            ?>
                            <tr>
                                <td class="px-4 fw-bold text-primary fs-6">#<?php echo $row['id']; ?></td>
                                <td class="px-3">
                                    <div class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($row['shipping_name'] ?? $row['user_name']); ?>&background=random" class="rounded-circle me-3 shadow-sm" width="38" height="38" alt="">
                                        <div>
                                            <span class="fw-bold text-dark d-block"><?php echo htmlspecialchars($row['shipping_name'] ?? $row['user_name']); ?></span>
                                            <span class="small text-muted"><?php echo htmlspecialchars($row['shipping_email'] ?? '-'); ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 text-secondary fw-semibold"><?php echo date('M j, Y h:i A', strtotime($row['created_at'])); ?></td>
                                <td class="px-3 fw-bold text-success fs-6">₹<?php echo number_format($row['total_price'], 2); ?></td>
                                <td class="px-3"><span class="badge <?php echo $badge_class; ?> px-3 py-2 rounded-pill fw-bold"><?php echo htmlspecialchars($row['status'] ?? 'Pending'); ?></span></td>
                                <td class="px-4 text-center">
                                    <a href="order_details.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary rounded-pill px-4 py-2 shadow-sm fw-bold"><i class="fas fa-eye me-2"></i>View</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-5 text-uppercase fw-semibold" style="letter-spacing: 1px;">
                                    <div class="py-4">
                                        <i class="fas fa-shopping-cart fs-1 mb-3 d-block text-secondary opacity-50"></i>
                                        <h5 class="fw-bold text-dark mb-1">No Orders Found</h5>
                                        <p class="text-muted text-transform-none mb-0 w-100" style="text-transform: none; letter-spacing: normal;">Sit tight, orders will appear here once customers start buying.</p>
                                    </div>
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
