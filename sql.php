<?php
//want most of the sql in here execpt for the action pages for update/delete leaving this here as a refrence for for final project
//refrences w3 schools as well as thing geek for examples of syntax
if (session_status() == PHP_SESSION_NONE) {

    session_start();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$servername = "MYSQL5050.site4now.net";
$username = "aae577_mschect";
$password = "Elijah0606!";
$dbname = "db_aae577_mschect";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$_SESSION['conn'] = $conn;

function getComments($conn)
{
    $sql = "SELECT id,name, title, commentdate, comments FROM comments ORDER BY commentdate DESC";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error executing query: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        echo "<table id = comments ><tr><th>Name</th><th>Title</th><th>Comment Date</th><th>Comment</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>" . htmlspecialchars($row["name"]) . "</td>
            <td>" . htmlspecialchars($row["title"]) . "</td>
            <td>" . htmlspecialchars($row["commentdate"]) . "</td>
            <td>" . htmlspecialchars($row["comments"]) . "</td>
            "//playing with this the disply and insert was easy enough but would like a better looking option for update and delete
                . "
            <td>
                        <a href='update.php?id=" . $row["id"] . "'>Update</a> |
                        <a href='del.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure?\");'>Delete</a>
                    </td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
}



function insertComment($conn, $name, $title, $comment)
{

    if (empty($name) || empty($title) || empty($comment)) {
        echo "All fields are required!";
        return;
    }

    //clean
    $name = htmlspecialchars(trim($name));
    $title = htmlspecialchars(trim($title));
    $comment = htmlspecialchars(trim($comment));


    $sql = "INSERT INTO comments (name, title, comments) VALUES (?, ?, ?)";
    $debug_sql = "INSERT INTO comments (name, title, comment) VALUES ('$name', '$title', '$comment')";
    echo "Executing SQL: " . $debug_sql . "<br>";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }


    $stmt->bind_param("sss", $name, $title, $comment);

    if ($stmt->execute()) {
        echo "Comment added successfully.";
    } else {
        echo "Error adding comment: " . $stmt->error;
    }

    $stmt->close();
}
function updateComment($conn, $id, $name, $title, $comment)
{
    $sql = "UPDATE comments SET name = ?, title = ?, comments = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sssi", $name, $title, $comment, $id);

    if ($stmt->execute()) {
        echo "Comment updated successfully.";
    } else {
        echo "Error updating comment: " . $stmt->error;
    }

    $stmt->close();
}

function deleteComment($conn, $id)
{
    $sql = "DELETE FROM comments WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Comment deleted successfully.";
    } else {
        echo "Error deleting comment: " . $stmt->error;
    }

    $stmt->close();
}




function createuser($conn, $name, $password, $email, $fname, $lname, $uright)
{

    if (empty($name) || empty($email) || empty($password) || empty($fname) || empty($lname) || empty($uright)) {
        echo "All fields are required!";
        return;
    }
    //check for valid email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address!";
        return;
    }

    // trying this to encypt the password so its not clear text in database.
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);


    $sql = "INSERT INTO login (username, password, email,fname,lname,rightlevel) VALUES (?, ?, ?,?,?,?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }


    $stmt->bind_param("ssssss", $name, $hashed_password, $email, $fname, $lname, $uright);

    if ($stmt->execute()) {
        echo "User added successfully.";
    } else {
        echo "Error adding user: " . $stmt->error;
    }


    $stmt->close();
}
function getusername($conn)
{
    $sql = "SELECT idlogin, username FROM db_aae577_mschect.login";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error executing query: " . $conn->error);
    }


    $usernames = [];

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $usernames[] = [
                'id' => $row['idlogin'],
                'username' => $row['username']
            ];
        }
    } else {
        echo "No results found.";
    }

    return $usernames;
}
function delusername($conn, $idlogin)
{
    $sql = "DELETE FROM db_aae577_mschect.login WHERE idlogin = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("i", $idlogin);

    if ($stmt->execute()) {
        echo "User deleted successfully.";
        $stmt->close();
        return true;
    } else {
        echo "Error deleting user: " . $stmt->error;
        $stmt->close();
        return false;
    }
}


function getpassword($conn, $username)
{

    $sql = "SELECT password FROM db_aae577_mschect.login WHERE username = ?";
    $stmt = $conn->prepare($sql);


    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }


    $stmt->bind_param("s", $username);


    $password = null;


    if ($stmt->execute()) {

        $stmt->bind_result($password);


        if ($stmt->fetch()) {
            $stmt->close();
            return $password;
        } else {
            $stmt->close();

            return false;
        }
    } else {
        echo "Error executing query: " . $stmt->error;
        $stmt->close();
        return false;
    }
}
function getrightlevel($conn, $username)
{

    $sql = "SELECT rightlevel FROM db_aae577_mschect.login WHERE username = ?";
    $stmt = $conn->prepare($sql);


    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }


    $stmt->bind_param("s", $username);


    $rightlevel = null;


    if ($stmt->execute()) {

        $stmt->bind_result($rightlevel);


        if ($stmt->fetch()) {
            $stmt->close();
            return $rightlevel;
        } else {
            $stmt->close();

            return false;
        }
    } else {
        echo "Error executing query: " . $stmt->error;
        $stmt->close();
        return false;
    }
}
//try to replace our products page with the info in DB this will also allow us to edit that page in the future
function getproducts($conn)
{
    $sql = "SELECT productid, productname,productdescr, productprice,imagelocation FROM products";
    $result = $conn->query($sql);

    if (!$result) {
        die("Error fetching products: " . $conn->error);
    }

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}
function additemTocart($conn, $userid, $productid, $quantity)
{
    $sql = "INSERT INTO cart (userid, productid, quantity) VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sii", $userid, $productid, $quantity);

    if ($stmt->execute()) {
        $stmt->close();
        return true;

    } else {
        $_SESSION['error'] = "Error adding item to cart: " . $stmt->error;
        $stmt->close();
        return false;
    }


}
function getCartItems($conn, $userid)
{
    $sql = "SELECT cart.productid, cart.quantity, products.productname, products.productprice, products.imagelocation
            FROM cart
            JOIN products ON cart.productid = products.productid
            WHERE cart.userid = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }

    $stmt->close();
    return $items;
}
function updatecartitem($conn, $username, $productid, $quantity)
{
    $sql = "UPDATE cart SET quantity = ? WHERE userid = ? AND productid = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }


    $stmt->bind_param("isi", $quantity, $username, $productid);

    if ($stmt->execute()) {
        $stmt->close();

        return true;
    } else {
        $_SESSION['error'] = "Error updating cart item: " . $stmt->error;

        $stmt->close();
        return false;
    }
}

