<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
require_once "config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$course = $_POST['course'];
$batchTime = $_POST['batch_time'];

$sql = "SELECT * FROM staff WHERE 1";

if (!empty($course)) {
    $sql .= " AND course = '$course'";
}

if (!empty($batchTime)) {
    $sql .= " AND batch_time = '$batchTime'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['staff_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['course'] . "</td>";
        echo "<td>" . $row['batch_time'] . "</td>";
        echo "<td>" . $row['class'] . "</td>";
        echo "<td>" . $row['section'] . "</td>";
        echo "<td>" . $row['details'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No data found</td></tr>";
}

$conn->close();
?>
