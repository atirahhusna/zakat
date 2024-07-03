<?php
session_start();
include("dbconnection.php");

$error = "";

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL query
    $query = "SELECT userID, email, name FROM user WHERE email=? AND password=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['userID'] = $row['userID']; // Store userID in session
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['name']; // Store name in session
        header("Location: zakatPayment.php");
        exit();
    } else {
        $error = "Wrong Username or Password";
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .center-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: -50px; /* Adjust as needed */
        }

        body {
            background-image: url('logo2.png'); /* Add your image URL here */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .login-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
            margin-top: 20px; /* Adjust as needed */
        }
        .login-title {
            font-family: 'Arial', sans-serif; 
            font-size: 30px; 
            font-weight: bold; 
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .logo {
            max-width: 300px;
            margin-bottom: 20px;
            margin-top: -20px; /* Adjust as needed */
        }
        /* Set text alignment to left for labels */
        .login-container label {
            text-align: left;
            display: block;
            margin-bottom: 5px;
        }
        .error-message {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>

<body class="bg-light">

<div class="center-container">
  
    <div>
        <div class="login-container">
            <h1 class="login-title"> LOGIN</h1>
            <?php
            if ($error != "") {
                echo "<div class='error-message'>$error</div>";
            }
            ?>
            <form method="post" action="">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                </div>
                <div class="form-group text-center">
                    <a href="homepage.php">Home page</a> | <a href="register.php">Don't have an account? Sign up here</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .center-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: -50px; /* Adjust as needed */
        }

        body {
            background-image: url('logo2.png'); /* Add your image URL here */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .login-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
            margin-top: 20px; /* Adjust as needed */
        }
        .login-title {
            font-family: 'Arial', sans-serif; 
            font-size: 30px; 
            font-weight: bold; 
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .logo {
            max-width: 300px;
            margin-bottom: 20px;
            margin-top: -20px; /* Adjust as needed */
        }
        /* Set text alignment to left for labels */
        .login-container label {
            text-align: left;
            display: block;
            margin-bottom: 5px;
        }
        .error-message {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>

<body class="bg-light">

<div class="center-container">
  
    <div>
        <div class="login-container">
            <h1 class="login-title"> LOGIN</h1>
            <?php
            if ($error != "") {
                echo "<div class='error-message'>$error</div>";
            }
            ?>
            <form method="post" action="">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                </div>
                <div class="form-group text-center">
                    <a href="homepage.php">Home page</a> | <a href="register.php">Don't have an account? Sign up here</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
