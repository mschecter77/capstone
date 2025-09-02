<?php
 include("header.php");
 include("menu.php");
 include("sql.php");
 $conn = $_SESSION['conn'];

// Function to handle errors
function handlePostError($errorMessage) {
    $_SESSION['error'] = htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8');
    header("Location: cmsproducts.php");
    exit();
}



$username = $_SESSION['username']; 
$count = 0;

if (isset($_POST['quantity']) && is_array($_POST['quantity'])) {
    foreach ($_POST['quantity'] as $productid => $quantity) {
        $productid = intval($productid);
        $quantity = intval($quantity);

        if ($quantity > 0) {
            if (addItemToCart($conn, $username, $productid, $quantity)) {
                $count++;
            }
        }
    }
}

// Check if no items were added
if ($count == 0) {
    handlePostError("Please include at least one item before pressing add to cart.");
} else {
    $_SESSION['message'] = "Items added to cart successfully!";
    // Redirect to shopping cart
    header("Location: cmscart.php");
    exit();
}

