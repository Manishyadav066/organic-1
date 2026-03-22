<?php require_once 'includes/header.php'; ?>
<?php
// Handle Delete
if(isset($_GET['delete'])){
    $id = (int)$_GET['delete'];
    // Prevent deleting the main admin user (assuming ID 1 is important)
    if($id !== 1) {
        mysqli_query($conn, "DELETE FROM users WHERE id = $id");
        echo "<script>window.location.href='users.php';</script>";
        exit;
    } else {
        echo "<script>alert('Cannot delete the primary admin user.'); window.location.href='users.php';</script>";
        exit;
    }
}

// Fetch all users
$query = "SELECT * FROM users ORDER BY id DESC";
$users = mysqli_query($conn, $query);
?>

<div class="row mb-4 align-items-center">
    <div class="col-md-12">
        <h3 class="fw-bold mb-0">Registered Customers</h3>
        <p class="text-muted mb-0">Manage all registered users on your platform</p>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card p-0 shadow-sm border-0 overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover table-custom align-middle mb-0 text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3 px-4">User ID</th>
                            <th scope="col" class="py-3 px-3">Customer Name</th>
                            <th scope="col" class="py-3 px-3">Email Address</th>
                            <th scope="col" class="py-3 px-3 text-center">Registration Date</th>
                            <th scope="col" class="py-3 px-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        <?php if($users && mysqli_num_rows($users) > 0): ?>
                            <?php while($row = mysqli_fetch_assoc($users)): ?>
                            <tr>
                                <td class="px-4 fw-bold text-secondary">#<?php echo $row['id']; ?></td>
                                <td class="px-3 fw-bold text-dark fs-6">
                                    <div class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($row['name']); ?>&background=random" class="rounded-circle me-3 shadow-sm" width="38" height="38" alt="">
                                        <?php echo htmlspecialchars($row['name']); ?>
                                    </div>
                                </td>
                                <td class="px-3 text-muted"><?php echo htmlspecialchars($row['email']); ?></td>
                                <td class="px-3 text-center text-secondary"><?php echo date('M j, Y', strtotime($row['created_at'])); ?></td>
                                <td class="px-4 text-center">
                                    <a href="users.php?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-light text-danger rounded-circle border shadow-sm" title="Delete User" style="width: 32px; height: 32px; line-height: 20px;" onclick="return confirm('Are you sure you want to completely delete this user account?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-5 text-uppercase fw-semibold" style="letter-spacing: 1px;">
                                    <div class="py-4">
                                        <i class="fas fa-users fs-1 mb-3 d-block text-secondary opacity-50"></i>
                                        <h5 class="fw-bold text-dark mb-1 text-transform-none" style="text-transform: none;">No Customers Yet</h5>
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
