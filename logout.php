<?php
//putting this here since I couldnt get this to work in line on the logout button. 
session_start();
session_unset();    
session_destroy();  


header("Location: login.php");
exit();
