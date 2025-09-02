<?php
session_start();
include('sql.php'); 

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); 

    
    if (delusername($conn, $id)) {
        $_SESSION['form_success'] = true;
        $_SESSION['message'] = "User successfully deleted.";
    } else {
        $_SESSION['form_success'] = false;
        $_SESSION['error'] = "Failed to delete user. Please try again.";
    }



header("Location: deluser.php");
exit();
}