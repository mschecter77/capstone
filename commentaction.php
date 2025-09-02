<?php
session_start();


function handleposterror($errorMessage) {
    $_SESSION['error'] = htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8');
    header("Location: comments.php"); 
    exit();
}


if (empty($_POST['name'])) {
    handleposterror("Please enter a name before submitting.");
} elseif (!preg_match('/^[A-Za-z \'-]+$/', $_POST['name'])) { 
    handleposterror("Name can only contain letters, hyphens, and apostrophes.");}
 elseif (strlen($_POST["name"]) > 50) {
        handleposterror("Name can only be 50 characters.");
    }
 else {
    $name = $_POST['name']; 
}


if (empty($_POST['title'])) {
    handleposterror("Please enter a title before submitting.");
} elseif (!preg_match('/^[A-Za-z \'-]+$/', $_POST['title'])) { 
    handleposterror("Title can only contain letters, hyphens, and apostrophes.");
} 
elseif (strlen($_POST["title"]) > 50) {
    handleposterror("Title can only be 50 characters.");
}
else {
    $title = $_POST['title']; 
}


if (empty($_POST['comment'])) {
    handleposterror("Please enter a comment before submitting.");
} elseif (strlen($_POST["comment"]) > 299) {
    handleposterror("Comments can only be 299 characters.");

}
 else {
    $comment = $_POST['comment']; 
    $_SESSION['form_success'] = true;
    

    $conn = $_SESSION['conn'];
    include('sql.php');
    insertComment($conn, $name, $title, $comment);

  
    header("Location: comments.php");
    exit();
}