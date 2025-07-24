<?php
// DB connection settings
$servername = "localhost";
$username = "root"; // default for XAMPP
$password = "";     // default for XAMPP
$dbname = "dubomartialarts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Only handle POST requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Sanitize inputs
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $message = trim($_POST['message']);

  // Basic validation
  if (empty($name) || empty($email) || empty($message)) {
    echo "Please fill in all fields.";
    exit;
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit;
  }

  // Prepare statement to avoid SQL injection
  $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $message);

  if ($stmt->execute()) {
    echo "Thank you for contacting us! We will get back to you soon.";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();

} else {
  echo "Invalid request.";
}
?>
