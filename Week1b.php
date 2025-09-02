
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php
//check for user to be logged in if not redierct them to sessione.php 
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    $_SESSION['message'] = "You must be logged in to access this page.";
    header("Location: sessions.php");
    exit();
}
?>

<head>
    <title>Module 2 week 1 Variables</title>
   <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>

    <div id="header"> 
        <a href="http://mschecter.com">Home</a>
        <?php
        include 'variables.php'
        ?>
    </div>
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
    

    <div id="footer"> 
    <a href="https://validator.w3.org/check?uri=http%3A%2F%2Fwww.mschecter.com/Week1b.php">
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