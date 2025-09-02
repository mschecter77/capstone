<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Order Success</title>
   <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
 <!-- set up php to handle the form is info is not reqiered in one on the needed fields I have tried this a
 a few diffrent ways now leaving this note in for later projects refrence-->
 <div id="head">
        <?php
        include("header.php");
        include("menu.php");
        ?>
    </div>

    <div id="error">
        <p>
            <?php
            // Check for error this is sent back from action page changing to session error as i was getting some inconsitancy
            if (isset($_SESSION['error'])) {
                $error = htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8');
                echo "<script type='text/javascript'>
                        window.onload = function () {
                            alert('$error');
                        };
                      </script>";
                unset($_SESSION['error']); // Clear the error message 
            }
            if (isset($_SESSION['message'])) {
                $message = htmlspecialchars($_SESSION['message'], ENT_QUOTES, 'UTF-8');
                echo "<script type='text/javascript'>
                        window.onload = function () {
                            alert('$message');
                        };
                      </script>";
                unset($_SESSION['message']);
            }
            ?>
        </p>
    </div>
 
    <div id="head"> 
       
    <?php
    include("header.php");
    include("menu.php");
    ?>
   
    </div>
<div id = "title">
    <h1>Your order was successfully made we will be in touch as soon as it ships.</h1>
</div>

        <?php 
        include 'footer.php'; 
        ?>
    </div>
</body>
</html>