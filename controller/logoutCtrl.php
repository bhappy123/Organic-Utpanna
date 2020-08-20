<?php 
    session_start();
    session_unset();
    session_destroy();
    $_SESSION['global_location'] = "All";
    header("Location: ../index.php")
?>