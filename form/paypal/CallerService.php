<?php

class CallerService
{
    private $apiEndpoint;

    public function __construct()
    {
        $this->apiEndpoint = 'https://api-3t.sandbox.paypal.com/nvp'; // Use sandbox endpoint for testing
    }

    public function call($params)
    {
        $params['VERSION'] = '53.0';
        $params['USER'] = 'YOUR_SANDBOX_API_USERNAME';
        $params['PWD'] = 'YOUR_SANDBOX_API_PASSWORD';
        $params['SIGNATURE'] = 'YOUR_SANDBOX_API_SIGNATURE';

        // Initialize cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $this->apiEndpoint);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));

        // Execute cURL session and get the response
        $response = curl_exec($ch);

        // Check for cURL errors
        if (curl_errno($ch)) {
            die('Curl error: ' . curl_error($ch));
        }

        // Close cURL session
        curl_close($ch);

        // Parse the response
        parse_str($response, $parsedResponse);

        return $parsedResponse;
    }

    public function setExpressCheckout($amount, $cancelUrl, $returnUrl)
    {
        $params = array(
            'METHOD' => 'SetExpressCheckout',
            'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
            'PAYMENTREQUEST_0_AMT' => $amount,
            'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD',
            'cancelUrl' => $cancelUrl,
            'returnUrl' => $returnUrl,
        );

        return $this->call($params);
    }

    public function getExpressCheckoutDetails($token)
    {
        $params = array(
            'METHOD' => 'GetExpressCheckoutDetails',
            'TOKEN' => $token,
        );

        return $this->call($params);
    }

    public function doExpressCheckoutPayment($token, $payerId, $amount)
    {
        $params = array(
            'METHOD' => 'DoExpressCheckoutPayment',
            'TOKEN' => $token,
            'PAYERID' => $payerId,
            'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
            'PAYMENTREQUEST_0_AMT' => $amount,
            'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD',
        );

        return $this->call($params);
    }
}
?>
