<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Schecter Inventory Cart</title>
    <link rel="stylesheet" href="styles.css" type="text/css" />
</head>

<body>

   
    <div id="head">
        <?php
        include("header.php");
        include("menu.php");
        include("sql.php");
        $conn = $_SESSION['conn'];
        $username = $_SESSION['username'];
        $cartitems = getCartItems($conn, $username);
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


    <?php
    $totalpre = 0;

    // Calculate totals and display cart items
   
    if (!empty($cartitems)) {
        foreach ($cartitems as $item) {
            $extended_price = $item['quantity'] * $item['productprice'];
            $totalpre += $extended_price;
            echo '<div class="product_cart">
                    <form action="updatecart.php" method="post">
                        <img src="' . htmlspecialchars($item['imagelocation']) . '" alt="' . htmlspecialchars($item['productname']) . '" />
                        <p>' . htmlspecialchars($item['productname']) . '</p>
                        <p>Price: $' . number_format($item['productprice'], 2) . '</p>
                        <label for="quantity_' . $item['productid'] . '">Quantity:</label>
                        <input type="number" id="quantity_' . $item['productid'] . '" name="quantity[' . $item['productid'] . ']" value="' . $item['quantity'] . '" min="0" />
                        <p>Extended Price: $' . number_format($extended_price, 2) . '</p>
                        <input type="submit" value="Update Quantity" />
                    </form>
                </div>';
        }
    } else {
        echo "<p>Your cart is empty.</p>";
    }
    
    
    $tax = $totalpre * .065;
    $total = $totalpre + $tax;
    $_SESSION["total"] = $total;
    ?>

    <div id="title">
        <h1>Please view your totals below. You can click the buttons to adjust the quantities.</h1>
    </div>

    <?php
    echo "<p>Pretax total is $" . number_format($totalpre, 2) . ". Tax of 6.5% is $"
        . number_format($tax, 2) . ". Your grand total is $" . number_format($total, 2) . ".</p>";
    ?>

    <div id="checkout">
        <form action="clearcart.php" method="post">
            <button type="submit" class="checkout">Empty Cart</button>
        </form>

        <form action="placeorder.php" method="post">
            <button type="submit" class="checkout">Order</button>
        </form>
    </div>


    <?php
    include 'footer.php';
    ?>

</body>

</html>