<?php require_once 'includes/header.php'; ?>
    
    <style>
      .bg-image-scale { transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94); }
      .zoom-on-hover:hover .bg-image-scale { transform: scale(1.05); }
      .btn-hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
      .btn-hover-lift:hover { transform: translateY(-4px); box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important; }
      .text-shadow-sm { text-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    </style>

    <section class="position-relative overflow-hidden pt-5" style="background-image: url('images/banner-1.jpg');background-repeat: no-repeat;background-size: cover; background-position: center left; min-height: 85vh; display: flex; align-items: center;">
      <!-- Gradient Overlay -->
      <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(90deg, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.8) 40%, rgba(255,255,255,0) 100%);"></div>
      <div class="container-lg position-relative z-1 pt-5">
        <div class="row pt-4">
          <div class="col-lg-7 py-5">
            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill mb-4 fw-bold shadow-sm d-inline-flex align-items-center gap-2" style="letter-spacing: 1px;"><i class="fas fa-leaf text-success"></i> 100% ORGANIC & NATURAL</span>
            <h1 class="display-3 fw-bolder lh-sm mb-4 text-dark" style="letter-spacing: -1.5px;">
                <span class="text-success">Organic</span> Foods at your <br/>
                <span class="text-primary position-relative text-shadow-sm">Doorsteps
                   <svg class="position-absolute w-100 text-warning" style="bottom:-12px; left:0; height:18px;" viewBox="0 0 200 9" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.00055 6.99979C47.8043 1.93121 127.351 -2.71576 198.001 6.99979" stroke="currentColor" stroke-width="3" stroke-linecap="round"/></svg>
                </span>
            </h1>
            <p class="fs-5 text-secondary mb-5 pe-xl-5 fw-medium lh-lg">Discover the freshest, healthiest organic products handpicked from local farms. Eat healthy, live better everyday.</p>
            <div class="d-flex gap-3 flex-wrap">
              <a href="shop.php" class="btn btn-success text-white text-uppercase fs-6 fw-bold rounded-pill px-5 py-3 shadow-lg btn-hover-lift d-flex align-items-center gap-2">Start Shopping <i class="fas fa-shopping-cart"></i></a>
              <a href="pages/register.php" class="btn btn-outline-dark text-uppercase fs-6 fw-bold rounded-pill px-5 py-3 shadow-hover btn-hover-lift bg-white d-flex align-items-center gap-2">Join Now <i class="fas fa-user-plus"></i></a>
            </div>
            
            <div class="row my-5 pt-4">
              <div class="col">
                <div class="d-flex align-items-center gap-2 gap-md-3">
                  <div class="bg-success bg-opacity-10 p-2 p-md-3 rounded-circle text-success shadow-sm">
                      <i class="fas fa-box-open fs-5 fs-md-4"></i>
                  </div>
                  <div>
                      <h4 class="fw-bolder mb-0 lh-1 text-dark fs-5 fs-md-4">14k+</h4>
                      <span class="text-muted small fw-bold text-uppercase d-block mt-1" style="font-size: 0.7rem; letter-spacing:0.5px">Products</span>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="d-flex align-items-center gap-2 gap-md-3">
                  <div class="bg-primary bg-opacity-10 p-2 p-md-3 rounded-circle text-primary shadow-sm">
                      <i class="fas fa-users fs-5 fs-md-4"></i>
                  </div>
                  <div>
                      <h4 class="fw-bolder mb-0 lh-1 text-dark fs-5 fs-md-4">50k+</h4>
                      <span class="text-muted small fw-bold text-uppercase d-block mt-1" style="font-size: 0.7rem; letter-spacing:0.5px">Customers</span>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="d-flex align-items-center gap-2 gap-md-3">
                  <div class="bg-warning bg-opacity-10 p-2 p-md-3 rounded-circle text-warning shadow-sm">
                      <i class="fas fa-store fs-5 fs-md-4"></i>
                  </div>
                  <div>
                      <h4 class="fw-bolder mb-0 lh-1 text-dark fs-5 fs-md-4">10+</h4>
                      <span class="text-muted small fw-bold text-uppercase d-block mt-1" style="font-size: 0.7rem; letter-spacing:0.5px">Stores</span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    
    <!-- Floating Info Cards -->
    <div class="container-lg position-relative z-2" style="margin-top: -60px; margin-bottom: 2rem;">
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center px-3 px-md-0">
          <div class="col">
            <div class="card border-0 bg-white rounded-4 p-4 shadow-lg h-100 btn-hover-lift">
              <div class="d-flex align-items-center gap-3 gap-md-4">
                <div class="bg-success p-3 rounded-circle text-white shadow-sm flex-shrink-0">
                  <svg width="32" height="32"><use xlink:href="#fresh"></use></svg>
                </div>
                <div>
                  <h5 class="fw-bold mb-1 text-dark">Fresh from farm</h5>
                  <p class="card-text text-muted small mb-0 lh-sm">Directly sourced daily</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card border-0 bg-white rounded-4 p-4 shadow-lg h-100 btn-hover-lift">
              <div class="d-flex align-items-center gap-3 gap-md-4">
                <div class="bg-warning p-3 rounded-circle text-dark shadow-sm flex-shrink-0">
                  <svg width="32" height="32"><use xlink:href="#organic"></use></svg>
                </div>
                <div>
                  <h5 class="fw-bold mb-1 text-dark">100% Organic</h5>
                  <p class="card-text text-muted small mb-0 lh-sm">Certified natural quality</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card border-0 bg-white rounded-4 p-4 shadow-lg h-100 btn-hover-lift">
              <div class="d-flex align-items-center gap-3 gap-md-4">
                <div class="bg-primary p-3 rounded-circle text-white shadow-sm flex-shrink-0">
                  <svg width="32" height="32"><use xlink:href="#delivery"></use></svg>
                </div>
                <div>
                  <h5 class="fw-bold mb-1 text-dark">Free delivery</h5>
                  <p class="card-text text-muted small mb-0 lh-sm">On orders over ₹500</p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <section class="py-5 overflow-hidden">
      <div class="container-lg">
        <div class="row">
          <div class="col-md-12">

            <div class="section-header d-flex flex-wrap justify-content-between mb-5">
              <h2 class="section-title">Category</h2>

              <div class="d-flex align-items-center">
                <a href="#" class="btn btn-primary me-2">View All</a>
                <div class="swiper-buttons">
                  <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                  <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">

            <div class="category-carousel swiper">
              <div class="swiper-wrapper">
                
