<?php
// Database connection details
$host = 'localhost';
$user = 'root';  // Default XAMPP MySQL username
$password = '';  // Default XAMPP MySQL password (empty)
$dbname = 'contact_info';  // Database name

// Connect to MySQL database
$conn = new mysqli($host, $user, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission (POST request)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];  // Get email from form

    // SQL query to insert data into the 'clients' table
    $sql = "INSERT INTO clients (email) VALUES ('$email')";

    // Execute the query and check if it was successful
    if ($conn->query($sql) === TRUE) {
        // If successful, show a confirmation message and redirect back to the index page
        echo "<script>alert('Thank you for submitting your email!'); window.location.href = 'index.html';</script>";
    } else {
        // If an error occurs, show an error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
