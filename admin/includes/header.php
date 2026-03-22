<?php 
require_once __DIR__.'/../../config.php'; 
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desi Store - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
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
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4"><i class="fa-solid fa-leaf text-warning me-2"></i>Desi Store Admin</div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent active"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="manage_products.php" class="list-group-item list-group-item-action bg-transparent"><i class="fas fa-box-open me-2"></i>Products</a>
                <a href="manage_categories.php" class="list-group-item list-group-item-action bg-transparent"><i class="fas fa-tags me-2"></i>Categories</a>
                <a href="orders.php" class="list-group-item list-group-item-action bg-transparent"><i class="fas fa-shopping-cart me-2"></i>Orders</a>
                <a href="users.php" class="list-group-item list-group-item-action bg-transparent"><i class="fas fa-users me-2"></i>Customers</a>
                <a href="../index.php" class="list-group-item list-group-item-action bg-transparent text-white pt-5 mt-5"><i class="fas fa-store me-2"></i>Visit Store</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle" style="cursor:pointer; color:#1e3c72;"></i>
                    <h2 class="fs-4 m-0 fw-bold">Overview</h2>
                </div>

                <div class="ms-auto d-flex align-items-center">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle text-dark fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name=Admin+User&background=0D8ABC&color=fff" class="rounded-circle me-2" width="35" height="35" alt="Admin">Admin User
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user-circle me-2 text-primary"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2 text-secondary"></i>Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid px-4 py-5">
