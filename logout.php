<?php
    session_start();
    unset($_SESSION['userID']);
    session_destroy();
    header('Location: homepage.php');
?>