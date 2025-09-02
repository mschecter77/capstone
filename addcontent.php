<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Add Content</title>
    <link rel="stylesheet" href="styles.css" type="text/css" />
</head>

<body>
    <div id="head">
        <?php
        include("header.php");
        include("menu.php");
        ?>
    </div>

    <div id="error">
        <p>
            <?php
            if (isset($_SESSION['error'])) {
                $error = htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8');
                echo "<script type='text/javascript'>
                    window.onload = function () {
                        alert('$error');
                    };
                  </script>";
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['message'])) {
                $message = htmlspecialchars($_SESSION['message'], ENT_QUOTES, 'UTF-8');
                echo "<script type='text/javascript'>
                    window.onload = function () {
                        alert('$message');
                    };
                  </script>";
                unset($_SESSION['message']);
            }
            ?>
        </p>
    </div>

    <div class="addcont">
        <form id="addcont" action="addcontaction.php" method="post"enctype="multipart/form-data">
            <div>
                <label for="title">Please the title of the post:</label>
                <input type="text" pattern="[A-Za-z0-9'.-]+" name="title" id="title" title="Only letters, apostrophes,numbers,periods and hyphens are allowed."
                    required />
            </div>
            <div>
                <label for="content">Please enter the contect you would like to post:</label>
                <input type="text" name="content" pattern="[A-Za-z0-9'.-]+"
                    title="Only letters, apostrophes,numbers,periods and hyphens are allowed" id="content"
                    required />
            </div>
           
            <div>
                <input type="submit" value="Submit" />
            </div>
        </form>
    </div>



    <?php
    include 'footer.php';
    ?>
</body>

</html>