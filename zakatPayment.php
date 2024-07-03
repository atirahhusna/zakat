<?php
session_start();
include('header.php');
include('dbconnection.php'); // Include the database connection script

// Assuming userID is stored in session after login
if (!isset($_SESSION['userID'])) {
    // Redirect to login page if userID is not set
    header('Location: login.php');
    exit();
}
$userID = $_SESSION['userID'];

if (isset($_POST['add_to_cart'])) {
    $total_amount = isset($_POST['total_amount']) ? $_POST['total_amount'] : 0; // Retrieve total amount from form
    // Process further with cart addition logic
}

?>

<div class="container mt-4">
    <!-- Breadcrumbs -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Zakat</a>
        </li>
        <li class="breadcrumb-item active">Zakat payment</li>
    </ol>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Zakat Payment
                </div>
                <div class="card-body">
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']); // Clear the message after displaying
                }
                ?>
                    <!-- Add Payment Form -->
                    <form method="POST" action="zakat-pay.php">
                        <div class="form-group mb-3">
                            <label for="paymentAmount">Payment Amount</label>
                            <input type="text" required class="form-control" id="paymentAmount" name="paymentAmount">
                        </div>
                        <div class="form-group mb-3">
                            <label for="paymentMethod">Payment Method</label>
                            <select class="form-control" id="paymentMethod" name="paymentMethod">
                                <option value="">Select Payment Method</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="PayPal">PayPal</option>
                                <option value="Cash">Cash</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="zakatType">Zakat Type</label>
                            <select class="form-control" id="zakatType" name="zakatType">
                                <option value="">Select Zakat Type</option>
                                <option value="Zakat al-Mal">Zakat al-Mal</option>
                                <option value="Zakat al-Fitr">Zakat al-Fitr</option>
                            </select>
                        </div>
                        <!-- Submit and Reset Buttons -->
                        <button type="submit" name="add_payment" class="btn btn-primary">Pay</button>
                        <button type="reset" class="btn btn-light">Reset</button>
                    </form>
                    <!-- End Payment Form -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Payment Records Table -->
<div id="payment-record" class="container-fluid mt-4">
    <!-- DataTables Example -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    Payment Records
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="paymentTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Receipt Number</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Payment Method</th>
                                    <th>Zakat Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT receiptNumber, paymentDate, zakatType, paymentMethod, paymentAmount FROM zakatPayment WHERE userID = ? ORDER BY paymentDate DESC LIMIT 1000";
                                $stmt = $conn->prepare($query);
                                
                                if (!$stmt) {
                                    die('Error preparing statement: ' . $conn->error);
                                }

                                $stmt->bind_param("i", $userID);
                                if (!$stmt->execute()) {
                                    die('Error executing statement: ' . $stmt->error);
                                }

                                $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                                    // Display fetched records
                                    $count = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo htmlspecialchars($row['receiptNumber']); ?></td>
                                            <td><?php echo htmlspecialchars($row['paymentDate']); ?></td>
                                            <td>RM<?php echo htmlspecialchars($row['paymentAmount']); ?></td>
                                            <td><?php echo htmlspecialchars($row['paymentMethod']); ?></td>
                                            <td><?php echo htmlspecialchars($row['zakatType']); ?></td>
                                        </tr>
                                        <?php
                                        $count++;
                                    }
                                } else {
                                    // No records found
                                    echo "<tr><td colspan='6'>No payment records found.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">
                    <?php echo "Generated : " . date("h:i:sa"); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Include footer and scripts
include('footer.php');
include('scripts.php');
?>
