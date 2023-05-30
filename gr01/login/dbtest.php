<?php
// Database configuration
$servername = "lbs.muri.io";
$dbUsername = "gr01db";
$dbPassword = "\$pcd2P";
$dbname = "gr01db";

// Get the form data
$username = "emirhan";
$password = "wasserhahn";
$email = "wossa@han.com";

// Debugging statements
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Create a new mysqli instance
 $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    $response = array('success' => false, 'message' => 'Error: Unable to connect to the database.');
    error_log("Connection failed: " . $conn->connect_error); // Log the error
    echo "Connection failed: " . $conn->connect_error; // Display the error
} else {
    // Prepare the SQL statement to insert the user information
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $username, $password, $email);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Registration successful
        $response = array('success' => true);
        echo "Registration successful"; // Display success message
    } else {
        // Registration failed
        $response = array('success' => false, 'message' => 'Error: Unable to insert data into the database. ' . $stmt->error);
        error_log("Insertion failed: " . $stmt->error); // Log the error
        echo "Insertion failed: " . $stmt->error; // Display the error
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();

// Return the response as JSON
echo json_encode($response);
?>
