
<?php
include 'database.php';

if (isset($_POST['update'])) {
    $id = (int)$_POST['id'];
    $name = $conn->real_escape_string($_POST['name']);
    $att = (int)$_POST['attendance'];
    $quiz = (int)$_POST['quiz'];
    $mid = (int)$_POST['midterm'];
    $final = (int)$_POST['final'];

    $total = $att + $quiz + $mid + $final;
    if ($total > 90) $grade = "A+";
    else if ($total >= 80) $grade = "B";
    else if ($total >= 70) $grade = "C";
    else if ($total >= 60) $grade = "D";
    else $grade = "F";

    $sql = "UPDATE studenttb SET 
        name='$name', 
        attendance=$att, 
        quiz=$quiz, 
        midterm=$mid, 
        final=$final, 
        total=$total, 
        grade='$grade' 
        WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $msg = "<p style='color:green;'>✅ Student updated successfully!</p>";
    } else {
        $msg = "<p style='color:red;'>❌ Error updating student: " . $conn->error . "</p>";
    }
} else {
    $msg = "";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color:#ffccd5;">
    <h2>All Student Results</h2>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Attendance</th><th>Quiz</th><th>Midterm</th><th>Final</th><th>Total</th><th>Grade</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM studenttb");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>" . htmlspecialchars($row['name']) . "</td>
                <td>{$row['attendance']}</td>
                <td>{$row['quiz']}</td>
                <td>{$row['midterm']}</td>
                <td>{$row['final']}</td>
                <td>{$row['total']}</td>
                <td>{$row['grade']}</td>
            </tr>";
        }
        ?>
    </table>

    <?php echo $msg; ?>

    <h3>Type Student Information to Update</h3>
    <form method="post">
        <input type="number" name="id" placeholder="ID to Update" required>
        <input type="text" name="name" placeholder="Name" required>
        <input type="number" name="attendance" placeholder="Attendance" required>
        <input type="number" name="quiz" placeholder="Quiz" required>
        <input type="number" name="midterm" placeholder="Midterm" required>
        <input type="number" name="final" placeholder="Final" required>
        <button type="submit" name="update">Update</button>
        <a href="index.php"><button type="button">Back to Add</button></a>
    </form>
</body>
</html>