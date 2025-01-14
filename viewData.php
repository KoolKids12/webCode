<?php
session_start();  // Start the session to access stored user information

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    echo "You must log in first.";
    exit;
}

$host = "65.24.35.108:3306";
$dbname = "schoolTeams";
$username = $_SESSION['username'];
$password = $_SESSION['password'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*
    $sql = "SELECT * FROM some_table";  // Replace with your actual table
    $stmt = $pdo->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<h1>Data from the database</h1>";
    echo "<table border='1'>";
    foreach ($results as $row) {
        echo "<tr>";
        foreach ($row as $column) {
            echo "<td>" . htmlspecialchars($column) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    */

    echo "Successfully logged in!";
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();

    sleep(4);

    Header("Location: /TeamFit-main/login.html:);
}
?>
