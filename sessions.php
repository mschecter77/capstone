<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Sessions</title>
   <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
<!-- set up php to handle the form is info is not reqiered in one on the needed fields I have tried this a
 a few diffrent ways now leaving this note in for later projects refrence-->
 <div id="error">
    <p>
        <?php 
        session_start();
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
 
    <div id="header"> 
        <a href="http://mschecter.com">Home</a>
     
   
    </div>

    <div class="form_login">
        <form action="sessionaction.php" method="post">
            <div>
            <label for="username">Please input user name:</label>
            <input type="text" name="username" id="username" />
            </div>
            <div>
            <label for="">Please input password:</label>
            <input type="password" name="password" id="password" />
            </div>
            <div></div>
            <div>
                <input type="submit" value="Submit" />
            </div>
        </form>
    </div>
     
    <div id="footer"> 
    <a href="https://validator.w3.org/check?uri=http%3A%2F%2Fwww.mschecter.com%2Fsessions.php">
    <img src="https://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
    </a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="Valid CSS!" />
    </a>
        <?php 
        include 'footer.php'; 
        ?>
    </div>
</body>
</html>