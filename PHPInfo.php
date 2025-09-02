<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>
    <title>PHP info</title>
   <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>

    <div id="header"> 
        <a href="http://mschecter.com">Home</a>
     
    <div class="menu">
        <a href="foundations.php">Foundations</a>
        <a href="AboutUs.php">About Us</a>
        <a class="active" href="PHPInfo.php">PHP Info</a>
        <a href="ContactUs.php">Contact Us</a>
    </div>
    </div>
    
    <div id="phpi">
     <!--    had to change this to a object I origanally had it as a iframe but iframe is not xhtml static allowed -->
    <object data="php.php" width="100%" height="600px">
    </object>
</div>
    
    <div id="footer"> 
    <a href="https://validator.w3.org/check?uri=http%3A%2F%2Fwww.mschecter.com/phpinfo.php">
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