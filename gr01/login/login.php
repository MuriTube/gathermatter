<?php
// Database configuration
$servername = "lbs.muri.io";
$username = "gr01db";
$password = "\$pcd2P";
$dbname = "gr01db";

// Get the form data
$username = $_POST['username'];
$password = $_POST['password'];

// Create a new mysqli instance
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    $response = array('success' => false, 'message' => 'Error: Unable to connect to the database.');
    error_log("Connection failed: " . $conn->connect_error); // Log the error
} else {
    // Prepare the SQL statement to check login credentials
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param('ss', $username, $password);

    // Execute the prepared statement
    $stmt->execute();

    // Fetch the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Login successful
        $response = array('success' => true);
    } else {
        // Login failed
        $response = array('success' => false, 'message' => 'Invalid username or password');
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();

// Return the response as JSON
echo json_encode($response);
?>
