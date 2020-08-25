<?php
if(isset($_POST['forgotPwdSubmit'])){

    include('./db_config.php');
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "www.organicutpanna.in/create_new_password.php?selector=$selector&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    $userEmail = $_POST['email'];

    $sql = "DELETE FROM `password_reset` WHERE `pwdResetEmail`='$userEmail'";

    $result = mysqli_query($conn, $sql);

    $hasedToken = password_hash($token, PASSWORD_DEFAULT);

    $sql ="INSERT INTO `password_reset`(`pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES ('$userEmail','$selector','$hasedToken','$expires')";

    $result_insert = mysqli_query($conn, $sql);


    // Mail Send

    $to = $userEmail ;

    $subject = "RESET YOUR PASSWORD FROM UTPANA";

    $message = '<p>We received a password reset request. The link to reset your password is below. If You did not make this request, You can ignore this email.</p>';
    
    $message .= '<br><br> <p>Here Is Your Password Reset Link: </p>';

    $message .= '<a href="'. $url . '">'. $url .'</a>';

    $from = 'orders@organicutpanna.in';
       
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    // Create email headers
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
     
    mail($to, $subject, $message, $headers);

    header("Location: ../forgot-password.php?error=success");

}