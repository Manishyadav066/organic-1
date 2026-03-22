<?php require_once 'includes/header.php'; ?>
<?php
// Handle Create
$success = ''; $error = '';
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_category'])){
    $name = trim(mysqli_real_escape_string($conn, $_POST['name']));
    $desc = trim(mysqli_real_escape_string($conn, $_POST['description']));
    
    if(!empty($name)){
        if(mysqli_query($conn, "INSERT INTO categories(name, description) VALUES('$name', '$desc')")){
            $success = "Category added successfully!";
        } else {
            $error = "Failed to add category.";
        }
    } else {
        $error = "Category name is required.";
    }
}

// Handle Delete
if(isset($_GET['delete'])){
    $id = (int)$_GET['delete'];
    
    // Check if products exist in category before deleting
    $check_products = mysqli_query($conn, "SELECT id FROM products WHERE category_id = $id");
    if(mysqli_num_rows($check_products) > 0){
        echo "<script>alert('Cannot delete category: Please remove or reassign the products in this category first.'); window.location.href='manage_categories.php';</script>";
        exit;
    } else {
        mysqli_query($conn, "DELETE FROM categories WHERE id = $id");
        echo "<script>window.location.href='manage_categories.php';</script>";
        exit;
    }
}

// Fetch Categories
$categories = mysqli_query($conn, "SELECT * FROM categories ORDER BY id DESC");
?>

<div class="row mb-4 align-items-center">
    <div class="col-md-12">
        <h3 class="fw-bold mb-0">Manage Categories</h3>
        <p class="text-muted mb-0">Organize your store catalog by adding and managing categories</p>
    </div>
</div>

<div class="row g-4">
    <!-- Add Category Form -->
    <div class="col-md-4">
        <div class="card p-4 shadow-sm border-0 h-100">
            <h5 class="fw-bold mb-4 d-flex align-items-center"><i class="fas fa-plus-circle text-primary me-2"></i>Add Category</h5>
            <?php if($success) echo "<div class='alert alert-success py-2 fw-semibold'>$success</div>"; ?>
            <?php if($error) echo "<div class='alert alert-danger py-2 fw-semibold'>$error</div>"; ?>
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary small text-uppercase">Category Name</label>
                    <input type="text" name="name" class="form-control bg-light border-0 px-3 py-2 fw-semibold text-dark" placeholder="e.g. Cooking Oils" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold text-secondary small text-uppercase">Description <span class="text-muted fw-normal">(Optional)</span></label>
                    <textarea name="description" class="form-control bg-light border-0 px-3 py-2" rows="4" placeholder="Brief details about this category..."></textarea>
                </div>
                <button type="submit" name="add_category" class="btn btn-primary w-100 rounded-pill py-2 fw-bold shadow-sm">Save Category</button>
            </form>
        </div>
    </div>

    <!-- Category List -->
    <div class="col-md-8">
        <div class="card p-0 shadow-sm border-0 h-100 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover table-custom align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3 px-4">ID</th>
                            <th scope="col" class="py-3 px-3">Category Name</th>
                            <th scope="col" class="py-3 px-3">Description</th>
                            <th scope="col" class="py-3 px-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        <?php if($categories && mysqli_num_rows($categories) > 0): ?>
                            <?php while($row = mysqli_fetch_assoc($categories)): ?>
                            <tr>
                                <td class="px-4 fw-bold text-secondary">#<?php echo $row['id']; ?></td>
                                <td class="px-3 fw-bold text-dark fs-6">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                            <i class="fas fa-tags"></i>
                                        </div>
                                        <?php echo htmlspecialchars($row['name']); ?>
                                    </div>
                                </td>
                                <td class="px-3 text-muted" style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    <?php echo htmlspecialchars($row['description'] ?? '-'); ?>
                                </td>
                                <td class="px-4 text-center">
                                    <a href="manage_categories.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-light text-danger rounded-circle border shadow-sm" title="Delete" style="width: 32px; height: 32px; line-height: 20px;" onclick="return confirm('Are you sure you want to delete this category? Make sure no products are inside it.');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted py-5">
                                    <div class="py-4">
                                        <i class="fas fa-tags fs-1 text-secondary opacity-50 mb-3 d-block"></i>
                                        <h6 class="fw-bold">No Categories Found</h6>
                                        <p class="small mb-0">Use the form on the left to add your first category.</p>
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
