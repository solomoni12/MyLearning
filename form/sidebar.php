<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- bootstrap -->
  </head>
  <body>
  
  </body>
</html>

<?php
  // Recipient email address
  $to = 'mwalupani1234@gmail.com';

  // Email subject
  $subject = 'Marriage Proposal';

  // Email message
  $message = 'Hi mwalupani1234@email.com,

  This is a proposal for marriage. Will you marry me?

  Sincerely,
  Your Name';

  // Sender email address
  $from = 'mwalupani1234@gmail.com';

  // Additional headers
  $headers = 'From: ' . $from . "\r\n" .
      'Reply-To: ' . $from . "\r\n" .
      'X-Mailer: PHP/' . phpversion();

  // Sending email
  if(mail($to, $subject, $message, $headers)){
      echo 'Your mail has been sent successfully.';
  } else{
      echo 'Unable to send email. Please try again.';
  }
?>
