<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <!-- Main Section -->
                <div class="sb-sidenav-menu-heading">Main</div>
                <a class="nav-link" href="homepage.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-table-columns"></i></div>
                    Homepage
                </a>

                <!-- Zakat calculator -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUser"
                    aria-expanded="false" aria-controls="collapseUser">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-calculator"></i></div>
                    Zakat calculator
                </a>
                <div class="collapse" id="collapseUser" aria-labelledby="headingUser"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="fitrah.php">Zakat Fitrah</a>
                        <a class="nav-link" href="earning.php">Zakat of Earning</a>
                    </nav>
                </div>

                <!-- Zakat payment -->
                <a href="<?php echo isset($_SESSION['userID']) ? 'zakat-pay.php' : 'login.php'; ?>" class="nav-link">

                    <div class="sb-nav-link-icon"><i class="fa-solid fa-wallet"></i></div>
                    Zakat Payment
                </a>

                <!-- Login -->
                <a class="nav-link" href="login.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-sign-in-alt"></i></div>
                    Login
                </a>

            </div>
        </div>
    </nav>
</div>