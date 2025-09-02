<ol id="menu_cms">

    <?php
    session_start();
    $cmsmenu = array(
        "Home" => "SchecterInventory.php",
        "About Us" => "cmsAboutus.php",
        "Mailing List" => "cmsmailinglist.php",
        "Products" => "cmsproducts.php",
        "Mission" => "cmsmission.php",
        "Meet the Team" => "cmsteam.php",
        "Contact Us" => "cmscontactus.php",
        "Did You Know" => "cmsfacts.php",
        "Why Us" => "cmschoose.php",
        "Reviews" => "cmsreviews.php",
        "Vendors" => "cmsvendors.php",
        "Employment" => "cmsemployment.php",
        "Support" => "cmssupport.php",
        "Prayer" => "cmsprayer.php",
        "Location" => "cmslocation.php"
    );

    // Display extra pages depending on rights
    if (isset($_SESSION["rightlevel"]) && $_SESSION["rightlevel"] == "admin") {
        $cmsmenu["PHPinfo"] = "cmsphpinfo.php";
        $cmsmenu["User Admin"] = "useradmin.php";
    }

    // Check if user is either admin or publisher 
    if (isset($_SESSION["rightlevel"]) && ($_SESSION["rightlevel"] == "admin" || $_SESSION["rightlevel"] == "publisher")) {
        $cmsmenu["Modify Employee Information"] = "Arrays.php";
        $cmsmenu["Modify Product Catalog"] = "modcat.php";
        $cmsmenu["Modify Main Page"] = "modmainpage.php";

    }

    foreach ($cmsmenu as $menuText => $menuLink) {
        echo "<li><a href='$menuLink'>$menuText</a></li>";
    }
    ?>

</ol>