<?php

if (session_status() == PHP_SESSION_NONE) {
   
    session_start();
}
// Get the current page name
$getcurrentPage = $_SERVER['SCRIPT_NAME']; // Having issues with it including the / going to try to remove it leaving this note in case it causes issues in the future
$pagename = str_replace('/', '', $getcurrentPage);


echo '<div id="footer">
    <a href="https://validator.w3.org/check?uri=http%3A%2F%2Fwww.mschecter.com%2F' . $pagename . '">
    <img src="https://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
    </a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" />
    </a>';

try {
    if (file_exists($pagename)) {
        echo "$pagename was last modified: " . date("F d Y H:i:s.", filemtime($pagename)) . ". Current time is " .
            $currentDateTime = date('Y-m-d H:i:s') . "  ";
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            // Using JavaScript call for logout confirmation
            echo '<button type="button" onclick="confirmLogout()">Log Out</button>';
        }
    }
} catch (Exception $e) {
    error_log($e->getMessage());
}
echo '</div>';
?>

<script>
    // Confirm user wants to log out
    function confirmLogout() {
        var confirmed = confirm("Are you sure you want to log out?");
        if (confirmed) {
            window.location.href = 'logout.php';
        }
    }
</script>