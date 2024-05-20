<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    //require 'vendor/autoload.php';

    if (isset($_POST["send"])){
        $mail = new PHPMailer(true);
        $mail->CharSet = 'utf-8';

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
    
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'send.handler.iwlj4s@gmail.com'; // Email who sends mail
        $mail->Password = ''; // App Key from email
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
    
        $mail->SetFrom('send.handler.iwlj4s@gmail.com'); // From who mail
        $mail->addAddress('elizavetalenn@mail.ru'); // Where to go 
        $mail->IsHTML(true);
    
        $mail->Subject = 'Заявка из салона';
        $mail->Body = 'Клиент '.$name.' ждет обратного звонка '.$phone.''.$email;
        $mail->AltBody = '';
    
        if (!$mail->send()){
            echo 'Error';
        }
        else{
            echo "
            <script>
            alert('Message sent successfully!');

            window.location.replace('home.html'); 
            </script>
            ";
        }
    }

?>