<?php
session_start();
// Perform calculations
if(isset($_POST['calculate'])) {
    // Retrieve form data
    $price = $_POST['price'];
    $number = $_POST['number'];

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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sign Up</title>

    <!-- External Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="styles.css" rel="stylesheet" />

    <!-- Font Awesome Library -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

 <div id="layoutSidenav">
        <?php
        // Include sidebar
        include('sidebar.php');
        ?>
        <div id="layoutSidenav_content">
            <main>
            

<div class="container mt-4">
    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">zakat calculator</a>
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
                         <label for="price">Price Rate of Rice,</label>
                         RM<input type="number" step="0.01" required class="form-control" id="price" name="price" placeholder="Enter price rate (e.g., 10.50)">
                    </div>
                      
                        <!-- Phone Number Field -->
                        <div class="form-group mb-3">
                            <label for="number"> Number of dependents</label>
                            <input type="number" class="form-control" id="number" name="number">
                        </div>
                       
                        <!-- Submit and Reset Buttons -->
                        <button type="submit" name="calculate" class="btn btn-primary">calculate</button>
                        <button type="reset" class="btn btn-light">Reset</button>
                    </form>
                    <!-- End Form -->
                    
                </div>
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
                                  <p>Total zakat fitrah you have to pay: RM<?php
                                     echo isset($_SESSION['calculation_result']) ? $_SESSION['calculation_result'] : '';
                                     unset($_SESSION['calculation_result']); // This line forgets the session after displaying it
                                   ?></p>
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
<?php
// Include footer and scripts
include('footer.php');
include('scripts.php');
?>
