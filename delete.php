<?php
include 'database.php';

if (isset($_POST['delete'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $sql = "DELETE FROM studenttb WHERE name='$name'";

    if ($conn->query($sql) === TRUE) {
        $msg = "<p style='color:green;'>✅ Student deleted successfully!</p>";
    } else {
        $msg = "<p style='color:red;'>❌ Error deleting student: " . $conn->error . "</p>";
    }
} else {
    $msg = "";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Delete Student by Name</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Enter Name to Delete" required>
        <button type="submit" name="delete">Delete</button>
        <a href="index.php"><button type="button">Back</button></a>
    </form>
    <?php echo $msg; ?>
</body>
</html>
