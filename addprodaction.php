<?php
session_start();

$conn = $_SESSION['conn'];
include('sql.php');
function handleposterror($errorMessage)
{
    $_SESSION['error'] = htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8');
    header("Location: addproduct.php");
    exit();
}

if (empty($_POST['prodname'])) {
    handleposterror("Please enter a product name before submitting.");
}
else{
    $prodname=$_POST['prodname'];
}
if (empty($_POST['productdescr'])) {
    handleposterror("Please enter a product description before submitting.");
}
else{
    $productdescr=$_POST['productdescr'];
}

if (empty($_POST['productprice'])) {
    handleposterror("Please enter a product price before submitting.");
}
else{
    $productprice=$_POST['productprice'];
}
if (empty($_FILES['imagelocation']['name'])) {
    handleposterror("Please upload an image before submitting.");
} else {
    //used https://www.php.net/manual/en/function.move-uploaded-file.php for refrences 
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
       createproduct($conn,$prodname,$productdescr,$productprice,$imagelocation);
       $_SESSION['form_success'] = true;

       header("Location: modcat.php");
       exit();
}

