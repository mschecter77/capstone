<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Get</title>
   <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>

<!-- set up php to handle the form is info is not reqiered in one on the needed fields I have tried this a
 a few diffrent ways now leaving this note in for later projects refrence-->
 <div id="error">
    <p>
        <?php 
        //check for error this is sent back from action [age ]
            if (isset($_GET['error'])) {
                echo htmlspecialchars($_GET['error']);
            }
        ?>
    </p>
</div>
 
  


    <div id="header"> 
        <a href="http://mschecter.com">Home</a>
 
    </div>
    <!-- w3 schools was used as refrence for form syntax https://www.w3schools.com/php/php_forms.asp -->

    <div class="form">
        <form action="getaction.php" method="get">
            <div>
                <p>Please note all fields are required except for comments.</p>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" />
             
            </div>
            
            <div>
                <img src="car.jpg" alt="car" />
            </div>
            <p>How would you rate this car on looks from 1 to 5 with 5 being the best</p>
            <div class="radio-group">
                <input type="radio" id="ratecar1" name="ratecar" value="1" />
                <label for="ratecar1">1</label>
                <input type="radio" id="ratecar2" name="ratecar" value="2" />
                <label for="ratecar2">2</label>
                <input type="radio" id="ratecar3" name="ratecar" value="3" />
                <label for="ratecar3">3</label>
                <input type="radio" id="ratecar4" name="ratecar" value="4" />
                <label for="ratecar4">4</label>
                <input type="radio" id="ratecar5" name="ratecar" value="5" />
                <label for="ratecar5">5</label>
                
            </div>

            <p>How would you rate the color from 1 to 5 with 5 being the best</p>
            <div class="radio-group">
                <input type="radio" id="ratecolor1" name="ratecarcolor" value="1" />
                <label for="ratecolor1">1</label>
                <input type="radio" id="ratecolor2" name="ratecarcolor" value="2" />
                <label for="ratecolor2">2</label>
                <input type="radio" id="ratecolor3" name="ratecarcolor" value="3" />
                <label for="ratecolor3">3</label>
                <input type="radio" id="ratecolor4" name="ratecarcolor" value="4" />
                <label for="ratecolor4">4</label>
                <input type="radio" id="ratecolor5" name="ratecarcolor" value="5" />
                <label for="ratecolor5">5</label>
                
            </div>
            <p>This car MSRP is $45,000. How would you rate the value from 1 to 5 with 5 being the best</p>
            <div class="radio-group">
                <input type="radio" id="carvalue1" name="ratecarvalue" value="1" />
                <label for="carvalue1">1</label>
                <input type="radio" id="carvalue2" name="ratecarvalue" value="2" />
                <label for="carvalue2">2</label>
                <input type="radio" id="carvalue3" name="ratecarvalue" value="3" />
                <label for="carvalue3">3</label>
                <input type="radio" id="carvalue4" name="ratecarvalue" value="4" />
                <label for="carvalue4">4</label>
                <input type="radio" id="carvalue5" name="ratecarvalue" value="5" />
                <label for="carvalue5">5</label>
                
            </div>

            <p>Does the car make you feel happy? How would you rate the happiness from 1 to 5 with 5 being the best</p>
            <div class="radio-group">
                <input type="radio" id="carhappy1" name="ratecarexcitement" value="1" />
                <label for="carhappy1">1</label>
                <input type="radio" id="carhappy2" name="ratecarexcitement" value="2" />
                <label for="carhappy2">2</label>
                <input type="radio" id="carhappy3" name="ratecarexcitement" value="3" />
                <label for="carhappy3">3</label>
                <input type="radio" id="carhappy4" name="ratecarexcitement" value="4" />
                <label for="carhappy4">4</label>
                <input type="radio" id="carhappy5" name="ratecarexcitement" value="5" />
                <label for="carhappy5">5</label>
                
            </div>

            <p>How likely are you to buy this car? Rate this from 1 to 5 with 5 being the most likely</p>
            <div class="radio-group">
                <input type="radio" id="carbuy1" name="ratecarbuy" value="1" />
                <label for="carbuy1">1</label>
                <input type="radio" id="carbuy2" name="ratecarbuy" value="2" />
                <label for="carbuy2">2</label>
                <input type="radio" id="carbuy3" name="ratecarbuy" value="3" />
                <label for="carbuy3">3</label>
                <input type="radio" id="carbuy4" name="ratecarbuy" value="4" />
                <label for="carbuy4">4</label>
                <input type="radio" id="carbuy5" name="ratecarbuy" value="5" />
                <label for="carbuy5">5</label>
                
            </div>
            <div>
            <img src="atv.jpg" alt="atv" />
            </div>
            
            <p>How would you rate this atv on looks from 1 to 5 with 5 being the best</p>
            <div class="radio-group">
                <input type="radio" id="atvrate1" name="rateatv" value="1"  />
                <label for="atvrate1">1</label>
           
                <input type="radio" id="atvrate2" name="rateatv" value="2" />
                <label for="atvrate2">2</label>
          
                <input type="radio" id="atvrate3" name="rateatv" value="3" />
                <label for="atvrate3">3</label>
          
                <input type="radio" id="atvrate4" name="rateatv" value="4" />
                <label for="atvrate4">4</label>
           
                <input type="radio" id="atvrate5" name="rateatv" value="5" />
                <label for="atvrate5">5</label>
            </div>

            <p>How would you rate the color from 1 to 5 with 5 being the best</p>
            <div class="radio-group">
                <input type="radio" id="atvcolor1" name="rateatvcolor" value="1" />
                <label for="atvcolor1">1</label>
                <input type="radio" id="atvcolor2" name="rateatvcolor" value="2" />
                <label for="atvcolor2">2</label>
                <input type="radio" id="atvcolor3" name="rateatvcolor" value="3" />
                <label for="atvcolor3">3</label>
                <input type="radio" id="atvcolor4" name="rateatvcolor" value="4" />
                <label for="atvcolor4">4</label>
                <input type="radio" id="atvcolor5" name="rateatvcolor" value="5" />
                <label for="atvcolor5">5</label>
            </div>

            <p>This atv MSRP is $19,999. How would you rate the value from 1 to 5 with 5 being the best</p>
            <div class="radio-group">
                <input type="radio" id="atvvalue1" name="rateatvvalue" value="1" />
                <label for="atvvalue1">1</label>
                <input type="radio" id="atvvalue2" name="rateatvvalue" value="2" />
                <label for="atvvalue2">2</label>
                <input type="radio" id="atvvalue3" name="rateatvvalue" value="3" />
                <label for="atvvalue3">3</label>
                <input type="radio" id="atvvalue4" name="rateatvvalue" value="4" />
                <label for="atvvalue4">4</label>
                <input type="radio" id="atvvalue5" name="rateatvvalue" value="5" />
                <label for="atvvalue5">5</label>
            </div>

            <p>Does the atv make you feel happy? How would you rate the happiness from 1 to 5 with 5 being the best</p>
            <div class="radio-group">
                <input type="radio" id="atvhappy1" name="rateatvexcitement" value="1" />
                <label for="atvhappy1">1</label>
                <input type="radio" id="atvhappy2" name="rateatvexcitement" value="2" />
                <label for="atvhappy2">2</label>
                <input type="radio" id="atvhappy3" name="rateatvexcitement" value="3" />
                <label for="atvhappy3">3</label>
                <input type="radio" id="atvhappy4" name="rateatvexcitement" value="4" />
                <label for="atvhappy4">4</label>
                <input type="radio" id="atvhappy5" name="rateatvexcitement" value="5" />
                <label for="atvhappy5">5</label>
            </div>

            <p>How likely are you to buy this atv? Rate this from 1 to 5 with 5 being the most likely</p>
            <div class="radio-group">
                <input type="radio" id="atvbuy1" name="rateatvbuy" value="1" />
                <label for="atvbuy1">1</label>
                <input type="radio" id="atvbuy2" name="rateatvbuy" value="2" />
                <label for="atvbuy2">2</label>
                <input type="radio" id="atvbuy3" name="rateatvbuy" value="3" />
                <label for="atvbuy3">3</label>
                <input type="radio" id="atvbuy4" name="rateatvbuy" value="4" />
                <label for="atvbuy4">4</label>
                <input type="radio" id="atvbuy5" name="rateatvbuy" value="5" />
                <label for="atvbuy5">5</label>
            </div>
            <div>
            <img src="boat.jpg" alt="boat"/>
            </div>
            
            <p>How would you rate this boat on looks from 1 to 5 with 5 being the best</p>
            <div class="radio-group">
                <input type="radio" id="boatrate1" name="rateboat" value="1" />
                <label for="boatrate1">1</label>
                <input type="radio" id="boatrate2" name="rateboat" value="2" />
                <label for="boatrate2">2</label>
                <input type="radio" id="boatrate3" name="rateboat" value="3" />
                <label for="boatrate3">3</label>
                <input type="radio" id="boatrate4" name="rateboat" value="4" />
                <label for="boatrate4">4</label>
                <input type="radio" id="boatrate5" name="rateboat" value="5" />
                <label for="boatrate5">5</label>
            </div>

            <p>How would you rate the color from 1 to 5 with 5 being the best</p>
            <div class="radio-group">
                <input type="radio" id="boatcolor1" name="rateboatcolor" value="1" />
                <label for="boatcolor1">1</label>
                <input type="radio" id="boatcolor2" name="rateboatcolor" value="2" />
                <label for="boatcolor2">2</label>
                <input type="radio" id="boatcolor3" name="rateboatcolor" value="3" />
                <label for="boatcolor3">3</label>
                <input type="radio" id="boatcolor4" name="rateboatcolor" value="4" />
                <label for="boatcolor4">4</label>
                <input type="radio" id="boatcolor5" name="rateboatcolor" value="5" />
                <label for="boatcolor5">5</label>
            </div>

            <p>This boat MSRP is $10,999. How would you rate the value from 1 to 5 with 5 being the best</p>
            <div class="radio-group">
                <input type="radio" id="boatvalue1" name="rateboatvalue" value="1" />
                <label for="boatvalue1">1</label>
                <input type="radio" id="boatvalue2" name="rateboatvalue" value="2" />
                <label for="boatvalue2">2</label>
                <input type="radio" id="boatvalue3" name="rateboatvalue" value="3" />
                <label for="boatvalue3">3</label>
                <input type="radio" id="boatvalue4" name="rateboatvalue" value="4" />
                <label for="boatvalue4">4</label>
                <input type="radio" id="boatvalue5" name="rateboatvalue" value="5" />
                <label for="boatvalue5">5</label>
            </div>

            <p>Does the boat make you feel happy? How would you rate the happiness from 1 to 5 with 5 being the best</p>
            <div class="radio-group">
                <input type="radio" id="boathappy1" name="rateboatexcitement" value="1" />
                <label for="boathappy1">1</label>
                <input type="radio" id="boathappy2" name="rateboatexcitement" value="2" />
                <label for="boathappy2">2</label>
                <input type="radio" id="boathappy3" name="rateboatexcitement" value="3" />
                <label for="boathappy3">3</label>
                <input type="radio" id="boathappy4" name="rateboatexcitement" value="4" />
                <label for="boathappy4">4</label>
                <input type="radio" id="boathappy5" name="rateboatexcitement" value="5" />
                <label for="boathappy5">5</label>
            </div>

            <p>How likely are you to buy this boat? Rate this from 1 to 5 with 5 being the most likely</p>
            <div class="radio-group">
                <input type="radio" id="boatbuy1" name="rateboatbuy" value="1" />
                <label for="boatbuy1">1</label>
                <input type="radio" id="boatbuy2" name="rateboatbuy" value="2" />
                <label for="boatbuy2">2</label>
                <input type="radio" id="boatbuy3" name="rateboatbuy" value="3" />
                <label for="boatbuy3">3</label>
                <input type="radio" id="boatbuy4" name="rateboatbuy" value="4" />
                <label for="boatbuy4">4</label>
                <input type="radio" id="boatbuy5" name="rateboatbuy" value="5" />
                <label for="boatbuy5">5</label>
            </div>
            <div>
                <label for="comments">Comments:</label>
                <input type="text" name="comments" id="comments" />
            </div>
            <div>
                <input type="submit" value="Submit" />
            </div>
        </form>
        </div>
   
   
  
    <div id="footer"> 
    <a href="https://validator.w3.org/check?uri=http%3A%2F%2Fwww.mschecter.com%2Fget.php">
    <img src="https://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" />
    </a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="Valid CSS!" />
    </a>
        <?php 
        include 'footer.php'; 
        ?>
    </div>
</body>
</html>