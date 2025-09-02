<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Products Page</title>
    <link rel="stylesheet" href="styles.css" type="text/css" />
</head>

<body>
    <div id="head">
        <?php
        include("header.php");
        include("menu.php");
        include("sql.php");
        $conn = $_SESSION['conn'];
        $products = getproducts($conn)
            ?>
    </div>

    <div id="error">
        <p>
            <?php
            // Check for error this is sent back from action page
            if (isset($_SESSION['error'])) {
               //$error = htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8');
                echo "<script type='text/javascript'>
                        window.onload = function () {
                            alert('$error');
                        };
                      </script>";
                unset($_SESSION['error']); // Clear the error message after displaying it
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

    <div id="title">
        <h1>Please enter quantities for each item then click add to cart to go to your shopping cart.</h1>
    </div>
    <div class="form_products">
        <form action="productsaction.php" method="post">
            <?php

            if (!empty($products)) {
                foreach ($products as $product) {
                    echo '<div class="product">
                            <img src="' . htmlspecialchars($product['imagelocation']) . '" alt="' . htmlspecialchars($product['productname']) . '" />
                            <p>' . htmlspecialchars($product['productname']) . '</p>
                            <p>' . htmlspecialchars($product['productdescr']) . '</p>
                            <p>Price: $' . number_format($product['productprice'], 2) . '</p>
                            <label for="quantity_' . $product['productid'] . '">Quantity:</label>
                            <input type="number" id="quantity_' . $product['productid'] . '" name="quantity[' . $product['productid'] . ']" value="0" min="0" />
                          </div>';
                }
            } else {
                echo "<p>No products found.</p>";
            }
            ?>
            <div>
                <input type="submit" value="Add to cart" class="product-button" />
            </div>
        </form>
    </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>