<!--Check required fields before going forward 1
refrenced https://www.slingacademy.com/article/how-to-handle-post-request-in-php/ in troubleshooting my code but all code is mine-->
<?php
//adding function for error as my modifing post is breaking everything 
function handleposterror($errorMessage) {
    $_POST['error'] = htmlspecialchars($errorMessage); 
    include 'post.php';
    exit();
}

if (!isset($_POST['name']) || empty($_POST['name'])) {
    //modifying my error checking are handling all other fields except for name
    handleposterror("Please enter a name before submitting.");
}

if (!isset($_POST['ratecar'])) {
    $error = "Please enter a rating for the car before submitting.";
    $_POST['error'] = $error;
    include 'post.php';
    exit();
}
if (!isset($_POST['ratecarcolor'])) {
    $error = "Please enter a rating for the color of the car before submitting.";
    $_POST['error'] = $error;
    include 'post.php';
    exit();
}
if (!isset($_POST['ratecarvalue'])) {
    $error = "Please enter a rating for the value of the car before submitting.";
    $_POST['error'] = $error;
    include 'post.php';
    exit();
}
if (!isset($_POST['ratecarexcitement'])) {
    $error = "Please enter a rating for the feelings of happiness of the car before submitting.";
    $_POST['error'] = $error;
    include 'post.php';
    exit();
}
if (!isset($_POST['ratecarbuy'])) {
    $error = "Please enter a rating for how likely you are to buy this car before submitting.";
    $_POST['error'] = $error;
    include 'post.php';
    exit();
}
if (!isset($_POST['rateatv'])) {
    $error = "Please enter a rating for the ATV before submitting.";
    $_POST['error'] = $error;
    include 'post.php';
    exit();
}
if (!isset($_POST['rateatvcolor'])) {
    $error = "Please enter a rating for the color of the ATV before submitting.";
    $_POST['error'] = $error;
    include 'post.php';
    exit();
}
if (!isset($_POST['rateatvvalue'])) {
    $error = "Please enter a rating for the value of the ATV before submitting.";
    $_POST['error'] = $error;
    include 'post.php';
    exit();
}
if (!isset($_POST['rateatvexcitement'])) {
    $error = "Please enter a rating for the feelings of happiness of the ATV before submitting.";
    $_POST['error'] = $error;
    include 'post.php';
    exit();
}
if (!isset($_POST['rateatvbuy'])) {
    $error = "Please enter a rating for how likely you are to buy this ATV before submitting.";
    $_POST['error'] = $error;
    include 'post.php';
    exit();
}
if (!isset($_POST['rateboat'])) {
    $error = "Please enter a rating for the boat before submitting.";
    $_POST['error'] = $error;
    include 'post.php';
    exit();
}
if (!isset($_POST['rateboatcolor'])) {
    $error = "Please enter a rating for the color of the boat before submitting.";
    $_POST['error'] = $error;
    include 'post.php';
    exit();
}
if (!isset($_POST['rateboatvalue'])) {
    $error = "Please enter a rating for the value of the boat before submitting.";
    $_POST['error'] = $error;
    include 'post.php';
    exit();
}
if (!isset($_POST['rateboatexcitement'])) {
    $error = "Please enter a rating for the feelings of happiness of the boat before submitting.";
    $_POST['error'] = $error;
    include 'post.php';
    exit();
}
if (!isset($_POST['rateboatbuy'])) {
    $error = "Please enter a rating for how likely you are to buy this boat before submitting.";
    $_POST['error'] = $error;
    include 'post.php';
    exit();
}

