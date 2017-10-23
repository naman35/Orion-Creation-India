<?php

    /**
     * index.php
     *
     * Kushagra Dalmia
     * dalmia.kushagra@gmail.com
     *
     * Has a contact me form
     * Submits to contact.php
     */
     
     
    // require PHPMailer
    require("libphp-phpmailer/class.phpmailer.php");

    // validate submission
    if (!empty($_POST["name"]) && !empty($_POST["email"]))
    {
        // instantiate mailer
        $mail = new PHPMailer();
         
        // use SMTP
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->Password = "orion.123";
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Username = "orioncreationsindia@gmail.com";
          
        // set From:
        $mail->SetFrom("orioncreationindia@gmail.com");
          
        // set To:
        $mail->AddAddress("orioncreationindia@gmail.com");

        // set Subject:
        $mail->Subject = "registration";
             
        // set body
        $mail->Body = 
            "This person just registered:\n\n" .
            "Name: " . $_POST["name"] . "\n" .
            "Email: " . $_POST["email"] . "\n" .
            "Subject: " . $_POST["subject"] . "\n" .
            "Message: " . $_POST["message"];

        // send mail
        if ($mail->Send() == false)
        {
            print($mail->ErrInfo);
            exit;
        }
        else
        {
            header("Location: index.php");
        }
    }
    else
    {
        header("Location: index.php");
        exit;
    }

?>


<!DOCTYPE html>

<html>
    <head>
        <title>Registered</title>
    </head>
    <body>
        You are registered!  (Really.)
    </body>
</html>
