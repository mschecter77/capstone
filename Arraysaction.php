<div?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    
    <title><?php echo $_POST["uname"]?></title>
   <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>

    <div id="header"> 
        <a href="http://mschecter.com">Home</a>
        
    </div>
    
    <?php
    include 'variables.php';
    //load correct picture for profile as well as other attributes in case value not given 
    switch ($_POST['uname']){
        case 'Jacquita Schecter':
            $title = $jtitle;
            $pic = $jpic;
            $quote =$jquote;
            $hobbys = $jhobbys;
            break;
        case 'Michael Schecter':
            $title = $mtitle;
            $pic = $mpic;
            $quote =$mquote;
            $hobbys = $mhobbys;
            break;
        case 'Elijah Schecter':
            $title = $etitle;
            $pic = $epic;
            $quote =$equote;
            $hobbys = $ehobbys;
            break;
        case 'Athena Schecter':
            $title = $atitle;
            $pic = $apic;
            $quote =$aquote;
            $hobbys = $ahobbys;
            break;
    }
    //if the new fields arent empty replace or append 
    if (!empty($_POST['title'])) {
        $title = htmlspecialchars($_POST['title']);
    }
    if (!empty($_POST['saying'])) {
        $quote = htmlspecialchars($_POST['saying']);
    }
    
    if (!empty($_POST['hobby'])) {
        array_unshift($hobbys,htmlspecialchars($_POST['hobby']));

    }
    ?>
    


    
    <div class ="pic">
    <img src="<?php echo $pic; ?>" alt="<?php echo $_POST['uname']; ?>" />
    
    <div id="bio">
    <h1>Name: <?php echo $_POST['uname']; ?> </h1>   

    <h1>Title: <?php echo $title; ?> </h1>
    
    
   
    <h1>Favorite Saying: <?php echo $quote; ?></h1>
    <h2>Hobbys:</h2>
    <ol>
        <?php
        foreach ($hobbys as $hobby) {
            echo "<li>$hobby</li>";
        }
        ?>
    </ol>
    </div>
    </div>

    <div id="footer"> 
    <a href="https://validator.w3.org/check?uri=http%3A%2F%2Fwww.mschecter.com/Arraysaction.php">
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