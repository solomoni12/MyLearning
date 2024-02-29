<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer library
require 'C:\xampp\htdocs\MyLearning\PHPMailer\src/Exception.php';
require 'C:\xampp\htdocs\MyLearning\PHPMailer\src/PHPMailer.php';
require 'C:\xampp\htdocs\MyLearning\PHPMailer\src/SMTP.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);



try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'mwalupani1234@gmail.com'; 
    $mail->Password = '2000$OLOMONi'; 

    // Recipients
    $mail->setFrom('mwalupani1234@gmail.com', 'Solomon Mwalupani'); 
    $mail->addAddress('mwalupani1234@gmail.com', 'Solomon Mwalupani'); 

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'HTML email';
    $mail->Body = '
        <html>
            <head>
                <title>HTML email</title>
            </head>
            <body>
                <p>This email contains HTML Tags!</p>
                <table>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                    </tr>
                    <tr>
                        <td>John</td>
                        <td>Doe</td>
                    </tr>
                </table>
            </body>
        </html>
    ';

    // Send the email
    $mail->send();
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
