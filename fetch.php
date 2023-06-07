<?php
// Assuming you have a MySQL database, adjust the following variables with your database credentials
$host = 'localhost';
$dbname = 'authentication';
$username_db = 'root';
$password_db = '';

// Create a connection to the database
$conn = new mysqli($host, $username_db, $password_db, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the form data
$email = $_GET["email"];
$password = $_GET["password"];

// Prepare and execute the SQL query to fetch the user information based on the provided email
$sql = "SELECT * FROM registration WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // User found, proceed with login
    // Redirect to the appropriate page or perform further actions
    header("Location: ./home.html");
} else {
    // User not found
    header("Location: ./index.php?error=user_not_found");
}

// Close the database connection
$conn->close();

?>
