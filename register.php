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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL query to insert the data into the database
    $sql = "INSERT INTO registration (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>";
        echo "document.getElementById('myForm').reset();";
        echo "</script>";
        header("Location: login.php"); 
    } else {
        header("Location: index.php"); 
    }
}

// Close the database connection
$conn->close();
?>


