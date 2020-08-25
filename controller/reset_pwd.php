<?php
if(isset($_POST['resetPwdSubmit'])){
    include('./db_config.php');

    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $pwd = $_POST['pwd'];
    $pwd_repeat = $_POST['pwd_repeat'];

    if(empty($pwd) || empty($pwd_repeat)){
        header("Location: ../create_new_password.php?error=Password Fields Are Empty");
        exit();
    }elseif($pwd !== $pwd_repeat ){
            header("Location: ../create_new_password.php?error=password does not match");
            exit();
    }
    $currentDate = date("U");
    include('./db_config.php');

    $sql = "SELECT * FROM `password_reset` WHERE `pwdResetSelector`='$selector' AND `pwdResetExpires`>='$currentDate'";
    $result = mysqli_query($conn, $sql);

    if(!$row = mysqli_fetch_assoc($result)){
        echo "you need to re-submit your reset request";
        exit();
    } else{
        $tokenBin = hex2bin($validator);
        $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

        if($tokenCheck === false){
            echo "you need to re-submit your reset request";
        exit();
        }
        elseif($tokenCheck === true){
            $tokenEmail = $row['pwdResetEmail'];

            $sql = "SELECT * FROM `user` WHERE `email`='$tokenEmail'";

            $result = mysqli_query($conn, $sql);
            if(!$row = mysqli_fetch_assoc($result)){
                echo "There Was an Error";
                exit();
            } else{
                $newHashedPassword = password_hash($pwd, PASSWORD_DEFAULT);
                $sql = "UPDATE `user` SET `pass`='$newHashedPassword' WHERE `email`='$tokenEmail'";
                $result = mysqli_query($conn, $sql);

                $sql = "DELETE FROM `password_reset` WHERE `email`='$tokenEmail'";
                $sql = "UPDATE `user` SET `pass`='$newHashedPassword' WHERE `email`='$tokenEmail'";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result)){
                    header("Location: ../login.php?error=Password Updated Successfully");
                }
                else{
                    header("Location: ../forgot-password.php?error=Password Updated Successfully");
                }
            }
        }

    }

}