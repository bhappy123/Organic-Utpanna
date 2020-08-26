<?php
require('./db_config.php');

session_start();
if(isset($_SESSION['admin'])){

    $sql_to_show_users= "SELECT * FROM `user`";

    $result = mysqli_query($conn, $sql_to_show_users);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

else{
    header(("Location: ./log-in.php?err=Please Login To Continue"));
    }
?>