<?php
$cat_query = mysqli_query($conn, "SELECT * FROM categories ORDER BY id ASC");
if ($cat_query && mysqli_num_rows($cat_query) > 0) {
    $cat_images = ["category-thumb-1.jpg", "category-thumb-2.jpg", "category-thumb-3.jpg", "category-thumb-4.jpg", "category-thumb-5.jpg", "category-thumb-6.jpg", "category-thumb-7.jpg", "category-thumb-8.jpg"];
    $i = 0;
    while ($cat_row = mysqli_fetch_assoc($cat_query)) {
        $cat_img = $cat_images[$i % count($cat_images)];
        ?>
        <a href="shop.php?category=<?php echo $cat_row['id']; ?>" class="nav-link swiper-slide text-center">
          <img src="images/<?php echo $cat_img; ?>" class="rounded-circle" alt="Category Thumbnail">
          <h4 class="fs-6 mt-3 fw-normal category-title"><?php echo htmlspecialchars($cat_row['name']); ?></h4>
        </a>
        <?php
        $i++;
    }
}
?>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="pb-2">
      <div class="container-lg">

        <div class="row">
          <div class="col-md-12">

            <div class="section-header d-flex flex-wrap justify-content-between my-4">
              
              <h2 class="section-title">Best selling products</h2>

              <div class="d-flex align-items-center">
                <a href="#" class="btn btn-primary rounded-1">View All</a>
              </div>
            </div>
            
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-12">

            <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5">
                  
