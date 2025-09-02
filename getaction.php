<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <title>Get Results</title>
  <link rel="stylesheet" href="styles.css" type="text/css" />
</head>

<body>


  <div id="header">
    <a href="http://mschecter.com">Home</a>

  </div>


  <?php include("getdatahandling.php"); ?>
  <p>Thank you for taking our survey <?php echo htmlspecialchars($_GET["name"]); ?></p>

  <?php
  //check for comments and print them if they are there 
  if (!empty($_GET["comments"]) && isset($_GET["comments"])) {
    echo "You commented: " . htmlspecialchars($_GET["comments"]);
  }
  ?>
<table id = "results">
  <tr>
    <th> </th> 
    <th>Looks</th>
    <th>Color</th>
    <th>Value</th> 
    <th>Happiness</th>   
    <th>Likely to Buy</th>  
  </tr>
  <tr>
            <th>Car</th>
            <td><?php echo $_GET["ratecar"]?></td>
            <td><?php echo $_GET["ratecarcolor"]?></td>
            <td><?php echo $_GET["ratecarvalue"]?></td>
            <td><?php echo $_GET["ratecarexcitement"]?></td>
            <td><?php echo $_GET["ratecarbuy"]?></td>

        </tr>
        <tr>
            <th>ATV</th>
            <td><?php echo $_GET["rateatv"]?></td>
            <td><?php echo $_GET["rateatvcolor"]?></td>
            <td><?php echo $_GET["rateatvvalue"]?></td>
            <td><?php echo $_GET["rateatvexcitement"]?></td>
            <td><?php echo $_GET["rateatvbuy"]?></td>
        </tr>
        <tr>
            <th>Boat</th>
            <td><?php echo $_GET["rateboat"]?></td>
            <td><?php echo $_GET["rateboatcolor"]?></td>
            <td><?php echo $_GET["rateboatvalue"]?></td>
            <td><?php echo $_GET["rateboatexcitement"]?></td>
            <td><?php echo $_GET["rateboatbuy"]?></td>
        </tr>
</table>

  <div id="footer">
    <a href="https://validator.w3.org/check?uri=http%3A%2F%2Fwww.mschecter.com%2Fgetaction.php">
      <img src="https://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
    </a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
      <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss"
        alt="Valid CSS!" />
    </a>
    <?php include 'footer.php'; ?>
  </div>
</body>

</html>