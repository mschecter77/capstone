<?php
session_start();

$conn = $_SESSION['conn'];
include('sql.php');

function handleposterror($errorMessage) {
    $_SESSION['error'] = htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8');
    header("Location: modcat.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['productid']) && is_numeric($_POST['productid'])) {
        $productid = $_POST['productid']; 
        delprod($conn, $productid);
        
        // not working trying to find out why
        echo "Deleting product ID: " . $productid;
        
        $_SESSION['form_success'] = true;
        header("Location: modcat.php");
    } else {
        handleposterror("Invalid product ID.");
    }
} else {
    handleposterror("Invalid request method.");
}