<?php
$query = "SELECT * FROM products ORDER BY id DESC LIMIT 20";
$result = mysqli_query($conn, $query);
if($result && mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col mb-4">
          <div class="product-item bg-white border border-light-subtle rounded-4 p-3 h-100 shadow-hover position-relative overflow-hidden">
            <!-- Dynamic Badge -->
            <span class="badge bg-danger position-absolute top-0 start-0 m-3 z-3 shadow-sm px-2 py-1 fs-7">SALE</span>
            <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-2 z-3 shadow-sm text-muted" style="width:35px;height:35px;line-height:20px;"><i class="fas fa-heart"></i></button>

            <figure class="mb-3 position-relative overflow-hidden rounded-3" style="height: 220px; background: transparent; display:flex; align-items:center; justify-content:center;">
              <a href="shop.php" title="<?php echo htmlspecialchars($row['name']); ?>">
                <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Product Thumbnail" class="img-fluid w-100 h-100 object-fit-contain zoom-on-hover">
              </a>
            </figure>
            
            <div class="d-flex flex-column h-100 text-start">
              <a href="shop.php" class="text-decoration-none text-dark">
                  <h3 class="fs-5 fw-bold mb-1 text-truncate" title="<?php echo htmlspecialchars($row['name']); ?>"><?php echo htmlspecialchars($row['name']); ?></h3>
              </a>
              
              <div class="d-flex align-items-center mb-2">
                <span class="text-warning small me-2">
                  <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                </span>
                <span class="text-muted small fw-semibold">(4.2)</span>
              </div>
              
              <div class="mt-auto pt-3 border-top border-light-subtle">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                      <span class="text-dark fw-bolder fs-4">₹<?php echo number_format($row['price'], 2); ?></span>
                      <del class="text-muted small">₹<?php echo number_format($row['price'] * 1.15, 2); ?></del>
                  </div>
                  
                  <div class="row g-2 align-items-center">
                    <div class="col-4">
                      <input type="number" id="qty_<?php echo $row['id']; ?>" class="form-control form-control-sm text-center bg-light border-0 fw-bold shadow-none py-2" value="1" min="1">
                    </div>
                    <div class="col-8">
                      <button onclick="addToCart(<?php echo $row['id']; ?>); return false;" class="btn btn-primary btn-sm w-100 rounded-3 fw-bold shadow-sm d-flex justify-content-center align-items-center gap-2 py-2">
                         <i class="fas fa-shopping-basket"></i> Add
                      </button>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <?php
    }
} else {
    echo "<div class='col-12 py-5 text-center'><p class='text-muted fs-5'>No products available right now.</p></div>";
}
?>

              
            </div>
            <!-- / product-grid -->


          </div>
        </div>
      </div>
    </section>

    <section class="py-3 bg-light my-3">
      <div class="container-lg">
        <div class="row">
          <div class="col-md-12">

             <div class="row g-4 pt-3 pb-4">
                
                <div class="col-lg-6">
                    <div class="card border-0 rounded-4 overflow-hidden position-relative shadow-lg h-100 zoom-on-hover d-flex align-items-start justify-content-center p-5 text-white" style="min-height:300px;">
                        <img src="images/banner-ad-1.jpg" class="position-absolute w-100 h-100 top-0 start-0 z-0 bg-image-scale" style="object-fit: cover;" alt="Promo">
                        <div class="position-absolute w-100 h-100 top-0 start-0 z-1" style="background: linear-gradient(90deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.2) 100%);"></div>
                        <div class="position-relative z-2">
                            <span class="badge bg-danger px-3 py-2 rounded-pill fw-bold mb-3 shadow">Limited Time</span>
                            <h2 class="display-5 fw-bolder mb-2 text-white">Items on <span class="text-warning">SALE</span></h2>
                            <p class="fs-5 mb-4 text-white-50 fw-semibold">Discounts up to 30% on fresh items</p>
                            <a href="shop.php" class="btn btn-warning fw-bold rounded-pill px-4 py-2 shadow-sm btn-hover-lift shadow-sm">Shop Collection <i class="fas fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row g-4 h-100">
                        <div class="col-12 h-50">
                            <div class="card border-0 rounded-4 overflow-hidden position-relative shadow h-100 zoom-on-hover d-flex align-items-start justify-content-center p-4 p-md-5 text-white">
                                <img src="images/banner-ad-2.jpg" class="position-absolute w-100 h-100 top-0 start-0 z-0 bg-image-scale" style="object-fit: cover;" alt="Promo">
                                <div class="position-absolute w-100 h-100 top-0 start-0 z-1" style="background: linear-gradient(90deg, rgba(34,139,34,0.85) 0%, rgba(34,139,34,0.3) 100%);"></div>
                                <div class="position-relative z-2">
                                    <h3 class="fw-bolder mb-1 text-white">Combo offers</h3>
                                    <p class="mb-3 text-white-50 fw-bold">Discounts up to 50%</p>
                                    <a href="shop.php" class="btn btn-light fw-bold rounded-pill px-4 shadow-sm btn-hover-lift btn-sm">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 h-50">
                            <div class="card border-0 rounded-4 overflow-hidden position-relative shadow h-100 zoom-on-hover d-flex align-items-start justify-content-center p-4 p-md-5 text-dark">
                                <img src="images/banner-ad-3.jpg" class="position-absolute w-100 h-100 top-0 start-0 z-0 bg-image-scale" style="object-fit: cover;" alt="Promo">
                                <div class="position-absolute w-100 h-100 top-0 start-0 z-1" style="background: linear-gradient(90deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.3) 100%);"></div>
                                <div class="position-relative z-2">
                                    <h3 class="fw-bolder mb-1 text-dark">Discount Coupons</h3>
                                    <p class="mb-3 text-muted fw-bold">Discounts up to 40%</p>
                                    <a href="shop.php" class="btn btn-dark fw-bold rounded-pill px-4 shadow-sm btn-hover-lift btn-sm">Claim Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

             </div>
              
          </div>
        </div>
      </div>
    </section>

    <section id="featured-products" class="products-carousel">
      <div class="container-lg overflow-hidden py-3">
        <div class="row">
          <div class="col-md-12">

            <div class="section-header d-flex flex-wrap justify-content-between my-4">
              
              <h2 class="section-title">Featured products</h2>

              <div class="d-flex align-items-center">
                <a href="#" class="btn btn-primary me-2">View All</a>
                <div class="swiper-buttons">
                  <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
                  <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
                </div>  
              </div>
            </div>
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">

            <div class="swiper">
              <div class="swiper-wrapper">
                                
