<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database credentials
define('DB_HOST', 'localhost');  // Change if database is on a different server
define('DB_USER', 'root');
define('DB_PASS', 'abc');
define('DB_NAME', 'alimehbo_phpwebsite');

// Establish database connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input
    $full_name = htmlspecialchars(trim($_POST['user']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate inputs
    if (empty($full_name) || empty($email) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO contacts (full_name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $full_name, $email, $message);

    // Execute and check success
    if ($stmt->execute()) {
        echo "Your message has been sent successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connections
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
