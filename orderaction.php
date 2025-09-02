<?php
  include("header.php");
  include("menu.php");
  include("sql.php");
  $conn = $_SESSION['conn'];
  $username = $_SESSION['username'];
  $cartid = getcartid($conn,$username);
  

// Function to handle post errors
function handlePostError($errorMessage) {
    $_SESSION['error'] = htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8');
    header("Location: orderinfo.php"); 
    exit();
}

//check fields data playing with the regex on this 
if (empty($_POST['fname']) || !preg_match('/^[A-Za-z\'-]+$/', $_POST['fname'])) {
    handlePostError("First name can only contain letters, hyphens, and apostrophes, and it is required.");
}
$fname = $_POST['fname'];

if (empty($_POST['lname']) || !preg_match('/^[A-Za-z\'-]+$/', $_POST['lname'])) {
    handlePostError("Last name can only contain letters, hyphens, and apostrophes, and it is required.");
}
$lname = $_POST['lname'];

if (empty($_POST['streetname'])) {
    handlePostError("Street address is required.");
}
$streetname = $_POST['streetname'];

if (empty($_POST['cityname'])) {
    handlePostError("City is required.");
}
$cityname = $_POST['cityname'];

if (empty($_POST['statename'])) {
    handlePostError("State is required.");
}
$statename = $_POST['statename'];

if (empty($_POST['zipcode']) || !preg_match('/^[0-9]{5}$/', $_POST['zipcode'])) {
    handlePostError("Please enter a valid 5-digit zip code.");
}
$zipcode = $_POST['zipcode'];

if (empty($_POST['cardnumber']) || !preg_match('/^[0-9]{16}$/', $_POST['cardnumber'])) {
    handlePostError("Please enter a valid 16-digit card number.");
}
$cardnumber = $_POST['cardnumber'];

if (empty($_POST['cardexp']) || !preg_match('/^(0[1-9]|1[0-2])\/[0-9]{4}$/', $_POST['cardexp'])) {
    handlePostError("Please enter a valid card expiration date in mm/yyyy format.");
}
$cardexp = $_POST['cardexp'];

if (empty($_POST['cardsec']) || !preg_match('/^[0-9]{3}$/', $_POST['cardsec'])) {
    handlePostError("Please enter a valid 3-digit security code.");
}
$cardsec = $_POST['cardsec'];

if (empty($_POST['email']) || !preg_match('/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $_POST['email'])) {
    handlePostError("Please enter a valid email address.");
}
$email = $_POST['email'];

orderitems($conn,$username);
$_SESSION['form_success'] = true;


header("Location: orderconfirmation.php"); 
exit();

