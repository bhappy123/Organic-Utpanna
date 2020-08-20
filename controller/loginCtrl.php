<?php
if(isset($_POST['loginSubmitBtn'])){
  // DB Connection
  require 'db_config.php' ;
  // Getting Data from Login Form
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM `user` WHERE `email`='$email'";
  $res= mysqli_query($conn, $sql);
  $user_details = mysqli_fetch_all($res, MYSQLI_ASSOC);
  if($user_details[0]['email']){
    $check_password = password_verify($password, $user_details[0]['pass']);
    if($check_password){
      session_start();
      $_SESSION['userId'] = $user_details[0]['id'];
      $_SESSION['userEmail'] = $user_details[0]['email'];
      $_SESSION['userName'] = $user_details[0]['name'];
      header(("Location: ../log-in-welcome.php"));
    }
    else{
      header("Location: ../login.php?error=password did not match");
    }
  }
  else{
    header("Location: ../login.php?error=user does not exist");
  }


}

else{
    $err = "This is not a valid attempt";
    header("Location: ../login.php?error=$err");
}