<?php include 'database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Enter Student Info</h2>
    <form method="post">
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="number" name="attendance" placeholder="Attendance (0-10)" required><br>
        <input type="number" name="quiz" placeholder="Quiz (0-15)" required><br>
        <input type="number" name="midterm" placeholder="Midterm Exam (0-15)" required><br>
        <input type="number" name="final" placeholder="Final Exam (0-60)" required><br>
        <button type="submit" name="add">Add</button>
        <a href="view.php"><button type="button">View</button></a>
        <a href="delete.php"><button type="button">Delete</button></a>
        <a href="update.php"><button type="button">Update</button></a>
    </form>

    <?php
    if (isset($_POST['add'])) {
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

        $sql = "INSERT INTO studenttb (name, attendance, quiz, midterm, final, total, grade)
                VALUES ('$name', $att, $quiz, $mid, $final, $total, '$grade')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green;'>✅ Student added successfully!</p>";
        } else {
            echo "<p style='color:red;'>❌ Error: " . $conn->error . "</p>";
        }
    }
    ?>
</body>
</html>