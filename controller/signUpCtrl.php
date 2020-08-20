<?php


if(isset($_POST['signUpSubmitBtn'])){

    // DB Connection
    require 'db_config.php' ;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if($password !== $cpassword){
        header("Location: ../sign-up.php?error=Password Does not Match&name=$name&email=$email");
    }
    else if(strlen($password) < 6){
        header("Location: ../sign-up.php?error=Password Must be of 6 characters&name=$name&email=$email");
    }
    else{
        // Checking Whether User Already Exist or not
        $sql = "SELECT * FROM `user` WHERE `email`='$email'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            header("Location: ../sign-up.php?error=User Already Exist&name=$name&email=$email");
        }
        else{
            //NOTE Hashed The Password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            //NOTE Creating New User Query
            $insert_user_query = "INSERT INTO `user`(`name`, `email`, `pass`) VALUES ('$name','$email','$hashedPassword')";
            
            //NOTE Run Insert Query
            $run_statement = mysqli_query($conn, $insert_user_query);
            if($run_statement){
                header("Location: ../sign-up-welcome.php");
            }
        }
    }

}
else{
    $err = "This is not a valid attempt";
    header("Location: ../sign-up.php?error=$err");
}