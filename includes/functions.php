<?php
require_once 'db.php';

// Add item to cart
function addToCart($user_id, $product_id, $quantity = 1){
    global $conn;
    $user_id = (int)$user_id;
    $product_id = (int)$product_id;
    $quantity = (int)$quantity;
    
    // Check if already in cart
    $check = mysqli_query($conn, "SELECT * FROM cart WHERE user_id=$user_id AND product_id=$product_id");
    if(mysqli_num_rows($check) > 0){
        mysqli_query($conn, "UPDATE cart SET quantity = quantity + $quantity WHERE user_id=$user_id AND product_id=$product_id");
    } else {
        mysqli_query($conn, "INSERT INTO cart(user_id, product_id, quantity) VALUES($user_id, $product_id, $quantity)");
    }
}

// Get all products
function getProducts(){
    global $conn;
    return mysqli_query($conn, "SELECT * FROM products");
}

// Get products by category
function getProductsByCategory($category_id){
    global $conn;
    $category_id = (int)$category_id;
    return mysqli_query($conn, "SELECT * FROM products WHERE category_id = $category_id");
}

// Place Order
function placeOrder($user_id, $name='', $email='', $address='', $payment='COD'){
    global $conn;
    $user_id = (int)$user_id;
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $address = mysqli_real_escape_string($conn, $address);
    $payment = mysqli_real_escape_string($conn, $payment);

    $cart = mysqli_query($conn, "SELECT c.*, p.price FROM cart c JOIN products p ON c.product_id = p.id WHERE c.user_id=$user_id");
    $total = 0;

    $cart_items = [];
    while($row = mysqli_fetch_assoc($cart)){
        $total += $row['quantity'] * $row['price'];
        $cart_items[] = $row;
    }

    if($total > 0){
        $insert_order = "INSERT INTO orders(user_id, total_price, shipping_name, shipping_email, shipping_address, payment_method) 
                         VALUES($user_id, $total, '$name', '$email', '$address', '$payment')";
        if(mysqli_query($conn, $insert_order)){
            $order_id = mysqli_insert_id($conn);
            
            foreach($cart_items as $item){
                $pid = $item['product_id'];
                $qty = $item['quantity'];
                $price = $item['price'];
                mysqli_query($conn, "INSERT INTO order_items(order_id, product_id, quantity, price) VALUES($order_id, $pid, $qty, $price)");
            }
            // Clear cart
            mysqli_query($conn, "DELETE FROM cart WHERE user_id=$user_id");
            return $order_id;
        }
    }
    return false;
}
?>
