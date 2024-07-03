<?php
session_start();
include ('dbconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_payment'])) {
    // Handle form submission
    $paymentAmount = $_POST['paymentAmount'];
    $paymentMethod = $_POST['paymentMethod'];
    $zakatType = $_POST['zakatType'];
    $paymentDate = date('Y-m-d'); // Assuming the payment date is the current date

    // Get the user ID from the session
    if (isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Error: User is not logged in.</div>';
        header("Location: login.php");
        exit();
    }

    // Validate required fields
    if (empty($paymentAmount) || empty($paymentMethod) || empty($zakatType)) {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Error: All fields are required.</div>';
        header("Location: payment_form.php");
        exit();
    }

    // Insert new payment
    $query = "INSERT INTO zakatPayment (paymentAmount, paymentMethod, zakatType, paymentDate, userID) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $paymentAmount, $paymentMethod, $zakatType, $paymentDate, $userID);

    if ($stmt->execute()) {
        $_SESSION['message'] = '<div class="alert alert-success" role="alert">Payment successful!</div>';
        header("Location: zakatPayment.php");
        exit();
    } else {
        $_SESSION['message'] = '<div class="alert alert-danger" role="alert">Error: ' . $stmt->error . '</div>';
        header("Location: zakatPayment.php");
        exit();
    }

    $stmt->close();
} else {
    // Redirect to payment form if accessed directly without submission
    header("Location: zakatPayment.php");
    exit();
}
?>