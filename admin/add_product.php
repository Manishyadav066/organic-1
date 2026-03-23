<?php require_once 'includes/header.php'; ?>
<?php
$error = '';
$success = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $category_id = (int)$_POST['category_id'];
    $price = (float)$_POST['price'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $stock = (int)$_POST['stock'];
    
    // Handle image upload
    $image_path = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = '../uploads/products/';
        
        // Create directory if it doesn't exist
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $file_extension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        
        if (in_array($file_extension, $allowed_extensions)) {
            $new_filename = uniqid('prod_') . '.' . $file_extension;
            $destination = $upload_dir . $new_filename;
            
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {
                // Store relative path in database
                $image_path = 'uploads/products/' . $new_filename;
            } else {
                $error = "Failed to upload image.";
            }
        } else {
            $error = "Only JPG, JPEG, PNG, GIF, and WEBP files are allowed.";
        }
    }
    
    // Insert into database if there are no errors
    if (empty($error)) {
        if (empty($name) || empty($price) || empty($category_id)) {
            $error = "Product name, category, and price are required.";
        } else {
            $query = "INSERT INTO products (name, category_id, price, description, image, stock) 
                      VALUES ('$name', $category_id, $price, '$description', '$image_path', $stock)";
            
            if (mysqli_query($conn, $query)) {
                $success = "Product added successfully!";
            } else {
                $error = "Database error: " . mysqli_error($conn);
            }
        }
    }
}

// Fetch categories for dropdown
$categories_query = "SELECT id, name FROM categories ORDER BY name ASC";
$categories_result = mysqli_query($conn, $categories_query);

// Auto-insert default categories if empty (For user convenience)
if ($categories_result && mysqli_num_rows($categories_result) == 0) {
    mysqli_query($conn, "INSERT INTO categories (name) VALUES ('Oils (Tel)'), ('Spices (Masala)'), ('Flour (Aata)')");
    // Fetch again after inserting
    $categories_result = mysqli_query($conn, $categories_query);
}
?>

<div class="row mb-4 align-items-center">
    <div class="col-md-6">
        <h3 class="fw-bold mb-0">Add New Product</h3>
        <p class="text-muted mb-0">Create a new product to show in your store</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <a href="manage_products.php" class="btn btn-light border shadow-sm px-4 py-2"><i class="fas fa-arrow-left me-2"></i>Back to Products</a>
    </div>
</div>

<div class="row">
    <div class="col-xl-8 col-lg-10">
        <div class="card p-0 shadow-sm border-0">
            <div class="card-body p-4 p-md-5">
                
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i><?php echo $error; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($success)): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i><?php echo $success; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form action="add_product.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold">Product Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name" required placeholder="e.g. Fresh Organic Apples">
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="category_id" class="form-label fw-bold">Category <span class="text-danger">*</span></label>
                            <select class="form-select form-control-lg" id="category_id" name="category_id" required>
                                <option value="" disabled selected>Select a category</option>
                                <?php if($categories_result && mysqli_num_rows($categories_result) > 0): ?>
                                    <?php while($cat = mysqli_fetch_assoc($categories_result)): ?>
                                        <option value="<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['name']); ?></option>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <option value="" disabled>No categories found - Please add one first</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mt-4 mt-md-0">
                            <label for="price" class="form-label fw-bold">Price (₹) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control form-control-lg" id="price" name="price" required placeholder="0.00">
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="stock" class="form-label fw-bold">Stock Quantity</label>
                            <input type="number" class="form-control form-control-lg" id="stock" name="stock" value="0" min="0">
                        </div>
                        <div class="col-md-6 mt-4 mt-md-0">
                            <label for="image" class="form-label fw-bold">Product Image</label>
                            <input type="file" class="form-control form-control-lg" id="image" name="image" accept="image/*">
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="form-label fw-bold">Product Description</label>
                        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Write a detailed description of the product..."></textarea>
                    </div>
                    
                    <div class="d-grid mt-5">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm"><i class="fas fa-save me-2"></i>Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
