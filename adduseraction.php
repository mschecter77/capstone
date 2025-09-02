<?php
session_start();

$conn = $_SESSION['conn'];
include('sql.php');
$usernameslist = getusername($conn);
function handleposterror($errorMessage)
{
    $_SESSION['error'] = htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8');
    header("Location: adduser.php");
    exit();
}

if (empty($_POST['floginname'])) {
    handleposterror("Please enter a first name before submitting.");
} elseif (!preg_match('/^[A-Za-z]+$/', $_POST['floginname'])) {
    handleposterror("First name can only contain letters.");
} elseif (strlen($_POST["floginname"]) > 45) {
    handleposterror("first name can only be 45 characters.");
} else {
    $floginname = $_POST['floginname'];

}

if (empty($_POST['lloginname'])) {
    handleposterror("Please enter a last name before submitting.");
} elseif (!preg_match('/^[A-Za-z]+$/', $_POST['lloginname'])) {
    handleposterror("Last name can only contain letters.");
} elseif (strlen($_POST["lloginname"]) > 45) {
    handleposterror("Login name can only be 45 characters.");
} else {
    $lloginname = $_POST['lloginname'];

}
if (empty($_POST['loginname'])) {
    handleposterror("Please enter a user name before submitting.");
} elseif (!preg_match('/^[A-Za-z]+$/', $_POST['loginname'])) {
    handleposterror("Name can only contain letters.");
} elseif (strlen($_POST["loginname"]) > 45) {
    handleposterror("Login name can only be 45 characters.");
} else {
    $loginname = $_POST['loginname'];

    $usernames = getusername($conn); 

    foreach ($usernames as $user) {
        if (strtolower($user['username']) == strtolower($loginname)) {
            handleposterror("Please enter a unique username before submitting.");
            break; 
        }
    }
}

if (empty($_POST['lpassword'])) {
    handleposterror("Please enter a password before submitting.");
} elseif (
    !preg_match('/^[A-Za-z0-9!@#$%^&*()_\-+=\[\]
 {}|;:\,.<>?\/\\~`]+$/', $_POST['lpassword'])
) {
    handleposterror("Password can only contain letters, numbers, and special characters.");
} elseif (strlen($_POST["lpassword"]) > 255) {
    handleposterror("Password can only be 255 characters.");
} else {
    $lpassword = $_POST['lpassword'];
}

if (empty($_POST['uright'])) {
    handleposterror("Please select a user right level before submitting.");
} 
 else {
    if ($_POST['uright']=='customer'){
        $uright = 'customer';
    }
    if ($_POST['uright']=='admin'){
        $uright = 'admin';
    }
    if ($_POST['uright']=='publisher'){
        $uright = 'publisher';
    }
}


if (empty($_POST['lemail'])) {
    handleposterror("Please enter an email before submitting.");
} elseif (preg_match('/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $_POST['lemail'])) {
    $lemail = $_POST['lemail'];



    createuser($conn, $loginname, $lpassword, $lemail,$floginname,$lloginname,$uright);
    $_SESSION['form_success'] = true;

    header("Location: useradmin.php");
    exit();
} else {
    handleposterror("Must be a valid email.");
}
