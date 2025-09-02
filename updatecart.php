<?php
include("sql.php");
$conn = $_SESSION['conn'];
$username = $_SESSION['username'];



if (isset($_POST['quantity']) && is_array($_POST['quantity'])) {
    foreach ($_POST['quantity'] as $productid => $quantity) {
        $productid = intval($productid);
        $quantity = intval($quantity);

        

        if ($quantity >= 0) {
            $success = updatecartitem($conn, $username, $productid, $quantity);
            if (!$success) {
                $_SESSION['error'] = "Error updating item with ID $productid to quantity $quantity.";
            }
        }
    }
}

header("Location: cmscart.php");
exit();

