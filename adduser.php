<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Add user</title>
   <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
<div id="head"> 
       
       <?php
       include("header.php");
       include("menu.php");
       ?>
      
       </div>
    <?php
    //let user know this is good 
    if (isset($_SESSION['form_success']) && $_SESSION['form_success'] === true) {
        echo '<script type="text/javascript">
                window.onload = function () {
                    alert("You have successfully signed up for our email list!");
                }
              </script>';
        
        unset($_SESSION['form_success']);
    }
    ?>
    <!-- set up php to handle the form is info is not reqiered in one on the needed fields I have tried this a
 a few diffrent ways now leaving this note in for later projects refrence-->
 <div id="error">
    
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
 </div>
 <div id="title">
    <h1>Add User</h1>
</div>    
<div class="formadduser">
    <form action="adduseraction.php" method="post">
    <div>
            <label for="floginname">Please enter your first name:</label>
            <input type="text" pattern="^[A-Za-z]+$" name="floginname" id="floginname"
                   title="Only letters are allowed" required />
        </div>
        <div>
            <label for="lloginname">Please enter your last name:</label>
            <input type="text" pattern="^[A-Za-z]+$" name="lloginname" id="lloginname"
                   title="Only letters are allowed" required />
        </div>    
    <div>
            <label for="loginname">Please enter the desired username:</label>
            <input type="text" pattern="^[A-Za-z]+$" name="loginname" id="loginname"
                   title="Only letters are allowed" required />
        </div>
        <div>
            <label for="lpassword">Please enter your desired password:</label>
            <input type="password" name="lpassword" pattern="[A-Za-z0-9!@#$%^&*()_\-+=\[\]{}|;:'\,.<>?/\\~`]+$"
                   title="Only letters, numbers, and special characters are allowed" id="lpassword" required />
        </div>
        <div>
            <label for="lemail">Please enter your email address:</label>
            <input type="lemail" name="lemail" id="email" pattern="^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
                   title="Must be a valid email" required />
        </div>
        <div>
        <div>
                <label for="uright">User rights level:</label>
                <select id="uright" name="uright">
                    <option value="customer">Customer</option>
                    <option value="admin">Admin</option>
                    <option value="publisher">publisher</option>
                </select>
            </div>
        </div>
        <div>
            <input type="submit" value="Submit" />
        </div>
    </form>
</div>
 
    


        <?php 
        include 'footer.php'; 
        ?>
    </div>
</body>
</html>