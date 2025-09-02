<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">



<head>
    <title>Update/Delete User</title>
   <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
<div id="head"> 
    <?php
    include("header.php");
    include("menu.php");
    include("sql.php");
    $conn = $_SESSION['conn']; 

    ?>
</div>

<?php

if (isset($_SESSION['form_success']) && $_SESSION['form_success'] === true) {
    echo '<script type="text/javascript">
            window.onload = function () {
                alert("Action completed successfully!");
            }
          </script>';
    
    unset($_SESSION['form_success']);
}
?>

<div id="error">
    <?php 
    // Check for error messages
    if (isset($_SESSION['error'])) {
        $error = htmlspecialchars($_SESSION['error']);
        echo "<script type='text/javascript'>
                window.onload = function () {
                    alert('$error');
                };
              </script>";
        unset($_SESSION['error']);
    }

    // Check for other messages
    if (isset($_SESSION['message'])) {
        $message = htmlspecialchars($_SESSION['message']);
        echo "<script type='text/javascript'>
                window.onload = function () {
                    alert('$message');
                };
              </script>";
        unset($_SESSION['message']);
    }
    ?>
</div>

<div id="title">
    <h1>Delete User</h1>
</div>    

<div class="formdeluser">
    <form action="deluseraction.php" method="post">
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Fetch users from the database
            $users = getusername($conn); 
            foreach ($users as $user) {
                echo "<tr>
                        <td>" . htmlspecialchars($user["id"]) . "</td>
                        <td>" . htmlspecialchars($user["username"]) . "</td>
                        <td>
                           
                            <a href='deluseraction.php?id=" . $user["id"] . "' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
            </tbody>
        </table>
    </form>
</div>

<?php 
include 'footer.php'; 
?>
</body>
</html>