<?php
$featured_query = mysqli_query($conn, "SELECT * FROM products ORDER BY id ASC LIMIT 6");
if($featured_query && mysqli_num_rows($featured_query) > 0) {
    while($f_row = mysqli_fetch_assoc($featured_query)) {
        ?>
        <div class="product-item swiper-slide bg-white border border-light-subtle rounded-4 p-3 shadow-hover position-relative overflow-hidden">
            <!-- Dynamic Badge -->
            <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-3 z-3 shadow-sm px-2 py-1 fs-7">Top Rated</span>
            <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-2 z-3 shadow-sm text-muted" style="width:35px;height:35px;line-height:20px;"><i class="fas fa-heart"></i></button>

            <figure class="mb-3 position-relative overflow-hidden rounded-3" style="height: 220px; background: transparent; display:flex; align-items:center; justify-content:center;">
              <a href="shop.php" title="<?php echo htmlspecialchars($f_row['name']); ?>">
                <img src="<?php echo htmlspecialchars($f_row['image']); ?>" alt="Product Thumbnail" class="img-fluid w-100 h-100 object-fit-contain zoom-on-hover">
              </a>
            </figure>
            
            <div class="d-flex flex-column h-100 text-start">
              <a href="shop.php" class="text-decoration-none text-dark">
                  <h3 class="fs-5 fw-bold mb-1 text-truncate" title="<?php echo htmlspecialchars($f_row['name']); ?>"><?php echo htmlspecialchars($f_row['name']); ?></h3>
              </a>
              
              <div class="d-flex align-items-center mb-2">
                <span class="text-warning small me-2">
                  <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </span>
                <span class="text-muted small fw-semibold">(5.0)</span>
              </div>
              
              <div class="mt-auto pt-3 border-top border-light-subtle">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                      <span class="text-dark fw-bolder fs-4">₹<?php echo number_format($f_row['price'], 2); ?></span>
                  </div>
                  
                  <div class="row g-2 align-items-center">
                    <div class="col-4">
                      <input type="number" id="qty_<?php echo $f_row['id']; ?>" class="form-control form-control-sm text-center bg-light border-0 fw-bold shadow-none py-2" value="1" min="1">
                    </div>
                    <div class="col-8">
                      <button onclick="addToCart(<?php echo $f_row['id']; ?>); return false;" class="btn btn-primary btn-sm w-100 rounded-3 fw-bold shadow-sm d-flex justify-content-center align-items-center gap-2 py-2">
                         <i class="fas fa-shopping-basket"></i> Add
                      </button>
                    </div>
                  </div>
              </div>
            </div>
        </div>
        <?php
    }
}
?>
              </div>
            </div>
            <!-- / products-carousel -->

          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container-lg">

        <div class="bg-secondary text-light py-4 my-3" style="background: url('images/banner-newsletter.jpg') no-repeat; background-size: cover;">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-5 p-3">
                <div class="section-header">
                  <h2 class="section-title display-5 text-light">Get 25% Discount on your first purchase</h2>
                </div>
                <p>Just Sign Up & Register it now to become member.</p>
              </div>
              <div class="col-md-5 p-3">
                <form>
                  <div class="mb-3">
                    <label for="name" class="form-label d-none">Name</label>
                    <input type="text"
                      class="form-control form-control-md rounded-0" name="name" id="name" placeholder="Name">
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label d-none">Email</label>
                    <input type="email" class="form-control form-control-md rounded-0" name="email" id="email" placeholder="Email Address">
                  </div>
                  <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-dark btn-md rounded-0">Submit</button>
                  </div>
                </form>
                
              </div>
              
            </div>
            
          </div>
        </div>
        
      </div>
    </section>

    <section id="popular-products" class="products-carousel">
      <div class="container-lg overflow-hidden py-3">
        <div class="row">
          <div class="col-md-12">

            <div class="section-header d-flex justify-content-between my-4">
              
              <h2 class="section-title">Most popular products</h2>

              <div class="d-flex align-items-center">
                <a href="#" class="btn btn-primary me-2">View All</a>
                <div class="swiper-buttons">
                  <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
                  <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">

            <div class="swiper">
              <div class="swiper-wrapper">
                                
                <?php
