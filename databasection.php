<?php 
//start session 
session_start();
//set username and password
$customerUserName = 'customer';
$customerPassword ='customer';
$publisherUserName = 'publisher';
$publisherPassword ='publisher';
$adminUserName = 'admin';
$adminPassword ='admin';
//good place to reuse this from the post assignment
function handleposterror($errorMessage) {
    $_SESSION['error'] = htmlspecialchars($errorMessage); 
    include 'database.php';
    exit();
}

if (empty($_POST['username'])) {
    handleposterror("Please enter a name before submitting.");
}
else{
    $userName = $_POST['username'];
}
if (empty($_POST['password'])) {
    handleposterror("Please enter a password before submitting.");
}
else{

    $password = $_POST['password'];
}
if (($userName==$customerUserName && $password==$customerPassword )|| ($userName==$adminUserName && $password==$adminPassword)|| 
($userName==$publisherUserName && $password==$publisherPassword)){
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $userName;
    header("Location: comments.php");
    exit();
}
else{
    handleposterror("Incorrect username or password.");

}