<?php require_once 'includes/header.php'; ?>
<?php
// Handle Delete
if(isset($_GET['delete'])){
    $id = (int)$_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    echo "<script>window.location.href='manage_products.php';</script>";
}

// Fetch Products from the database
$query = "SELECT p.*, c.name as category_name FROM products p LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.id DESC";
$products = mysqli_query($conn, $query);
?>

<div class="row mb-4 align-items-center">
    <div class="col-md-6">
        <h3 class="fw-bold mb-0">Manage Products</h3>
        <p class="text-muted mb-0">View, edit, or delete items from your store catalog</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="add_product.php" class="btn btn-primary rounded-pill px-4 shadow-sm py-2"><i class="fas fa-plus me-2"></i>Add New Product</a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card p-0 shadow-sm border-0 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover table-custom align-middle mb-0 text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3 px-4">ID</th>
                            <th scope="col" class="py-3 px-3">Image</th>
                            <th scope="col" class="py-3 px-3">Product Name</th>
                            <th scope="col" class="py-3 px-3">Category</th>
                            <th scope="col" class="py-3 px-3">Price</th>
                            <th scope="col" class="py-3 px-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        <?php if($products && mysqli_num_rows($products) > 0): ?>
                            <?php while($row = mysqli_fetch_assoc($products)): ?>
                            <tr>
                                <td class="px-4 fw-bold text-secondary">#<?php echo $row['id']; ?></td>
                                <td class="px-3 py-2">
                                    <img src="../<?php echo htmlspecialchars($row['image']); ?>" width="45" height="45" class="rounded-circle border object-fit-cover shadow-sm bg-white" alt="product">
                                </td>
                                <td class="px-3 fw-bold text-dark fs-6"><?php echo htmlspecialchars($row['name']); ?></td>
                                <td class="px-3">
                                    <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold"><?php echo htmlspecialchars($row['category_name'] ?? 'Uncategorized'); ?></span>
                                </td>
                                <td class="px-3 fw-bold text-success fs-6">₹<?php echo number_format($row['price'], 2); ?></td>
                                <td class="px-4 text-center">
                                    <!-- Edit Button (To be implemented later) -->
                                    <a href="#" class="btn btn-sm btn-light text-primary rounded-circle border shadow-sm me-2" title="Edit" style="width: 32px; height: 32px; line-height: 20px;"><i class="fas fa-pen"></i></a>
                                    <!-- Delete Button -->
                                    <a href="manage_products.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-light text-danger rounded-circle border shadow-sm" title="Delete" style="width: 32px; height: 32px; line-height: 20px;" onclick="return confirm('Are you sure you want to delete this product?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-5">
                                    <div class="py-5">
                                        <i class="fas fa-box-open fs-1 text-secondary opacity-50 mb-3 d-block"></i>
                                        <h5 class="fw-bold">No Products Found</h5>
                                        <p>You haven't added any products to your store yet.</p>
                                        <a href="add_product.php" class="btn btn-outline-primary mt-2">Add Your First Product</a>
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
