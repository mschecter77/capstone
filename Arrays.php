<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Arrays</title>
    <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
<?php
//check for user to be logged in if not redierct them to sessione.php 
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    $_SESSION['message'] = "You must be logged in to access this page.";
    header("Location: sessions.php");
    exit();
}
?>


    <div id="header"> 
        <a href="http://mschecter.com">Home</a>
    </div>
    <!-- w3 schools was used as reference for form syntax https://www.w3schools.com/php/php_forms.asp  ms -->
    
    <div class="form_array">
        <form action="arraysaction.php" method="post">
            <div>
                <label for="uname">User Name To Update:</label>
                <select id="uname" name="uname">
                    <option value="Michael Schecter">Michael Schecter</option>
                    <option value="Jacquita Schecter">Jacquita Schecter</option>
                    <option value="Elijah Schecter">Elijah Schecter</option>
                    <option value="Athena Schecter">Athena Schecter</option>
                </select>
            </div>
            <div>
                <label for="title">Please input new title, if no change leave blank.</label>
                <input type="text" name="title" id="title" />
            </div>
            <div>
                <label for="saying">Please input your new favorite saying, if no change leave blank.</label>
                <input type="text" name="saying" id="saying" />
            </div>
            <div>
                <label for="hobby">Please input your new hobbies, if no change leave blank.</label>
                <input type="text" name="hobby" id="hobby" />
            </div>
            <div>
                <input type="submit" value="Submit" />
            </div>
        </form>
    </div>

    <div id="footer"> 
        <a href="https://validator.w3.org/check?uri=http%3A%2F%2Fwww.mschecter.com%2Farrays.php">
            <img src="https://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
        </a>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" />
        </a>
        <?php 
        include 'footer.php'; 
        ?>
    </div>
</body>
</html>
