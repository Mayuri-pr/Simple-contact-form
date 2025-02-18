<?php
// Step 1: Database connection
$servername = "localhost"; // Your server
$username = "root";        // Your database username
$password = "";            // Your database password (if any)
$dbname = "contact_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Step 3: Get and sanitize user input
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Step 4: SQL query to insert data
    $query = "INSERT INTO `userinfodata`(`user`, `email`, `message`) VALUES ('$user', '$email', '$message')";

    // Step 5: Execute query and check for success
    if ($conn->query($query) === TRUE) {
        // Redirect to home page after successful submission
        header("Location: index.php"); // Adjust if your home page is elsewhere
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

// Step 6: Close the connection
$conn->close();
?>
