<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Our Locations </title>
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
    <div id="contact">
    <p> Company name: Schecter Inventory<br/>
    Location: Georgia <br/>
    Phone: (777)-777-7777<br/>
    Address: 777 st, <br/>
    Cumming, GA <br/>
    30040 <br/> 
    Hours of operation: 8:00 am - 5:00 pm Monday - Saturday
   <br/>
   <br/>

    Company name: Schecter Inventory<br/>
    Location: Mexico <br/>
    Phone: (222)-222-2222<br/>
    Address: 222 st, <br/>
    Mexico City <br/>
    58425 <br/> 
    Hours of operation: 8:00 am - 5:00 pm Monday - Saturday
    </p>
    </div>
        <?php 
        include 'footer.php'; 
        ?>
    </div>
</body>
</html>