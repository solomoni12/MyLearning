<?php
require_once 'constants.php';
require_once 'CallerService.php';

// Create an instance of the CallerService class
$caller = new CallerService();

// Perform PayPal Express Checkout actions here using methods from CallerService

// Example: SetExpressCheckout
$params = array(
    'METHOD' => 'SetExpressCheckout',
    'VERSION' => VERSION,
    'USER' => API_USERNAME,
    'PWD' => API_PASSWORD,
    'SIGNATURE' => API_SIGNATURE,
    'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
    'PAYMENTREQUEST_0_AMT' => '10.00', // Set your payment amount
    'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD', // Set your currency code
    'cancelUrl' => 'http://yourdomain.com/cancel.php', // Set your cancel URL
    'returnUrl' => 'http://yourdomain.com/success.php', // Set your return URL
);

$response = $caller->call($params);

// Handle the response and redirect the user to PayPal for payment
if ($response['ACK'] == 'Success') {
    $token = $response['TOKEN'];
    header("Location: " . PAYPAL_URL . $token);
    exit();
} else {
    // Handle the error
    echo "Error: " . $response['L_LONGMESSAGE0'];
}
?>
