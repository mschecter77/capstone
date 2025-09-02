<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Shipping and Payment Information</title>
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

    <div class="orderinfo">
        <form id="orderForm" action="orderaction.php" method="post">
            <div>
                <label for="fname">Please enter your first name:</label>
                <input type="text" pattern="[A-Za-z'-]+" name="fname" id="fname"
                    title="Only letters, apostrophes, and hyphens are allowed" required />
            </div>
            <div>
                <label for="lname">Please enter your last name:</label>
                <input type="text" name="lname" pattern="[A-Za-z'-]+"
                    title="Only letters, apostrophes, and hyphens are allowed" id="lname" required />
            </div>
            <div>
                <label for="streetname">Please enter your street address:</label>
                <input type="text" name="streetname" id="streetname" required />
            </div>
            <div>
                <label for="cityname">Please enter your city:</label>
                <input type="text" name="cityname" id="cityname" required />
            </div>
            <div>
                <label for="statename">Please enter your state:</label>
                <input type="text" name="statename" id="statename" required />
            </div>
            <div>
                <label for="zipcode">Please enter your zip code:</label>
                <input type="text" name="zipcode" pattern="[0-9]{5}" title="Only 5-digit zip codes are allowed"
                    id="zipcode" required />
            </div>
            <div>
                <label for="cardnumber">Please enter your card number:</label>
                <input type="text" name="maskedCard" id="maskedCard" pattern=".{16,}"
                    title="Only 16-digit numbers are allowed" required />
                <input type="hidden" name="cardnumber" id="cardnumber" />
            </div>
            <div>
                <label for="cardexp">Please enter your card expiration date in mm/yyyy format:</label>
                <input type="text" name="cardexp" pattern="(0[1-9]|1[0-2])\/[0-9]{4}" title="Format should be mm/yyyy"
                    id="cardexp" required />
            </div>
            <div>
                <label for="cardsec">Please enter your card 3-digit security code:</label>
                <input type="password" name="cardsec" pattern="[0-9]{3}" title="Only 3-digit numbers are allowed"
                    id="cardsec" required />
            </div>
            <div>
                <label for="email">Please enter your email address:</label>
                <input type="email" name="email" id="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}"
                    title="Must be a valid email" required />
            </div>
            <div>
                <input type="submit" value="Submit" />
            </div>
        </form>
    </div>

    <script type="text/javascript">
        // hide all but the last 4 diggits refrenced https://ilikekillnerds.com/2020/05/how-to-get-last-4-digits-of-a-credit-card-number-in-javascript/ as well as w3schools
        

        document.getElementById('maskedCard').addEventListener('blur', function () {
            const maskedCardInput = document.getElementById('maskedCard');
            const actualCardInput = document.getElementById('cardnumber');
            const cardNumber = maskedCardInput.value;

            if (cardNumber.length === 16) {
                actualCardInput.value = cardNumber; 
                maskedCardInput.value = '*'.repeat(12) + cardNumber.slice(-4); 
            } else {
                alert("Please enter a valid 16-digit card number.");
                maskedCardInput.value = ""; 
                actualCardInput.value = "";
            }
        });
    </script>

    <?php
    include 'footer.php';
    ?>
</body>

</html>