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

        // !!!!!! CLEAR THIS BEFORE COMMIT !!!!!! //
        $mail->Password = ''; // App Key from email
        // !!!!!! CLEAR THIS BEFORE COMMIT !!!!!! //
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
    
        $mail->SetFrom('send.handler.iwlj4s@gmail.com'); // From who mail
        $mail->addAddress('iwlj4s@inbox.ru'); // Where to go 
        $mail->IsHTML(true);
    
        $mail->Subject = 'Заявка из салона';
        $mail->Body = ' 
        <html> 
        <head> 
            <title>Заявка из салона</title> 
        </head> 
        <body> 
            <p>Уважаемый сотрудник,</p> 
            <p>Была получена заявка от клиента '.$name.'. Он ждет обратного звонка по следующим контактным данным:</p> 
            <ul> 
                <li>Телефон: '.$phone.'</li> 
                <li>Email: '.$email.'</li> 
            </ul> 
            <p>С уважением,<br>Команда салона</p> 
        </body> 
        </html> 
        '; 
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