<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>About Us</title>
   <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>

    <div id="header"> 
        <a href="http://mschecter.com">Home</a>
     
    <div class="menu">
        <a href="foundations.php">Foundations</a>
        <a class="active" href="AboutUs.php">About Us</a>
        <a href="PHPInfo.php">PHP Info</a>
        <a href="ContactUs.php">Contact Us</a>
    </div>
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
     
    <div id="footer"> 
    <a href="https://validator.w3.org/check?uri=http%3A%2F%2Fwww.mschecter.com%2Faboutus.php">
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