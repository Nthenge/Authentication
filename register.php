<?php
$host = 'localhost';
$dbname = 'authentication';
$username_db = 'root';
$password_db = '';

$conn = new mysqli($host, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate and sanitize user input
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL query using prepared statements
    $sql = "INSERT INTO registration (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $hashedPassword);
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        // Success, redirect to login page
        header("Location: /login.php");
    } else {
        // Failed, redirect to index page or display an error message
        header("Location: ./index.php");
    }

    $stmt->close();
}

$conn->close();
?>



