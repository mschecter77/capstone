<?php
session_start();
$conn = $_SESSION['conn']; 
include('sql.php');
getComments($conn);