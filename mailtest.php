<?php
    require('./PHPMailer/PHPMailerAutoload.php');

    $mail = new PHPMailer;

    $mail->Host = "smtp.gmail.com"; 

    $mail->isSMTP();
    $mail->Port = 587; 

    $mail->SMTPAuth = true;

    $mail->Username = "bikashranjandash0@gmail.com";

    $mail->Password = "bikash123";

    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    

    $mail->Subject = "Test Email";

    $mail->Body ="This is test Body...";

    $mail->setFrom('bikashranjandash0@gmail.com','Bikash');

    $mail->addAddress('bikashranjandash2@gmail.com');


    if($mail->send()){
        echo "mail sent";
    }
    else{
        echo "err";
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }

?>


