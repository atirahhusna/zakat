<?php
session_start();

// Check if form submitted and calculate Zakat if necessary
if (isset($_POST['calculate'])) {
    // Retrieve inputs from form
    $price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
    $number = isset($_POST['number']) ? intval($_POST['number']) : 0;

    // Perform validation if needed
    if ($price <= 0 || $number <= 0) {
        // Handle invalid input scenario, maybe redirect back to index.php with an error message
        header("Location: index.php?error=invalid_input");
        exit;
    }

    // Calculate Zakat fitrah
    $zakatFitrah = $price * $number;

    // You can save the result in session or display it directly
    $_SESSION['zakatFitrah'] = $zakatFitrah;

    // Redirect to a thank you or results page
    header("Location: fitrah.php");
    exit;
} else {
    // Redirect back to index.php if accessed directly without form submission
    header("Location: fitrah.php");
    exit;
}
?>
