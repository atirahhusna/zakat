<?php
// Include header file
include('header.php');

// Include database connection file
include('dbconnection.php');
?>

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
                    <!-- Add User Form -->
                    <form method="POST">
                        <!-- Full Name Field -->
                        <div class="form-group mb-3">
                            <label for="studentName">Full Name</label>
                            <input type="text" required class="form-control" id="studentName" name="studentName">
                        </div>
                        <!-- Student ID Field -->
                        <div class="form-group mb-3">
                            <label for="studentID">Student ID</label>
                            <input type="text" class="form-control" id="studentID" name="studentID">
                        </div>
                        <!-- Phone Number Field -->
                        <div class="form-group mb-3">
                            <label for="studentPhoneNum">Phone Number</label>
                            <input type="tel" class="form-control" id="studentPhoneNum" name="studentPhoneNum">
                        </div>
                        <!-- Address Field -->
                        <div class="form-group mb-3">
                            <label for="studentAddress">Address</label>
                            <input type="text" class="form-control" id="studentAddress" name="studentAddress">
                        </div>
                        <!-- Level of Study Field -->
                        <div class="form-group mb-3">
                            <label for="studentType">Level Of Study</label>
                            <select class="form-control" id="studentType" name="studentType" required>
                                <option value="Undergraduate">Undergraduate</option>
                                <option value="Postgraduate">Postgraduate</option>
                            </select>
                        </div>
                        <!-- Year of Study Field -->
                        <div class="form-group mb-3">
                            <label for="studentYear">Year Of Study</label>
                            <input type="number" class="form-control" id="studentYear" name="studentYear">
                        </div>
                        <!-- Email Field -->
                        <div class="form-group mb-3">
                            <label for="studentEmail">Email</label>
                            <input type="email" class="form-control" id="studentEmail" name="studentEmail">
                        </div>
                        <!-- Password Field -->
                        <div class="form-group mb-3">
                            <label for="studentPassword">Password</label>
                            <input type="password" class="form-control" id="studentPassword" name="studentPassword">
                        </div>
                        <!-- Submit and Reset Buttons -->
                        <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
                        <button type="reset" class="btn btn-light">Reset</button>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<?php
// Include footer and scripts
include('footer.php');
include('scripts.php');
?>
