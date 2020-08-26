<?php   
require('./db_config.php');
if(isset($_POST['loginSubmitBtn'])){
    $uname = $_POST['userid'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM `delivery_boy` WHERE `user_name`='$uname' AND `password`='$pass'";
    $result = mysqli_query($conn, $sql);
    echo mysqli_num_rows($result);
    if(mysqli_num_rows($result)>0){
        $loc = mysqli_fetch_all($result, MYSQLI_ASSOC);
        print_r($loc);
        $location = $loc[0]['location'];
        session_start();
        $_SESSION['deliveryBoyLocation']= $location;
        header(("Location: ../index.php"));

    }
    else{
        header(("Location: ../log-in.php?err=Id or Password Does Not Match"));
    }
}

else{
    header(("Location: ../log-in.php?err=This is Not a Valid Attempt"));
    }
?>