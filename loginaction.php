<?php 
session_start();
include("sql.php");
$conn = $_SESSION['conn'];

// Reuse this from the post assignment
function handleposterror($errorMessage) {
    $_SESSION['error'] = htmlspecialchars($errorMessage);
    include 'login.php';
    exit();
}

if (empty($_POST['username'])) {
    handleposterror("Please enter a name before submitting.");
} else {
    $userName = $_POST['username'];
}

if (empty($_POST['password'])) {
    handleposterror("Please enter a password before submitting.");
} else {
    $password = $_POST['password'];
}

$dbpassword = getpassword($conn, $userName);
$rightlevel = getrightlevel($conn,$userName);
if ($dbpassword !== false && password_verify($password, $dbpassword)) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $userName;
    $_SESSION['rightlevel'] = $rightlevel;
    header("Location: SchecterInventory.php");
    exit();
} else {
    handleposterror("Incorrect username or password.");
}
?>
