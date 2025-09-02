<?php
  include("header.php");
  include("menu.php");
  include("sql.php");
  $conn = $_SESSION['conn'];
  $username = $_SESSION['username'];


  
  $userid = $_SESSION['userid'];
  
  // Clear the cart for the user
  clearcart($conn, $username);
  
  $_SESSION['message'] = "Your cart has been emptied successfully.";
  
  header("Location: cmscart.php");
  exit();
  
  