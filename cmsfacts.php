<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Welcome to Schecter Inventory </title>
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
        <h1>Interesting Facts</h1>
        
    </div>
    <div id="bio">
        <ol>
            <li> 1930  Birds Eye commissiond American Radiator Corp. to design an inexpensive case which Birds Eye then leased to go with their forzen foods.</li>
            <li> 1936 - Frozen orange juice concentrate is introduced by California Consumers Corp.</li>
            <li>1940-60 Ready made food takes off around the US.</li>
            <li>1970-1980 freezers drop in price and give more options to households.</li>
            <li>Today Schecter Inventory is here to get you the best in frozen foods and the best prices.</li>



        </ol>
    </div>
        
        <?php 
        include 'footer.php'; 
        ?>
    </div>
</body>
</html>