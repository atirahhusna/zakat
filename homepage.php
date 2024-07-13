<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>

    <!-- External Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="styles.css" rel="stylesheet" />

    <!-- Font Awesome Library -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('cool-background.png');
            /* Add your image URL here */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Roboto', sans-serif;
        }

        .greeting-container {
            text-align: center;
            margin-top: 30px;
            /* Adjust margin top as needed */
            color: black;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .greeting-title {
            font-size: 2.5em;
            font-weight: 700;
        }

        .greeting-subtitle {
            font-size: 1.5em;
            font-weight: 400;
        }

        .image-container {
            text-align: center;
            margin-top: 30px;
            /* Adjust margin top as needed */
        }

        .carousel-item img {
            max-width: 100%;
            /* Ensure images resize based on container */
            height: auto;
            /* Maintain aspect ratio */
            max-height: 300px;
            /* Limit maximum height */
            margin: auto;
            /* Center align images */
        }

        .text-container {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        .text-title {
            font-size: 2em;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .text-subtitle {
            font-size: 1.2em;
            font-weight: 400;
            margin-bottom: 10px;
            /* Adjust margin bottom as needed */
        }

        .text-quote {
            font-size: 1.1em;
            font-weight: 400;
            font-style: italic;
        }

        /* Custom styles for carousel control buttons */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: black;
            /* Change to desired color */
        }
    </style>
</head>
<style>
    body {
        background-image: url('cool-background.png');
        /* Add your image URL here */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        font-family: 'Roboto', sans-serif;
    }

    .greeting-container {
        text-align: center;
        margin-top: 50px;
        color: black;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .greeting-title {
        font-size: 2.5em;
        font-weight: 700;
    }

    .greeting-subtitle {
        font-size: 1.5em;
        font-weight: 400;
    }

    .image-container {
        text-align: center;
        margin-top: 20px;
    }

    .image-container img {
        width: 80%;
        max-width: 600px;
        height: auto;
    }

    .text-container {
        text-align: center;
        margin-top: 20px;
        color: #333;
    }

    .logo-text {
        font-size: 1.2em;
        /* Adjust the font size as needed */
        margin-top: 0;
        /* Adjust the top margin for the text */
    }

    .text-title {
        font-size: 2em;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .image-container {
        text-align: center;
        margin-top: 20px;
    }

    .logo {
        display: inline-block;
        width: 120px;
        /* Adjust width as needed */
        height: 120px;
        /* Adjust height as needed */
        line-height: 120px;
        /* Center icon vertically */
        font-size: 2em;
        /* Adjust icon size */
        color: #333;
        /* Icon color */
        margin: 100px;
        /* Adjust horizontal margin to create space between icons */
        margin-right: 50px;
    }



    .text-subtitle {
        font-size: 1.2em;
        font-weight: 400;
        margin-bottom: 20px;
    }

    .text-quote {
        font-size: 1.1em;
        font-weight: 400;
        font-style: italic;
    }
</style>

<body class="sb-nav-fixed">

    <div id="layoutSidenav">
        <?php
        // Include sidebar
        include ('sidebar.php');
        ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="greeting-container">
                    <div class="greeting-title">Welcome to ZakatFaith Perlis</div>
                    <div class="greeting-subtitle">Empowering Communities Through Zakat</div>
                </div>

                <div class="text-container">
                    <div class="text-title">Tunaikan Kewajipan Zakat Anda</div>
                    <div class="text-subtitle">"Dan dirikanlah kamu akan sembahyang dan keluarkanlah zakat, dan rukuklah
                        kamu semua (berjemaah) bersama-sama orang-orang yang rukuk."</div>
                    <div class="text-quote">Al-Baqarah: 43</div>
                </div>
                <!--  main content goes here -->
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="logo3.png" class="d-block mx-auto" alt="Logo 3">
                        </div>
                        <div class="carousel-item">
                            <img src="logo4.png" class="d-block mx-auto" alt="Logo 4">
                        </div>
                        <div class="carousel-item">
                            <img src="logo6.png" class="d-block mx-auto" alt="Logo 6">
                        </div>
                        <div class="carousel-item">
                            <img src="logo5.png" class="d-block mx-auto" alt="Logo 5">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
        </div>

        </main>

        <?php
        // Include footer and scripts
        include ('footer.php');
        include ('scripts.php');
        ?>
    </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>