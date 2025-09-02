<?php
session_start();

//good place to reuse this from the post assignment
function handleposterror($errorMessage) {
    $_SESSION['error'] = htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8');
    header("Location: cmsprayer.php"); // Redirect back to the form page
    exit();
}

//adding server side validation as client does not seem to be consisitent 
//https://learn.microsoft.com/en-us/dotnet/standard/base-types/regular-expression-language-quick-reference uses as a refrence for regex
if (empty($_POST['fname'])) {
    handleposterror("Please enter a first name before submitting.");
} elseif (preg_match('/^[A-Za-z\'-]+$/', $_POST['fname'])) {
    $fname = $_POST['fname'];
} else {
    handleposterror("First name can only contain letters, hyphens, and apostrophes.");
}

if (empty($_POST['lname'])) {
    handleposterror("Please enter a last name before submitting.");
} elseif (preg_match('/^[A-Za-z\'-]+$/', $_POST['lname'])) {
    $lname = $_POST['lname'];
} else {
    handleposterror("Last name can only contain letters, hyphens, and apostrophes.");
}

if (empty($_POST['email'])) {
    handleposterror("Please enter an email before submitting.");
} elseif (preg_match('/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $_POST['email'])) {
    $email = $_POST['email'];
    $_SESSION['form_success'] = true;
    header("Location: cmsprayer.php");
    exit();
} else {
    handleposterror("Must be a valid email.");
}

