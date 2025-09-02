<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Login CMS</title>
    <link rel="stylesheet" href="styles.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body>
    <?php
    //redirect if already logged in to keep logged in users from seeing the login screen 
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {

        header("Location: SchecterInventory.php");
        exit();
    }
    ?>
    <!-- set up php to handle the form is info is not reqiered in one on the needed fields I have tried this a
 a few diffrent ways now leaving this note in for later projects refrence-->
    <?php
    //check for error this is sent back from action page   
    //changing to jscript to be a little cleaner on the messages
    if (isset($_SESSION['error'])) {
        $error = htmlspecialchars($_SESSION['error']);
        echo "<script type='text/javascript'>
            window.onload = function () {
                alert('$error');
            };
          </script>";
        unset($_SESSION['error']);
    }
    //check for messages from the session 
    if (isset($_SESSION['message'])) {
        $message = htmlspecialchars($_SESSION['message']);
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




    <div id="header">
        <a href="http://mschecter.com">Home</a>




    </div>
    <div id="title">
        <h1>Please log in for access to Schecter Inventory</h1>
    </div>

    <div class="form_login">
        <form action="loginaction.php" method="post">
            <div>
                <label for="username">Please input user name:</label>
                <input type="text" name="username" id="username" />
            </div>
            <div>
                <!-- per our instructor https://medium.com/@miguelznunez/html-css-javascript-how-to-show-hide-password-using-the-eye-icon-27f033bf84ad  -->
                <label for="">Please input password:</label>
                <input type="password" name="password" id="password" />
                <i class="fa-solid fa-eye" id="eye"></i>
            </div>
            <div></div>
            <div>
                <input type="submit" value="Submit" />
            </div>
        </form>
    </div>
    <script type="text/javascript">
        // adding from note by teacher
        const passwordInput = document.querySelector("#password")
        const eye = document.querySelector("#eye")
        eye.addEventListener("click", function () {
            this.classList.toggle("fa-eye-slash")
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
            passwordInput.setAttribute("type", type)
        })


    </script>

    <?php
    include 'footer.php';
    ?>
    </div>
</body>

</html>