<?php
session_start();
include('sql.php');
$conn = $_SESSION['conn'];

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    
    $sql = "SELECT name, title, comments FROM comments WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($name, $title, $comment);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "No comment selected for update.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $comment = $_POST['comment'];

    updateComment($conn, $id, $name, $title, $comment);
    header("Location: comments.php");
    exit();
}
?>

<form method="POST" action="update.php?id=<?php echo $id; ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>" required><br>

    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title); ?>" required><br>

    <label for="comment">Comment:</label>
    <textarea name="comment" id="comment" required><?php echo htmlspecialchars($comment); ?></textarea><br>

    <input type="submit" value="Update Comment">
</form>