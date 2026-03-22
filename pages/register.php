<?php 
require_once '../includes/header.php'; 

// Registration Logic
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $address = mysqli_real_escape_string($conn, trim($_POST['address']));

    if (empty($name) || empty($email) || empty($password)) {
        $error = 'Name, Email, and Password are required!';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match!';
    } else {
        // Check if email exists
        $check_q = "SELECT id FROM users WHERE email = '$email'";
        $check_res = mysqli_query($conn, $check_q);
        if (mysqli_num_rows($check_res) > 0) {
            $error = 'Email is already registered!';
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $q = "INSERT INTO users (name, email, password, phone, address) VALUES ('$name', '$email', '$hashed', '$phone', '$address')";
            if (mysqli_query($conn, $q)) {
                $success = 'Registration successful! You can now <a href="pages/login.php" class="fw-bold text-success">Login here</a>.';
            } else {
                $error = 'Something went wrong. Please try again.';
            }
        }
    }
}
?>

<section class="py-5 bg-light" style="min-height: 80vh; display:flex; align-items:center;">
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-12 p-5 p-md-5 bg-white">
                            <div class="text-center mb-4">
                                <h2 class="fw-bolder mb-2 text-dark">Create an Account</h2>
                                <p class="text-muted">Join the Organic family today!</p>
                            </div>

                            <?php if($error): ?>
                                <div class="alert alert-danger rounded-3 fw-bold"><i class="fas fa-exclamation-circle me-2"></i><?php echo $error; ?></div>
                            <?php endif; ?>
                            <?php if($success): ?>
                                <div class="alert alert-success rounded-3 fw-bold"><i class="fas fa-check-circle me-2"></i><?php echo $success; ?></div>
                            <?php endif; ?>

                            <form action="pages/register.php" method="POST">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label text-secondary fw-bold small text-uppercase">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control form-control-lg bg-light border-0 px-4 py-3 rounded-3" placeholder="John Doe" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label text-secondary fw-bold small text-uppercase">Email Address <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control form-control-lg bg-light border-0 px-4 py-3 rounded-3" placeholder="name@example.com" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-secondary fw-bold small text-uppercase">Password <span class="text-danger">*</span></label>
                                        <input type="password" name="password" class="form-control form-control-lg bg-light border-0 px-4 py-3 rounded-3" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-secondary fw-bold small text-uppercase">Confirm Password <span class="text-danger">*</span></label>
                                        <input type="password" name="confirm_password" class="form-control form-control-lg bg-light border-0 px-4 py-3 rounded-3" required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label text-secondary fw-bold small text-uppercase">Phone Number</label>
                                        <input type="text" name="phone" class="form-control form-control-lg bg-light border-0 px-4 py-3 rounded-3" placeholder="+91 XXXXX XXXXX">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label text-secondary fw-bold small text-uppercase">Delivery Address</label>
                                        <textarea name="address" class="form-control bg-light border-0 px-4 py-3 rounded-3" rows="2" placeholder="Full street address..."></textarea>
                                    </div>
                                    
                                    <div class="col-12 mt-4">
                                        <button type="submit" name="register" class="btn btn-success w-100 py-3 rounded-pill fw-bold text-uppercase shadow-sm fs-5">Sign Up Now <i class="fas fa-arrow-right ms-2"></i></button>
                                    </div>
                                </div>
                            </form>

                            <div class="text-center mt-4 pt-3 border-top">
                                <p class="text-muted fw-semibold">Already have an account? <a href="pages/login.php" class="text-primary text-decoration-none fw-bolder">Login here</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>
