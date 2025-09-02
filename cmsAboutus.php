<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>About US </title>
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
   <div id="about">
    <?php
    echo '
        <p>
            Schecter Inventory is a Christian-based frozen grocery that specializes in selling to mom-and-pop businesses 
            across the United States and Mexico. With locations across the continental United States and an office in 
            Mexico City, we work with you to find the best deals for your needs.
        </p>

        <p>
            As it says in the Bible:
        </p>

        <p>
            “And whatever you do, do it heartily, as to the Lord and not to men, knowing that from the Lord you will 
            receive the reward of the inheritance; for you serve the Lord Christ.”<br />
            <cite>(Colossians 3:23-24, New King James Version)</cite>
        </p>

        <p>
            We aim to express our love of Christ through our business practices, representing how business should be. 
        </p>
        
        <p>
            This is one of the ways we see the Lord showing his love to all.
        </p>

        <p>
            Established in January of 1999, we look forward to serving you.
        </p>
    ';
    ?>
</div>
     
     

        <?php 
        include 'footer.php'; 
        ?>
    </div>
</body>
</html>