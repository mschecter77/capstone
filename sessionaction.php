<?php 
//start session 
session_start();
//set username and password
$goodUserName = 'customer';
$goodPassword ='customer';
//good place to reuse this from the post assignment
function handleposterror($errorMessage) {
    $_POST['error'] = htmlspecialchars($errorMessage); 
    include 'sessions.php';
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
if ($userName==$goodUserName && $password==$goodPassword){
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header("Location: Week1b.php");
}
else{
    handleposterror("Incorrect username or password.");

}