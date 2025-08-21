<?php
$_host = "localhost";
$_user = "root";
$_pass = "";
$_dbname = "midterm";

$conn = new mysqli($_host, $_user, $_pass, $_dbname);

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
?>