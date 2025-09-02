<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Add Item</title>
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

    <div class="addprod">
        <form id="addprod" action="addprodaction.php" method="post"enctype="multipart/form-data">
            <div>
                <label for="prodname">Please the product name:</label>
                <input type="text" pattern="[A-Za-z]+" name="prodname" id="prodname" title="Only letters are allowed"
                    required />
            </div>
            <div>
                <label for="productdescr">Please enter the product description:</label>
                <input type="text" name="productdescr" pattern="[A-Za-z0-9'.-]+"
                    title="Only letters, apostrophes,numbers,periods and hyphens are allowed" id="productdescr"
                    required />
            </div>
            <div>
                <label for="productprice">Please the product price:</label>
                <input type="text" pattern="^\d+(\.\d{1,2})?$" name="productprice" id="productprice"
                    title="enter a valid price in example 1.00 or 0.99" required />
            </div>
            <label for="imagelocation">Please upload a product image (JPEG):</label>
            <input type="file" name="imagelocation" id="imagelocation" accept=".jpeg, .jpg"
                title="Please upload a JPEG image" required />
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