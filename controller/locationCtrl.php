<?php
require 'db_config.php' ;
session_start();
$location = $_POST['location'];
$_SESSION['global_location'] = $location;

