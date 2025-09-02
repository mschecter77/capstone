<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>update Item</title>
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
    <form action="updateprodaction.php" method="POST" enctype="multipart/form-data">
    <label for="productid">Choose a product:</label>
    <select name="productid" id="productid">
        <?php
        $products = getproducts($conn);
        if (!empty($products)) {
            foreach ($products as $product) {
                $selected = (isset($_POST['productid']) && $_POST['productid'] == $product['productid']) ? 'selected' : '';
                echo '<option value="' . htmlspecialchars($product['productid']) . '" ' . $selected . '>' . htmlspecialchars($product['productname']) . '</option>';
            }
        } else {
            echo '<option>No products available</option>';
        }
        ?>
    </select>
    
    <div>
        <label for="productdescr">Please enter the product description:</label>
        <input type="text" name="productdescr" pattern="[A-Za-z0-9'.-]+" title="Only letters, apostrophes, numbers, periods and hyphens are allowed" 
               id="productdescr"  />
    </div>
    
    <div>
        <label for="productprice">Please enter the product price:</label>
        <input type="text" pattern="^\d+(\.\d{1,2})?$" name="productprice" id="productprice" 
               title="Enter a valid price, e.g., 1.00 or 0.99"  />
    </div>

    <label for="imagelocation">Please upload a product image (JPEG):</label>
    <input type="file" name="imagelocation" id="imagelocation" accept=".jpeg, .jpg" 
           title="Please upload a JPEG image" />
    
    <button type="submit">Update Product</button>
</form>



    <?php
    include 'footer.php';
    ?>
</body>

</html>