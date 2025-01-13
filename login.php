<?php
// Database connection details
$host = "65.24.35.108:3306";
$dbname = "schoolTeams";

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];  // Username from the form input
        $password = $_POST["password"];  // Password from the form input

        // Establish connection using provided credentials
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Login successful! You are connected to the database as '$username'.";
        header("Location: /TeamFit-main/Coach/home.html");
        exit;
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
