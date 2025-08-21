<?php include 'database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>All Students</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
    <a href="index.php"><button type="button">Back to Add</button></a>
</body>
</html>
