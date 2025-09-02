<?php
session_start();

function handlePostError($errorMessage) {
    $_SESSION['error'] = htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8');
    header("Location: cmsproducts.php");
    exit();
}

// Check if there is something in their cart, if so go to shipping and payment info
if (isset($_SESSION['total']) && $_SESSION['total'] > 0) {
    header("Location: orderinfo.php");
    exit();
} else {
    handlePostError("You must have items in your cart in order to check out. Redirecting you to products page");
}
