<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Why Choose Us </title>
   <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>

    <!-- set up php to handle the form is info is not reqiered in one on the needed fields I have tried this a
 a few diffrent ways now leaving this note in for later projects refrence-->
 <div id="error">
    <p>
        <?php 
        //check for error this is sent back from action page 
            if (isset($_POST['error'])) {
                echo htmlspecialchars($_POST['error']);
            }
            //check for messages from the session 
            if (isset($_SESSION['message'])) {
                echo htmlspecialchars($_SESSION['message']);
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
        <h1>Why Choose Us. </h1>
    </div>

    <div id="about">
    <p>You work hard for your money. You deserve to get the best value for it.</p>
    <p>You also want to support your local community, So do we.</p>
    <p>We believe as a Christian business we do not just talk the word but live it. </p>
    <p>We believe in america and family as well.</p>
    <p>This is why most of our customers choose us. We share the same values as you do. </p>
    </div>


        <?php 
        include 'footer.php'; 
        ?>
    </div>
</body>
</html>