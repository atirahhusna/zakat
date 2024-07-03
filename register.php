<?php
session_start();
// Rest of your PHP logic
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
    include ('sidebar.php');
    ?>
    <div id="layoutSidenav_content">
        <main>


            <div class="container mt-4">
                <!-- Breadcrumbs -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Users</a>
                    </li>
                    <li class="breadcrumb-item active">User Registration</li>
                </ol>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                User Registration
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']); // Clear the message after displaying
                                }
                                ?>
                                <!-- Add User Form -->
                                <form method="POST" action="register-add.php">
                                    <!-- Full Name Field -->
                                    <div class="form-group mb-3">
                                        <label for="name">Full Name</label>
                                        <input type="text" required class="form-control" id="name" name="name">
                                    </div>

                                    <!-- Phone Number Field -->
                                    <div class="form-group mb-3">
                                        <label for="phoneNumber">Phone Number</label>
                                        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber">
                                    </div>


                                    <!-- Email Field -->
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <!-- Password Field -->
                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <!-- Submit and Reset Buttons -->
                                    <button type="submit" name="add_user" class="btn btn-primary">Register</button>
                                    <button type="reset" class="btn btn-light">Reset</button>
                                </form>
                                <!-- End Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="text-container">
                <div class="text-title">Tunaikan Kewajipan Zakat Anda</div>
                <div class="text-subtitle">"Dan dirikanlah kamu akan sembahyang dan keluarkanlah zakat, dan rukuklah
                    kamu semua (berjemaah) bersama-sama orang-orang yang rukuk."</div>
                <div class="text-quote">Al-Baqarah: 43</div>
            </div>
            <?php
            // Include footer and scripts
            include ('footer.php');
            include ('scripts.php');
            ?>