<?php
session_start();
include ('dbconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_user'])) {
    // Handle form submission
    $name = $_POST['name'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Remember to hash this for security

    // Check if email already exists
    $checkQuery = "SELECT COUNT(*) FROM user WHERE email = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->bind_result($count);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($count > 0) {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Error: Email already exists.</div>';
        header("Location: register.php");
        exit();
    }

    // Insert new user
    $query = "INSERT INTO user (name, email, phoneNumber, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $name, $email, $phoneNumber, $password);

    if ($stmt->execute()) {
        $_SESSION['message'] = '<div class="alert alert-success" role="alert">Registration successful!</div>';
        // After successful registration, store the user's name in the session
        $_SESSION['name'] = $name; // $name should be the variable holding the user's name from the registration form
        header("Location: register.php");
        exit();
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Error: ' . $stmt->error . '</div>';
        header("Location: register.php");
        exit();
    }

    $stmt->close();
} else {
    // Redirect to registration form if accessed directly without submission
    header("Location: register.php");
    exit();
}
?>