$popular_query = mysqli_query($conn, "SELECT * FROM products ORDER BY price DESC LIMIT 6");
if($popular_query && mysqli_num_rows($popular_query) > 0) {
    while($p_row = mysqli_fetch_assoc($popular_query)) {
        ?>
        <div class="product-item swiper-slide bg-white border border-light-subtle rounded-4 p-3 shadow-hover position-relative overflow-hidden">
            <span class="badge bg-primary position-absolute top-0 start-0 m-3 z-3 shadow-sm px-2 py-1 fs-7">Popular</span>
            <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-2 z-3 shadow-sm text-muted" style="width:35px;height:35px;line-height:20px;"><i class="fas fa-heart"></i></button>
            <figure class="mb-3 position-relative overflow-hidden rounded-3" style="height: 220px; background: transparent; display:flex; align-items:center; justify-content:center;">
              <a href="shop.php" title="<?php echo htmlspecialchars($p_row['name']); ?>">
                <img src="<?php echo htmlspecialchars($p_row['image']); ?>" alt="Product Thumbnail" class="img-fluid w-100 h-100 object-fit-contain zoom-on-hover">
              </a>
            </figure>
            <div class="d-flex flex-column h-100 text-start">
              <a href="shop.php" class="text-decoration-none text-dark">
                  <h3 class="fs-5 fw-bold mb-1 text-truncate" title="<?php echo htmlspecialchars($p_row['name']); ?>"><?php echo htmlspecialchars($p_row['name']); ?></h3>
              </a>
              <div class="d-flex align-items-center mb-2">
                <span class="text-warning small me-2">
                  <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                </span>
                <span class="text-muted small fw-semibold">(4.8)</span>
              </div>
              <div class="mt-auto pt-3 border-top border-light-subtle">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                      <span class="text-dark fw-bolder fs-4">₹<?php echo number_format($p_row['price'], 2); ?></span>
                  </div>
                  <div class="row g-2 align-items-center">
                    <div class="col-4">
                      <input type="number" id="qty_<?php echo $p_row['id']; ?>" class="form-control form-control-sm text-center bg-light border-0 fw-bold shadow-none py-2" value="1" min="1">
                    </div>
                    <div class="col-8">
                      <button onclick="addToCart(<?php echo $p_row['id']; ?>); return false;" class="btn btn-primary btn-sm w-100 rounded-3 fw-bold shadow-sm d-flex justify-content-center align-items-center gap-2 py-2">
                         <i class="fas fa-shopping-basket"></i> Add
                      </button>
                    </div>
                  </div>
              </div>
            </div>
        </div>
        <?php
    }
}
?>
              </div>
            </div>
            <!-- / products-carousel -->

          </div>
        </div>
      </div>
    </section>

    <section id="latest-products" class="products-carousel">
      <div class="container-lg overflow-hidden pb-5">
        <div class="row">
          <div class="col-md-12">

            <div class="section-header d-flex justify-content-between my-4">
              
              <h2 class="section-title">Just arrived</h2>

              <div class="d-flex align-items-center">
                <a href="#" class="btn btn-primary me-2">View All</a>
                <div class="swiper-buttons">
                  <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
                  <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
                </div>  
              </div>
            </div>
            
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">

            <div class="swiper">
              <div class="swiper-wrapper">
                
