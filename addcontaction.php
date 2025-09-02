<?php
session_start();

$conn = $_SESSION['conn'];
include('sql.php');
function handleposterror($errorMessage)
{
    $_SESSION['error'] = htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8');
    header("Location: addcontent.php");
    exit();
}

if (empty($_POST['title'])) {
    handleposterror("Please enter a title before submitting.");
}
else{
    $title=$_POST['title'];
}
if (empty($_POST['content'])) {
    handleposterror("Please enter content submitting.");
}
else{
    $content=$_POST['content'];



       createpagecontent($conn,1, $title,$content);
       $_SESSION['form_success'] = true;

       header("Location: modmainpage.php");
       exit();
}

