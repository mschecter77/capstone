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
    <title>Elijah Schecter</title>
   <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>

    <div id="header"> 
        <a href="http://mschecter.com">Home</a>
        
    </div>
    <?php
    include 'variables.php';
    ?>
    <div class ="pic">
    <img src="<?php echo $epic; ?>" alt="eschecter"/>
    
    <div id="bio">
    <h1>Name: <?php echo $ename; ?></h1>   
    <h1>Title: <?php echo $etitle; ?></h1> 
    <h1>Favorite Saying: <?php echo $equote; ?></h1>
    <h2>Hobbys:</h2>
    <ol>
        <?php
        foreach ($ehobbys as $hobby) {
            echo "<li>$hobby</li>";
        }
        ?>
    </ol>
    </div>
    </div>

    <div id="footer"> 
    <a href="https://validator.w3.org/check?uri=http%3A%2F%2Fwww.mschecter.com/eschecter.php">
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