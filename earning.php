<?php
session_start();
// Perform calculations
if (isset($_POST['calculate'])) {
    // Retrieve form data
    $monthlyIncome = $_POST['month'];
    $otherIncome = $_POST['others'];

    // Calculate yearly and total income
    $yearlyIncome = $monthlyIncome * 12;
    $totalIncome = $yearlyIncome + $otherIncome;

    // Retrieve expenses
    $selfExpenses = $_POST['self'];
    $wifeExpenses = $_POST['wifeExpenses'];
    $childExpenses = $_POST['childExpenses'];
    $child18Expenses = $_POST['child18Expenses'];
    $parentsExpenses = $_POST['parents'];
    $selfStudyExpenses = $_POST['selfStudy'];

    // Perform your calculation here (adjust as per your actual logic)
    $totalExpenses = $selfExpenses + $wifeExpenses + $childExpenses + $child18Expenses + $parentsExpenses + $selfStudyExpenses;
    $zakatBase = $totalIncome - $totalExpenses;
    $result = $zakatBase * 0.025; // Example: Zakat is 2.5% of zakat base

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
    <script>
        function calculateYearlyIncome() {
            var monthlyIncome = document.getElementById('month').value;
            var yearlyIncome = monthlyIncome * 12;
            document.getElementById('year').value = yearlyIncome.toFixed(2);
        }

        function calculateTotalIncome() {
            var monthlyIncome = parseFloat(document.getElementById('month').value) || 0;
            var otherIncome = parseFloat(document.getElementById('others').value) || 0;
            var yearlyIncome = monthlyIncome * 12;
            var totalIncome = yearlyIncome + otherIncome;
            document.getElementById('total').value = totalIncome.toFixed(2);
        }

        function calculateWifeExpenses() {
            var numberOfWives = parseFloat(document.getElementById('wife').value) || 0;
            var wifeExpenses = numberOfWives * 500;
            document.getElementById('wifeExpenses').value = wifeExpenses.toFixed(2);
        }

        function calculateChildExpenses() {
            var numberOfChildrenUnder18 = parseFloat(document.getElementById('child').value) || 0;
            var numberOfChildrenAbove18 = parseFloat(document.getElementById('child18').value) || 0;
            var childExpenses = numberOfChildrenUnder18 * 2000;
            var child18Expenses = numberOfChildrenAbove18 * 5000;
            document.getElementById('childExpenses').value = childExpenses.toFixed(2);
            document.getElementById('child18Expenses').value = child18Expenses.toFixed(2);
        }
    </script>

    <div id="layoutSidenav">
        <?php include ('sidebar.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container mt-4">
                    <!-- Breadcrumbs -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Zakat Calculator</a>
                        </li>
                        <li class="breadcrumb-item active">Zakat of Earnings</li>
                    </ol>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Zakat of Earning</div>
                                <div class="card-body">
                                    <!-- Add User Form -->
                                    <form method="POST" action="earning.php">
                                        <div class="container mt-5">
                                            <!-- Monthly income -->
                                            <div class="form-group mb-3">
                                                <label for="month">Monthly Income</label>
                                                RM<input type="number" step="0.01" required class="form-control"
                                                    id="month" name="month"
                                                    placeholder="Enter monthly income (e.g., 45000)"
                                                    oninput="calculateYearlyIncome(); calculateTotalIncome();">
                                            </div>

                                            <!-- Yearly income -->
                                            <div class="form-group mb-3">
                                                <label for="year">Yearly Income</label>
                                                RM<input type="number" step="0.01" required class="form-control"
                                                    id="year" name="year" readonly>
                                            </div>

                                            <!-- Other income -->
                                            <div class="form-group mb-3">
                                                <label for="others">Other Income</label>
                                                RM<input type="number" step="0.01" required class="form-control"
                                                    id="others" name="others"
                                                    placeholder="Enter other income (e.g., 45000)"
                                                    oninput="calculateTotalIncome();">
                                            </div>

                                            <!-- Total income -->
                                            <div class="form-group mb-3">
                                                <label for="total">Total Income</label>
                                                RM<input type="number" step="0.01" required class="form-control"
                                                    id="total" name="total" readonly>
                                            </div>

                                            <hr><b>Yearly Expenses Information</b>
                                            <hr>

                                            <!-- Self expenses -->
                                            <div class="form-group mb-3">
                                                <label for="self">Self Expenses</label>
                                                RM<input type="number" step="0.01" required class="form-control"
                                                    id="self" name="self"
                                                    placeholder="Enter self expenses (e.g., 45000)">
                                            </div>

                                            <!-- Number of wives -->
                                            <div class="form-group mb-3">
                                                <label for="wife">Number of Wives</label>
                                                <input type="number" required class="form-control" id="wife" name="wife"
                                                    placeholder="Enter number of wives"
                                                    oninput="calculateWifeExpenses();">
                                            </div>

                                            <!-- Wife expenses -->
                                            <div class="form-group mb-3">
                                                <label for="wifeExpenses">Wife Expenses</label>
                                                RM<input type="number" step="0.01" required class="form-control"
                                                    id="wifeExpenses" name="wifeExpenses" readonly>
                                            </div>

                                            <!-- Number of children under 18 -->
                                            <div class="form-group mb-3">
                                                <label for="child">Number of Children Under 18</label>
                                                <input type="number" required class="form-control" id="child"
                                                    name="child" placeholder="Enter number of children under 18"
                                                    oninput="calculateChildExpenses();">
                                            </div>

                                            <!-- Child expenses under 18 -->
                                            <div class="form-group mb-3">
                                                <label for="childExpenses">Child Expenses Under 18</label>
                                                RM<input type="number" step="0.01" required class="form-control"
                                                    id="childExpenses" name="childExpenses" readonly>
                                            </div>

                                            <!-- Number of children above 18 pursuing study -->
                                            <div class="form-group mb-3">
                                                <label for="child18">Number of Children Above 18 Pursuing Study</label>
                                                <input type="number" required class="form-control" id="child18"
                                                    name="child18" placeholder="Enter number of children above 18"
                                                    oninput="calculateChildExpenses();">
                                            </div>

                                            <!-- Child expenses above 18 -->
                                            <div class="form-group mb-3">
                                                <label for="child18Expenses">Child Expenses Above 18</label>
                                                RM<input type="number" step="0.01" required class="form-control"
                                                    id="child18Expenses" name="child18Expenses" readonly>
                                            </div>

                                            <!-- Parents -->
                                            <div class="form-group mb-3">
                                                <label for="parents">Parents</label>
                                                RM<input type="number" step="0.01" required class="form-control"
                                                    id="parents" name="parents">
                                            </div>

                                            <!-- self study -->
                                            <div class="form-group mb-3">
                                                <label for="parents">self study expenses</label>
                                                RM<input type="number" step="0.01" required class="form-control"
                                                    id="selfStudy" name="selfStudy">
                                            </div>

                                            <!-- Submit and Reset Buttons -->
                                            <button type="submit" name="calculate"
                                                class="btn btn-primary">Calculate</button>
                                            <button type="reset" class="btn btn-light">Reset</button>
                                        </div>
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
                                    <div class="card-header">Result</div>
                                    <div class="card-body">
                                        <p>Total zakat of earning you have to pay: RM<?php
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
                        <div class="text-subtitle">"Dan dirikanlah kamu akan sembahyang dan keluarkanlah zakat, dan
                            rukuklah kamu semua (berjemaah) bersama-sama orang-orang yang rukuk."</div>
                        <div class="text-quote">Al-Baqarah: 43</div>
                    </div>

                    <?php
                    // Include footer and scripts
                    include ('footer.php');
                    include ('scripts.php');
                    ?>
                </div>
            </main>
        </div>
    </div>
</body>

</html>