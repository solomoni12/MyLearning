<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'constants.php';
require_once 'CallerService.php';
require_once 'confirmation.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $csrf_token = filter_input(INPUT_POST, 'csrf_token', FILTER_SANITIZE_STRING);

    if (!validateCSRFToken($csrf_token)) {
        die('Invalid CSRF token. Form submission rejected.');
    }

    $productName = $_POST['productName'];
    $quantity = (int)$_POST['quantity'];
    $price = (float)$_POST['price'];

    $amount = $quantity * $price;

    $caller = new CallerService();
    $response = $caller->setExpressCheckout($productName, $quantity, $price, 'http://localhost/MyLearning/form/paypal/cancel.php', 'http://localhost/MyLearning/form/paypal/success.php');

    if ($response['ACK'] == 'Success') {
        $token = $response['TOKEN'];

        // Store necessary data in session for use in DoExpressCheckoutPayment
        $_SESSION['productName'] = $productName;
        $_SESSION['quantity'] = $quantity;
        $_SESSION['price'] = $price;
        $_SESSION['amount'] = $amount;
        $_SESSION['token'] = $token;

        // Redirect to PayPal
        header("Location: " . PAYPAL_URL . $token);
        exit();
    } else {
        // Handle the error
        echo "Error: " . $response['L_LONGMESSAGE0'];
        exit();
    }
} else {
    echo "Form not submitted.";
    header('Location: confirmation.php');
    exit();
}
?>
