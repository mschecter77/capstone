<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Contact Us</title>
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
    <div id ="title">
    <h1>Contact Us</h1>
    </div>
    <div id="contact">
    <p> Company name: Schecter Inventory<br/>
    Name: Michael Schecter<br/>
    Phone: (777)-777-7777<br/>
    Address: 777 st, <br/>
    Cumming, GA <br/>
    30040 <br/> 
    Facebook: Schecterinventory <br/>
    <a href="mailto:mschecter@liberty.edu">Email</a>
    </p>
    </div>


        <?php 
        include 'footer.php'; 
        ?>
    </div>
</body>
</html>