function clearcart($conn, $userId)
{
    $sql = "DELETE FROM cart WHERE userid = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing SQL: " . $conn->error);
    }

    $stmt->bind_param("s", $userId);

    if (!$stmt->execute()) {
        die("Error executing SQL: " . $stmt->error);
    }

    $stmt->close();
}
function getcartid($conn, $userid)
{
    $sql = "SELECT cartid FROM cart WHERE userid = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("s", $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    $cartid = null;
    if ($row = $result->fetch_assoc()) {
        $cartid = $row['cartid'];
    }

    $stmt->close();
    return $cartid;
}

function orderitems($conn, $userid)
{

    $sqli = "INSERT INTO orders ( userid, productid, quantity) 
             SELECT  userid, productid, quantity FROM cart WHERE  userid = ?";
    $stmt = $conn->prepare($sqli);

    if ($stmt === false) {
        die("Error preparing SQL: " . $conn->error);
    }

    $stmt->bind_param("s", $userid);

    if (!$stmt->execute()) {
        die("Error executing SQL: " . $stmt->error);
    }


    $stmt->close();


    $sqld = "DELETE FROM cart WHERE userid = ?";
    $stmt = $conn->prepare($sqld);

    if ($stmt === false) {
        die("Error preparing SQL: " . $conn->error);
    }

    $stmt->bind_param("s", $userid);

    if (!$stmt->execute()) {
        die("Error executing SQL: " . $stmt->error);
    }


    $stmt->close();
}
function createproduct($conn, $prodname, $proddescr, $prodprice, $imagelocation)
{
    $sql = "insert into products (productname,productdescr,productprice,imagelocation)
Values (?,?,?,?)
 ON DUPLICATE KEY UPDATE productdescr = VALUES(productdescr), 
                                    productprice = VALUES(productprice), 
                                    imagelocation = VALUES(imagelocation)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing SQL: " . $conn->error);
    }
    $stmt->bind_param("ssds", $prodname, $proddescr, $prodprice, $imagelocation);
    if ($stmt->execute()) {
        echo "Product created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();



}

function delprod($conn, $prodid) {
    $sql = "DELETE FROM products WHERE productid = ?"; 
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error preparing SQL: " . $conn->error);
    }
    
    $stmt->bind_param("i", $prodid);
    
    if ($stmt->execute()) {
        echo "Product deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

function updateproduct($conn, $prodid, $proddescr, $prodprice, $imagelocation)
{
    $sql = "update  products set productdescr = ?,productprice =?,imagelocation =? where productid =?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing SQL: " . $conn->error);
    }
    $stmt->bind_param("sdsi", $proddescr, $prodprice, $imagelocation,$prodid);
    if ($stmt->execute()) {
        echo "Product created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();



}

function getpagecontent($conn, $sitepagecat) {
    $sql = "SELECT title, content FROM sitepages WHERE sitepagecat = ? order by sitepagesid desc";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error preparing SQL: " . $conn->error);
    }
    
    $stmt->bind_param("i", $sitepagecat);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        
        $pageContent = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $pageContent = array();
    }
    
    $stmt->close();
    return $pageContent;
}


function delpagecontent($conn, $sitepagecat, $title) {
    $sql = "DELETE FROM sitepages WHERE sitepagecat = ? AND title = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing SQL: " . $conn->error);
    }

    $stmt->bind_param("is", $sitepagecat, $title);

    if ($stmt->execute()) {
        echo "Page content deleted successfully!";
    } else {
        echo "Error deleting page content: " . $stmt->error;
    }

    $stmt->close();
}

function createpagecontent($conn, $sitepagecat, $title, $content)
{
    $sql = "INSERT INTO sitepages (sitepagecat, title, content)
            VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE 
                sitepagecat = VALUES(sitepagecat), 
                title = VALUES(title), 
                content = VALUES(content)";
                
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing SQL: " . $conn->error);
    }
    $stmt->bind_param("iss", $sitepagecat, $title, $content);
    if ($stmt->execute()) {
        echo "Page created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

function updatepagecont($conn, $titleup, $content,$title)
{
    $sql = "UPDATE sitepages SET title = ?, content = ? WHERE title = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sss", $titleup, $content, $title);

    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $_SESSION['error'] = "Error updating page item: " . $stmt->error;
        $stmt->close();
        return false;
    }
}
