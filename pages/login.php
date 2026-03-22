<?php 
require_once '../includes/header.php'; 

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error = 'Email and Password are required!';
    } else {
        $q = "SELECT * FROM users WHERE email = '$email'";
        $res = mysqli_query($conn, $q);
        
        if (mysqli_num_rows($res) > 0) {
            $user = mysqli_fetch_assoc($res);
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                
                // Redirect to homepage or shop
                echo "<script>window.location.href = '../index.php';</script>";
                exit;
            } else {
                $error = 'Invalid email or password.';
            }
        } else {
            $error = 'Invalid email or password.';
        }
    }
}
?>

<section class="py-5 bg-light" style="min-height: 80vh; display:flex; align-items:center;">
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-12 p-5 bg-white">
                            <div class="text-center mb-4">
                                <h2 class="fw-bolder mb-2 text-dark">Welcome Back</h2>
                                <p class="text-muted">Login to your Organic account</p>
                            </div>

                            <?php if($error): ?>
                                <div class="alert alert-danger rounded-3 fw-bold"><i class="fas fa-exclamation-circle me-2"></i><?php echo $error; ?></div>
                            <?php endif; ?>

                            <form action="pages/login.php" method="POST">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label text-secondary fw-bold small text-uppercase">Email Address</label>
                                        <input type="email" name="email" class="form-control form-control-lg bg-light border-0 px-4 py-3 rounded-3" placeholder="name@example.com" required>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label class="form-label text-secondary fw-bold small text-uppercase mb-0">Password</label>
                                            <a href="#" class="text-primary text-decoration-none small fw-bold">Forgot Password?</a>
                                        </div>
                                        <input type="password" name="password" class="form-control form-control-lg bg-light border-0 px-4 py-3 rounded-3 mt-2" required>
                                    </div>
                                    
                                    <div class="col-12 mt-4">
                                        <button type="submit" name="login" class="btn btn-success w-100 py-3 rounded-pill fw-bold text-uppercase shadow-sm fs-5">Login <i class="fas fa-sign-in-alt ms-2"></i></button>
                                    </div>
                                </div>
                            </form>

                            <div class="text-center mt-4 pt-3 border-top">
                                <p class="text-muted fw-semibold">Don't have an account? <a href="pages/register.php" class="text-primary text-decoration-none fw-bolder">Sign up free</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php require_once '../includes/footer.php'; ?>
