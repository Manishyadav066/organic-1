<?php
require_once 'config.php';

header('Content-Type: application/json');

$response = ['status' => 'error', 'message' => 'Invalid action'];

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $user_id = $_SESSION['user_id'] ?? 1;

    if ($action === 'add') {
        $product_id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
        
        if ($product_id > 0) {
            addToCart($user_id, $product_id, $quantity);
            $response = ['status' => 'success', 'message' => 'Product added to cart'];
        }
    } else if ($action === 'get') {
        // Return cart items
        $cart = mysqli_query($conn, "SELECT c.id as cart_id, c.quantity, p.name, p.price, p.image FROM cart c JOIN products p ON c.product_id = p.id WHERE c.user_id=$user_id");
        $items = [];
        $total = 0;
        if($cart) {
            while($row = mysqli_fetch_assoc($cart)){
                $total += $row['quantity'] * $row['price'];
                $items[] = $row;
            }
        }
        $response = ['status' => 'success', 'items' => $items, 'total' => $total];
    } else if ($action === 'remove') {
        $cart_id = (int)$_POST['cart_id'];
        mysqli_query($conn, "DELETE FROM cart WHERE id=$cart_id AND user_id=$user_id");
        $response = ['status' => 'success', 'message' => 'Item removed'];
    }
}

echo json_encode($response);
?>
