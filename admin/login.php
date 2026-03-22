<?php
require_once __DIR__.'/../config.php';

if(isset($_SESSION['admin_logged_in'])){
    header("Location: index.php");
    exit;
}

$error = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Setup predefined admin user for now
    if($email === 'admin@admin.com' && $password === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid credentials!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desi Store - Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); 
            min-height: 100vh; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
        }
        .login-card { 
            background: rgba(255, 255, 255, 0.95); 
            padding: 2.5rem; 
            border-radius: 16px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.2); 
            width: 100%; 
            max-width: 420px; 
        }
    </style>
    <script>
      const updateTheme = () => {
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
          document.documentElement.setAttribute('data-bs-theme', 'dark');
        } else {
          document.documentElement.setAttribute('data-bs-theme', 'light');
        }
      };
      updateTheme();
      window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', updateTheme);
    </script>
</head>
<body>
    <div class="login-card">
        <div class="text-center mb-4">
            <h2 class="text-primary fw-bold mb-1">Desi Admin</h2>
            <p class="text-muted">Sign in to manage your store</p>
        </div>
        
        <?php if($error) echo "<div class='alert alert-danger py-2 rounded-3 text-center'>$error</div>"; ?>
        
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label text-muted fw-bold small text-uppercase">Email Address</label>
                <input type="email" name="email" class="form-control px-3 py-2 bg-light border-0" value="admin@admin.com" required>
            </div>
            <div class="mb-5">
                <label class="form-label text-muted fw-bold small text-uppercase">Password</label>
                <input type="password" name="password" class="form-control px-3 py-2 bg-light border-0" value="admin123" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-pill shadow-sm">Login to Dashboard</button>
        </form>
    </div>
</body>
</html>
