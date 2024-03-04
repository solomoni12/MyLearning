<?php
require_once 'constants.php';
require_once 'CallerService.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['productName'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $amount = $quantity * $price;

    // Create an instance of the CallerService class
    $caller = new CallerService();

    // Initiate SetExpressCheckout
    $response = $caller->setExpressCheckout($amount, 'http://localhost/MyLearning/form/paypal/cancel.php', 'http://localhost/MyLearning/form/paypal/success.php');

    // Debug output for response
    echo "<pre>";
    print_r($response);
    exit();

    // Handle the response and redirect the user to PayPal for payment
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
        exit(); // Make sure to exit after displaying the error
    }
} else {
    // Handle cases where the form is not submitted via POST method
    echo "Form not submitted.";

    // Redirect to confirmation.php
    header('Location: confirmation.php');
    exit(); // Make sure to exit after redirecting
}
?>
