<?php
session_start();

$conn = $_SESSION['conn'];
include('sql.php');

function handleposterror($errorMessage) {
    $_SESSION['error'] = htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8');
    header("Location: modmainpage.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['title'])) {
        $title = $_POST['title']; 
        delpagecontent($conn,1,$title);
        
       
      
        
        $_SESSION['form_success'] = true;
        header("Location: modmainpage.php");
    } else {
        handleposterror("Invalid title .");
    }
} else {
    handleposterror("Invalid request method.");
}

