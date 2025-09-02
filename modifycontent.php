<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Update Content</title>
    <link rel="stylesheet" href="styles.css" type="text/css" />
</head>

<body>
    <div id="head">
        <?php
        include("header.php");
        include("menu.php");
        include("sql.php");
        $conn = $_SESSION['conn'];
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
    <form action="updatecontentaction.php" method="POST" enctype="multipart/form-data">
    <label for="title">Choose a Title:</label>
    <select name="title" id="title">
        <?php
        $contents = getpagecontent($conn,1); 
        if (!empty($contents)) {
            foreach ($contents as $content) {
                echo '<option value="' . htmlspecialchars($content['title']) . '">' . htmlspecialchars($content['title']) . '</option>';
            }
        } else {
            echo '<option>No posts available</option>';
        }
        ?>
    </select>
    
    <div>
        <label for="titleup">Please enter the updated title: leave blank to keep the same title. </label>
        <input type="text" name="titleup" pattern="[A-Za-z0-9'.-]+" title="Only letters, apostrophes, numbers, periods and hyphens are allowed " 
               id="productdescr"  />
    </div>
    
    <div>
        <label for="content">Please enter the new content:leave blank to keep the same content.</label>
        <input type="text" pattern="[A-Za-z0-9'.-]+" name="content" id="content" 
               title="Only letters, apostrophes, numbers, periods and hyphens are allowed"  />
    </div>

    
    
    <button type="submit">Update Comment</button>
</form>



    <?php
    include 'footer.php';
    ?>
</body>

</html>