<?php
session_start();  // Start the session to store user information

$host = "65.24.35.108:3306";
$dbname = "schoolTeams";

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];  // Username from the form input
        $password = $_POST["password"];  // Password from the form input

        // Establish connection using provided credentials
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Store connection details in the session
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        echo "Login successful! Redirecting...";
         header("Location: /TeamFit-main/Coach/home.html");  // Redirect to the data viewing page
        exit;
    }
} catch (PDOException $e) {

    echo "Database error: " . $e->getMessage();

    sleep(4);

    Header("Location: /TeamFit-main/failedLog.html");

}
?>
