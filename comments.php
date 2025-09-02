<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Our Team</title>
   <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
<div id="head"> 
        <?php include("header.php"); ?>
    </div>

    <div id="error">
        <?php 
        // Check for error this is sent back from action page   
        // Changing to JavaScript to be a little cleaner on the messages
        if (isset($_SESSION['error'])) {
            $error = htmlspecialchars($_SESSION['error']); 
            echo "<script type='text/javascript'>
                    window.onload = function () {
                        alert('$error');
                    };
                  </script>";
            unset($_SESSION['error']);
        }
        // Check for messages from the session 
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

   
   
    <div id="header"> 
        <a href="http://mschecter.com">Home</a>
        <br/>
        <h3>Welcome to our org chart please scroll down to read and leave comments.</h3>
        </div>

    

    <?php include 'variables.php'; ?>

    
   

    <div id="toplevel">
        <a href="<?php echo $mpage; ?>">Owner: Michael Schecter</a>
    </div> 
    <div id="linettom"></div>
    <div id="midlevel">
        <a href="<?php echo $jpage; ?>">Co-Owner: Jacquita Schecter</a>
    </div>
    <div id="lineh"></div>
    <div id="linemtob"></div>
    
    <div id="lowlevelright">
        <a href="<?php echo $epage; ?>">JR IT: Elijah Schecter</a>
    </div>
    
    <div id="lowlevelleft">
        <a href="<?php echo $apage; ?>">Security: Athena Schecter</a>
    </div>
    

    <div class="formcomments">
        <form action="commentaction.php" method="post">
            <div>
                <label for="name">Please enter name:</label>
                <input type="text" pattern="^[A-Za-z '-]+$" name="name" id="name"
                title="Only letters, apostrophes, and hyphens are allowed" required/>
            </div>
            <div>
                <label for="title">Please enter your title:</label>
                <input type="text" name="title" pattern="^[A-Za-z'-]+$" title="Only letters, apostrophes, and hyphens are allowed"
                id="title" required />
            </div>
            <div>
                <label for="comment">Please enter your comment:</label>
                <input type="text" name="comment" id="comment" required />
            </div>
            <div>
                <input type="submit" value="Submit" />
            </div>
        </form>
    </div>
  
    <div class = 'commenttable'>
    <?php
     include('sql.php');
    $conn = $_SESSION['conn']; 
   
    getComments($conn);
    ?>
    </div>  
   

    <?php include 'footer.php'; ?>

</body>
</html>