<?php
$latest_query = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC LIMIT 6");
if($latest_query && mysqli_num_rows($latest_query) > 0) {
    while($l_row = mysqli_fetch_assoc($latest_query)) {
        ?>
        <div class="product-item swiper-slide bg-white border border-light-subtle rounded-4 p-3 shadow-hover position-relative overflow-hidden">
            <span class="badge bg-success position-absolute top-0 start-0 m-3 z-3 shadow-sm px-2 py-1 fs-7">New</span>
            <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-2 z-3 shadow-sm text-muted" style="width:35px;height:35px;line-height:20px;"><i class="fas fa-heart"></i></button>
            <figure class="mb-3 position-relative overflow-hidden rounded-3" style="height: 220px; background: transparent; display:flex; align-items:center; justify-content:center;">
              <a href="shop.php" title="<?php echo htmlspecialchars($l_row['name']); ?>">
                <img src="<?php echo htmlspecialchars($l_row['image']); ?>" alt="Product Thumbnail" class="img-fluid w-100 h-100 object-fit-contain zoom-on-hover">
              </a>
            </figure>
            <div class="d-flex flex-column h-100 text-start">
              <a href="shop.php" class="text-decoration-none text-dark">
                  <h3 class="fs-5 fw-bold mb-1 text-truncate" title="<?php echo htmlspecialchars($l_row['name']); ?>"><?php echo htmlspecialchars($l_row['name']); ?></h3>
              </a>
              <div class="d-flex align-items-center mb-2">
                <span class="text-warning small me-2">
                  <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                </span>
                <span class="text-muted small fw-semibold">(4.5)</span>
              </div>
              <div class="mt-auto pt-3 border-top border-light-subtle">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                      <span class="text-dark fw-bolder fs-4">₹<?php echo number_format($l_row['price'], 2); ?></span>
                  </div>
                  <div class="row g-2 align-items-center">
                    <div class="col-4">
                      <input type="number" id="qty_<?php echo $l_row['id']; ?>" class="form-control form-control-sm text-center bg-light border-0 fw-bold shadow-none py-2" value="1" min="1">
                    </div>
                    <div class="col-8">
                      <button onclick="addToCart(<?php echo $l_row['id']; ?>); return false;" class="btn btn-primary btn-sm w-100 rounded-3 fw-bold shadow-sm d-flex justify-content-center align-items-center gap-2 py-2">
                         <i class="fas fa-shopping-basket"></i> Add
                      </button>
                    </div>
                  </div>
              </div>
            </div>
        </div>
        <?php
    }
}
?>
                  
              </div>
            </div>
            <!-- / products-carousel -->

          </div>
        </div>
      </div>
    </section>

    <section id="latest-blog" class="pb-4">
      <div class="container-lg">
        <div class="row">
          <div class="section-header d-flex align-items-center justify-content-between my-4">
            <h2 class="section-title">Our Recent Blog</h2>
            <a href="#" class="btn btn-primary">View All</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <article class="post-item card border-0 shadow-sm p-3">
              <div class="image-holder zoom-effect">
                <a href="#">
                  <img src="images/post-thumbnail-1.jpg" alt="post" class="card-img-top">
                </a>
              </div>
              <div class="card-body">
                <div class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                  <div class="meta-date"><svg width="16" height="16"><use xlink:href="#calendar"></use></svg>22 Aug 2021</div>
                  <div class="meta-categories"><svg width="16" height="16"><use xlink:href="#category"></use></svg>tips & tricks</div>
                </div>
                <div class="post-header">
                  <h3 class="post-title">
                    <a href="#" class="text-decoration-none">Top 10 casual look ideas to dress up your kids</a>
                  </h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipi elit. Aliquet eleifend viverra enim tincidunt donec quam. A in arcu, hendrerit neque dolor morbi...</p>
                </div>
              </div>
            </article>
          </div>
          <div class="col-md-4">
            <article class="post-item card border-0 shadow-sm p-3">
              <div class="image-holder zoom-effect">
                <a href="#">
                  <img src="images/post-thumbnail-2.jpg" alt="post" class="card-img-top">
                </a>
              </div>
              <div class="card-body">
                <div class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                  <div class="meta-date"><svg width="16" height="16"><use xlink:href="#calendar"></use></svg>25 Aug 2021</div>
                  <div class="meta-categories"><svg width="16" height="16"><use xlink:href="#category"></use></svg>trending</div>
                </div>
                <div class="post-header">
                  <h3 class="post-title">
                    <a href="#" class="text-decoration-none">Latest trends of wearing street wears supremely</a>
                  </h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipi elit. Aliquet eleifend viverra enim tincidunt donec quam. A in arcu, hendrerit neque dolor morbi...</p>
                </div>
              </div>
            </article>
          </div>
          <div class="col-md-4">
            <article class="post-item card border-0 shadow-sm p-3">
              <div class="image-holder zoom-effect">
                <a href="#">
                  <img src="images/post-thumbnail-3.jpg" alt="post" class="card-img-top">
                </a>
              </div>
              <div class="card-body">
                <div class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                  <div class="meta-date"><svg width="16" height="16"><use xlink:href="#calendar"></use></svg>28 Aug 2021</div>
                  <div class="meta-categories"><svg width="16" height="16"><use xlink:href="#category"></use></svg>inspiration</div>
                </div>
                <div class="post-header">
                  <h3 class="post-title">
                    <a href="#" class="text-decoration-none">10 Different Types of comfortable clothes ideas for women</a>
                  </h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipi elit. Aliquet eleifend viverra enim tincidunt donec quam. A in arcu, hendrerit neque dolor morbi...</p>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>

    <section class="pb-4 my-4">
      <div class="container-lg">

        <div class="bg-warning pt-5 rounded-5">
          <div class="container">
            <div class="row justify-content-center align-items-center">
              <div class="col-md-4">
                <h2 class="mt-5">Download Organic App</h2>
                <p>Online Orders made easy, fast and reliable</p>
                <div class="d-flex gap-2 flex-wrap mb-5">
                  <a href="#" title="App store"><img src="images/img-app-store.png" alt="app-store"></a>
                  <a href="#" title="Google Play"><img src="images/img-google-play.png" alt="google-play"></a>
                </div>
              </div>
              <div class="col-md-5">
                <img src="images/banner-onlineapp.png" alt="phone" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </section>

    <section class="py-4">
      <div class="container-lg">
        <h2 class="my-4">People are also looking for</h2>
        <?php
        $cat_query = mysqli_query($conn, "SELECT name FROM categories LIMIT 12");
        if($cat_query && mysqli_num_rows($cat_query) > 0) {
            while($c = mysqli_fetch_assoc($cat_query)){
                echo '<a href="shop.php" class="btn btn-warning me-2 mb-2 px-3 rounded-pill fw-semibold shadow-sm">'.htmlspecialchars($c['name']).'</a>';
            }
        } else {
            $tags = ['Organic Fruits', 'Vegan', 'Fresh Veggies', 'Healthy Snacks', 'Dairy Free', 'Gluten Free'];
            foreach($tags as $tag) {
                echo '<a href="shop.php" class="btn btn-warning me-2 mb-2 px-3 rounded-pill fw-semibold shadow-sm">'.$tag.'</a>';
            }
        }
        ?>
      </div>
    </section>

    <section class="py-5">
      <div class="container-lg">
        <div class="row row-cols-1 row-cols-sm-3 row-cols-lg-5">
          <div class="col">
            <div class="card mb-3 border border-dark-subtle p-3">
              <div class="text-dark mb-3">
                <svg width="32" height="32"><use xlink:href="#package"></use></svg>
              </div>
              <div class="card-body p-0">
                <h5>Free delivery</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-3 border border-dark-subtle p-3">
              <div class="text-dark mb-3">
                <svg width="32" height="32"><use xlink:href="#secure"></use></svg>
              </div>
              <div class="card-body p-0">
                <h5>100% secure payment</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-3 border border-dark-subtle p-3">
              <div class="text-dark mb-3">
                <svg width="32" height="32"><use xlink:href="#quality"></use></svg>
              </div>
              <div class="card-body p-0">
                <h5>Quality guarantee</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-3 border border-dark-subtle p-3">
              <div class="text-dark mb-3">
                <svg width="32" height="32"><use xlink:href="#savings"></use></svg>
              </div>
              <div class="card-body p-0">
                <h5>guaranteed savings</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-3 border border-dark-subtle p-3">
              <div class="text-dark mb-3">
                <svg width="32" height="32"><use xlink:href="#offers"></use></svg>
              </div>
              <div class="card-body p-0">
                <h5>Daily offers</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php require_once 'includes/footer.php'; ?>
