<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Our Mission</title>
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
            Schecter Inventory mission is to show Gods love and guidence through every interaction with our customers we hope that every 
            transaction you have with us shows Christs love our goal is to spread his word by being the example ;
        </p>

        <p>
            As it says in the Bible:
        </p>

        <p>
            “And Jesus came and spoke to them, saying, “All authority has been given to Me in heaven and on earth.
             19 Go [a]therefore and make disciples of all the nations, baptizing them in the name of the Father and of 
             the Son and of the Holy Spirit, 20 teaching them to observe all things that I have commanded you; and lo, 
             I am with you always, even to the end of the age.”<br />
            <cite>(Matthew 28:16-20, New King James Version)</cite>
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