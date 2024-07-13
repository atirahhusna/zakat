<?php
session_start();

// Perform calculations if form is submitted
if (isset($_POST['calculate'])) {
    // Retrieve form data
    $price = isset($_POST['price']) ? $_POST['price'] : 0;
    $number = isset($_POST['number']) ? $_POST['number'] : 0;

    // Perform your calculation here
    // Example calculation (adjust as per your actual logic)
    $result = $price * $number;

    // Store result in session for display on next page
    $_SESSION['calculation_result'] = $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zakat Calculator</title>

    <!-- External Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="styles.css" rel="stylesheet" />

    <!-- Font Awesome Library -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="layoutSidenav">
        <?php include('sidebar.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container mt-4">
                    <!-- Breadcrumbs -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Zakat Calculator</a>
                        </li>
                        <li class="breadcrumb-item active">Zakat fitrah</li>
                    </ol>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    Zakat fitrah
                                </div>
                                <div class="card-body">
                                    <!-- Add User Form -->
                                    <form method="POST" action="fitrah.php">
                                        <!-- Price Rate of Rice Field -->
                                        <div class="form-group mb-3">
                                            <label for="price">Price Rate of Rice</label>
                                            <select class="form-control" id="price" name="price" required>
                                                <option value="">Select price rate</option>
                                                <option value="7">RM 7.00</option>
                                                <option value="10">RM 10.00</option>
                                            </select>
                                        </div>
                                        <!-- Number of Dependents Field -->
                                        <div class="form-group mb-3">
                                            <label for="number">Number of dependents</label>
                                            <input type="number" class="form-control" id="number" name="number">
                                        </div>
                                        <!-- Submit and Reset Buttons -->
                                        <button type="submit" name="calculate" class="btn btn-primary">Calculate</button>
                                        <button type="reset" class="btn btn-light">Reset</button>
                                    </form>
                                    <!-- End Form -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-4">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        Result
                                    </div>
                                    <div class="card-body">
                                        <p>Total zakat fitrah you have to pay: RM<?php echo isset($_SESSION['calculation_result']) ? $_SESSION['calculation_result'] : ''; ?></p>
                                        <?php if (isset($_SESSION['calculation_result'])): ?>
                                            <form method="POST" action="zakatPayment.php">
                                                <button type="submit" name="add_to_cart" class="btn btn-success">Pay Now</button>
                                            </form>
                                            <?php unset($_SESSION['calculation_result']); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-container">
                        <div class="text-title">Tunaikan Kewajipan Zakat Anda</div>
                        <div class="text-subtitle">"Dan dirikanlah kamu akan sembahyang dan keluarkanlah zakat, dan rukuklah kamu semua (berjemaah) bersama-sama orang-orang yang rukuk."</div>
                        <div class="text-quote">Al-Baqarah: 43</div>
                    </div>
                </div>
            </main>
            <?php
            // Include footer and scripts
            include('footer.php');
            include('scripts.php');
            ?>
        </div>
    </div>
</body>

</html>
