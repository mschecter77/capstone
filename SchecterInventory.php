<d?xml version="1.0" encoding="UTF-8" ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        <title>Welcome to Schecter Inventory </title>
        <link rel="stylesheet" href="styles.css" type="text/css" />
        <meta name="description" content="Schecter inventory for all your frozen grocery needs" />
        <meta name="keywords" content="Schecter inventory,frozen food, wholesale grocery" />
        <meta name="author" content="Michael Schecter" />
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
            include("sql.php");
            $conn = $_SESSION['conn'];
            $pagecont = getpagecontent($conn, 1);
            ?>

        </div>
        <div id="title">
            <h1>Thank you for comming to Schecter Inventory's home on the web.</h1>
        </div>
        <div id="welcome">
            <?php if (!empty($pagecont)) {
                foreach ($pagecont as $content) {
                    echo '<h2>' . htmlspecialchars($content['title'], ENT_QUOTES, 'UTF-8') . '</h2>';
                    echo '<p>' . htmlspecialchars($content['content'], ENT_QUOTES, 'UTF-8') . '</p>';
                    echo '<hr>';

                }
            } ?>
           
            <p> Please feel free to choose pages from the menu at the top of the page.</p>
            <p> We also love talking to our customers so please feel free to also reach out to us on social media</p>
            <p>or call us at 777-777-7777</p>
            <p>or <a href="mailto:mschecter@liberty.edu">Email</a> us </p>
            </div>
            <a href="https://Facebook.com"><img src="facebook.png" alt="facebook"></a>
            <a href="https://linkedin.com"><img src="linkedin.png" alt="linkedin"></a>
       

        <?php
        include 'footer.php';
        ?>
        </div>
    </body>

    </html>