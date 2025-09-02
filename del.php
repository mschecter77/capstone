<?php
session_start();
//would love to get this in sql.php but havnt been able to make that work 
include('sql.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); //was getting errors making sure this is alwats numeric
    deleteComment($_SESSION['conn'], $id);
}

header("Location: comments.php");
exit();
