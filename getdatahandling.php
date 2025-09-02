<!--Check required fields before going forward 1
refrenced https://www.slingacademy.com/article/how-to-handle-post-request-in-php/ in troubleshooting my code but all code is mine
reusing this code from my post action since it works well-->
<?php

function handleposterror($errorMessage) {
    $_GET['error'] = htmlspecialchars($errorMessage); // Ensures output is safe for XHTML
    include 'get.php';
    exit();
}

if (!isset($_GET['name']) || empty($_GET['name'])) {
    //modifying my error checking are handling all other fields except for name
    handleposterror("Please enter a name before submitting.");
}

if (!isset($_GET['ratecar'])) {
    $error = "Please enter a rating for the car before submitting.";
    $_GET['error'] = $error;
    include 'get.php';
    exit();
}
if (!isset($_GET['ratecarcolor'])) {
    $error = "Please enter a rating for the color of the car before submitting.";
    $_GET['error'] = $error;
    include 'get.php';
    exit();
}
if (!isset($_GET['ratecarvalue'])) {
    $error = "Please enter a rating for the value of the car before submitting.";
    $_GET['error'] = $error;
    include 'get.php';
    exit();
}
if (!isset($_GET['ratecarexcitement'])) {
    $error = "Please enter a rating for the feelings of happiness of the car before submitting.";
    $_GET['error'] = $error;
    include 'get.php';
    exit();
}
if (!isset($_GET['ratecarbuy'])) {
    $error = "Please enter a rating for how likely you are to buy this car before submitting.";
    $_GET['error'] = $error;
    include 'get.php';
    exit();
}
if (!isset($_GET['rateatv'])) {
    $error = "Please enter a rating for the ATV before submitting.";
    $_GET['error'] = $error;
    include 'get.php';
    exit();
}
if (!isset($_GET['rateatvcolor'])) {
    $error = "Please enter a rating for the color of the ATV before submitting.";
    $_GET['error'] = $error;
    include 'get.php';
    exit();
}
if (!isset($_GET['rateatvvalue'])) {
    $error = "Please enter a rating for the value of the ATV before submitting.";
    $_GET['error'] = $error;
    include 'get.php';
    exit();
}
if (!isset($_GET['rateatvexcitement'])) {
    $error = "Please enter a rating for the feelings of happiness of the ATV before submitting.";
    $_GET['error'] = $error;
    include 'get.php';
    exit();
}
if (!isset($_GET['rateatvbuy'])) {
    $error = "Please enter a rating for how likely you are to buy this ATV before submitting.";
    $_GET['error'] = $error;
    include 'get.php';
    exit();
}
if (!isset($_GET['rateboat'])) {
    $error = "Please enter a rating for the boat before submitting.";
    $_GET['error'] = $error;
    include 'get.php';
    exit();
}
if (!isset($_GET['rateboatcolor'])) {
    $error = "Please enter a rating for the color of the boat before submitting.";
    $_GET['error'] = $error;
    include 'get.php';
    exit();
}
if (!isset($_GET['rateboatvalue'])) {
    $error = "Please enter a rating for the value of the boat before submitting.";
    $_GET['error'] = $error;
    include 'get.php';
    exit();
}
if (!isset($_GET['rateboatexcitement'])) {
    $error = "Please enter a rating for the feelings of happiness of the boat before submitting.";
    $_GET['error'] = $error;
    include 'get.php';
    exit();
}
if (!isset($_GET['rateboatbuy'])) {
    $error = "Please enter a rating for how likely you are to buy this boat before submitting.";
    $_GET['error'] = $error;
    include 'get.php';
    exit();
}

