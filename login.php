<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "dubomartialarts");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_name'] = $user['full_name'];
                $_SESSION['user_id'] = $user['id'];
                header("Location: index.php");
                exit;
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "User not found.";
        }

        $stmt->close();
    } else {
        echo "Failed to prepare statement.";
    }
} else {
    echo "Please provide email and password.";
}

$conn->close();
?>
