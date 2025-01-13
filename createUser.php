<?php
// Database connection details
$host = "65.24.35.108:3306";
$dbname = "schoolTeams";  // This is your current database
$adminUsername = "WebApp";  // Use an account with CREATE USER privilege
$adminPassword = "BPAteam123";

try {
    // Establish a connection to the MySQL server
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $adminUsername, $adminPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the form data was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newUser = $_POST["username"];
        $newPassword = $_POST["password"];  // Do not hash this as MySQL handles password hashing

        // SQL to create a new MySQL user
        $createUserSQL = "CREATE USER :username@'%' IDENTIFIED BY :password";
        $createStmt = $pdo->prepare($createUserSQL);
        $createStmt->bindParam(':username', $newUser);
        $createStmt->bindParam(':password', $newPassword);

        // Execute the CREATE USER command
        $createStmt->execute();
        // SQL to grant privileges to the new user
        $grantPrivilegesSQL = "GRANT ALL PRIVILEGES ON $dbname.* TO :username@'%'";  // Adjust privileges as needed
        $grantStmt = $pdo->prepare($grantPrivilegesSQL);
        $grantStmt->bindParam(':username', $newUser);
        $grantStmt->execute();

        echo "MySQL user account '$newUser' created successfully!";

        header("Location: /TeamFit-main/Coach/home.html");
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
