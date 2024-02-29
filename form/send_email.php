<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer library
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

// Create a new PHPMailer instance
// $mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'mwalupani1234@gmail.com'; 
    $mail->Password = 'your-password'; 

    // Recipients
    $mail->setFrom('your@gmail.com', 'Your Name'); 
    $mail->addAddress('mwalupani1234@gmail.com', 'Recipient Name'); 

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
