<?php
session_start();

$conn = $_SESSION['conn'];
include('sql.php');

$contents = getpagecontent($conn, 1);

function handleposterror($errorMessage)
{
    $_SESSION['error'] = htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8');
    header("Location: modmainpage.php");
    exit();
}

if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $titleup = !empty($_POST['titleup']) ? $_POST['titleup'] : $title;

    if (empty($_POST['content'])) {
        foreach ($contents as $contentItem) {
            if ($contentItem['title'] == $title) {
                $content = $contentItem['content'];
                break;
            }
        }
    } else {
        $content = $_POST['content'];
    }
//playing with this as it is working wierdly 
    if (updatepagecont($conn, $titleup, $content,$title)) {
        $_SESSION['form_success'] = true;
        header("Location: modmainpage.php");
        exit();
    } else {
        handleposterror("Error updating page content.");
    }
}
