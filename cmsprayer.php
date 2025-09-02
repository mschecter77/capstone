<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Prayer Request</title>
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
                    alert("You have successfully submited your prayer request.");
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
 <div id = "title">
 <h1>Schecter Inventory Prayer Request</h1>
    </div>    
 <div class="formprayer">
    <form action="prayeraction.php" method="post">
        <div>
            <label for="fname">Please enter your first name:</label>
            <input type="text" pattern="^[A-Za-z'-]+$" name="fname" id="fname"
             title="Only letters, apostrophes, and hyphens are allowed" required/>
        </div>
        <div>
            <label for="lname">Please enter your last name:</label>
            <input type="text" name="lname" pattern="^[A-Za-z'-]+$" title="Only letters, apostrophes, and hyphens are allowed"
              id="lname" required />
        </div>
        <div>
            <label for="email">Please enter your email address:</label>
            <input type="email" name="email" id="email" pattern="^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
            title="Must be a valid email" required />
            <div>
            <label for="request">Please enter request:</label>
            <input type="text" name="request" id="request" required />
        </div>
        </div>
        <div>
            <input type="submit" value="Submit" />
        </div>
        </form>
        
    </div>
    
</div>
 
    


        <?php 
        include 'footer.php'; 
        ?>
    </div>
</body>
</html>