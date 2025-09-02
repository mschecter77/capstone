<?php
session_start();

$conn = $_SESSION['conn'];
include('sql.php');
$products = getproducts($conn);
function handleposterror($errorMessage)
{
    $_SESSION['error'] = htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8');
    header("Location: adduser.php");
    exit();
}

if (isset($_POST['productid'])) {
    $productid = $_POST['productid'];
    if (empty($_POST['productdescr'])){
        foreach ($products as $product) {
            if ($product['productid'] == $productid) {
                $productdescr = $product['productdescr']; 
                break; 
            }
        }
    }
    else {
    $productdescr = $_POST['productdescr'];
    } 
      if (empty($_POST['productprice'])){
        foreach ($products as $product) {
            if ($product['productid'] == $productid) {
                $productprice = $product['productprice']; 
                break; 
            }
        }
    }
    else {
    $productprice = $_POST['productprice'];
    } 
    if (empty($_POST['imagelocation'])){
        foreach ($products as $product) {
            if ($product['productid'] == $productid) {
                $imagelocation = $product['imagelocation']; 
                break; 
            }
        }
    }
    else {
        $imagelocation = $_FILES['imagelocation']['name']; 
        if ($_FILES['imagelocation']['error'] === UPLOAD_ERR_OK) {
            $rootDir = $_SERVER['DOCUMENT_ROOT'];
            
        
            $targetFile = $rootDir . '/' . basename($_FILES['imagelocation']['name']);
        
            if (move_uploaded_file($_FILES['imagelocation']['tmp_name'], $targetFile)) {
                echo "File successfully uploaded to the site root!";
            } else {
                echo "Error moving file to the site root.";
            }
        } else {
            echo "File upload error: " . $_FILES['imagelocation']['error'];
        }

    } 
    
  
    updateproduct($conn, $productid, $productdescr, $productprice, $imagelocation);
    $_SESSION['form_success'] = true;

    header("Location: modcat.php");
}
