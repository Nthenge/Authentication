<?php
$host = 'localhost';
$dbname = 'authentication';
$username_db = 'root';
$password_db = '';

$conn = new mysqli($host, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_GET["email"];
$password = $_GET["password"];

// Validate and sanitize user input
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

// Hash the password (you may need to adjust the hashing algorithm based on your requirements)
$hashedPassword = hash('sha256', $password);

// Prepare and execute the SQL query using prepared statements
$sql = "SELECT * FROM registration WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $hashedPassword);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // User found, proceed with login
    header("Location: ./home.html");
} else {
    // User not found
    header("Location: ./index.php?error=user_not_found");
}

$stmt->close();
$conn->close();
?>

