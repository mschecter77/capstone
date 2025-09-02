<?php
session_start();


$getcurrentPage = basename($_SERVER['SCRIPT_NAME']);

if ($getcurrentPage != 'database.php' && (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)) {
    $_SESSION['message'] = "You must be logged in to access this page.";
    header("Location: login.php");
    exit();
}
if ($getcurrentPage == 'useradmin.php' && (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || ($_SESSION['rightlevel'] != 'admin' ))) {
    $_SESSION['message'] = "You must be an admin  to access this page.";
    header("Location: login.php");
    exit();
}
if ($getcurrentPage == 'modcat.php' && (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || ($_SESSION['rightlevel'] != 'admin' && $_SESSION['rightlevel'] != 'publisher'))) {
    $_SESSION['message'] = "You must be an admin or publisher to access this page.";
    header("Location: login.php");
    exit();
}
if ($getcurrentPage == 'modmainpage.php' && (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || ($_SESSION['rightlevel'] != 'admin' && $_SESSION['rightlevel'] != 'publisher'))) {
    $_SESSION['message'] = "You must be an admin or publisher to access this page.";
    header("Location: login.php");
    exit();
}

if ($getcurrentPage == 'login.php' && isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: SchecterInventory.php");
    exit();
}

if (isset($_SESSION['username'])) {
    echo "Hello " . htmlspecialchars($_SESSION['username']);
}