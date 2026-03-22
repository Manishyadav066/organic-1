<?php require_once 'includes/header.php'; ?>
<?php
$category_id = isset($_GET['category']) ? (int)$_GET['category'] : 0;
if ($category_id > 0) {
    $query = "SELECT * FROM products WHERE category_id = $category_id ORDER BY id DESC";
} else {
    $query = "SELECT * FROM products ORDER BY id DESC";
}
$result = mysqli_query($conn, $query);
?>
<section class="py-5 mt-5">
  <div class="container-lg">
    <div class="row">
      <div class="col-md-12">
        <h2 class="section-title mb-4"><?php echo $category_id > 0 ? "Category Products" : "All Products"; ?></h2>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-12">
        <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5">
            <?php
            if($result && mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col mb-4">
                      <div class="product-item">
                        <figure>
                          <a href="#" class="d-block w-100" style="height: 220px; overflow: hidden; display:flex; align-items:center; justify-content:center;" title="<?php echo htmlspecialchars($row['name']); ?>">
                            <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Product Thumbnail" class="w-100 h-100 object-fit-contain">
                          </a>
                        </figure>
                        <div class="d-flex flex-column text-center">
                          <h3 class="fs-6 fw-normal"><?php echo htmlspecialchars($row['name']); ?></h3>
                          <div>
                            <span class="rating">
                              <svg width="18" height="18" class="text-warning"><use xlink:href="#star-full"></use></svg>
                              <svg width="18" height="18" class="text-warning"><use xlink:href="#star-full"></use></svg>
                              <svg width="18" height="18" class="text-warning"><use xlink:href="#star-full"></use></svg>
                              <svg width="18" height="18" class="text-warning"><use xlink:href="#star-full"></use></svg>
                              <svg width="18" height="18" class="text-warning"><use xlink:href="#star-half"></use></svg>
                            </span>
                          </div>
                          <div class="d-flex justify-content-center align-items-center gap-2">
                            <span class="text-dark fw-semibold">₹<?php echo number_format($row['price'], 2); ?></span>
                          </div>
                          <div class="button-area p-3 pt-0">
                            <div class="row g-1 mt-2">
                              <div class="col-3"><input type="number" id="qty_<?php echo $row['id']; ?>" class="form-control border-dark-subtle input-number quantity" value="1"></div>
                              <div class="col-7"><a href="#" onclick="addToCart(<?php echo $row['id']; ?>); return false;" class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18"><use xlink:href="#cart"></use></svg> Add to Cart</a></div>
                              <div class="col-2"><a href="#" class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18"><use xlink:href="#heart"></use></svg></a></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No products found.</p>";
            }
            ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require_once 'includes/footer.php'; ?>
