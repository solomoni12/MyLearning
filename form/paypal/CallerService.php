<?php

    class CallerService
    {
        private $apiEndpoint;

        public function __construct()
        {
            $this->apiEndpoint = 'https://api-3t.sandbox.paypal.com/nvp';
        }

        public function call($params)
        {
            $params['VERSION'] = '53.0';
            $params['USER'] = 'sb-k5h0e29306858_api1.business.example.com';
            $params['PWD'] = 'UUCXUCTBJFP43DBJ';
            $params['SIGNATURE'] = 'AZ-C-mHL0b0aK9g8-.AvDULDjdkZAhcA-R2w9wQ9mM6sYo-eb0NwUiRB';

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $this->apiEndpoint);
            curl_setopt($ch, CURLOPT_VERBOSE, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));

            $response = curl_exec($ch);

            // echo "<pre>";
            // print_r($response);
            // exit;

            if (curl_errno($ch)) {
                die('Curl error: ' . curl_error($ch));
            }

            curl_close($ch);

            parse_str($response, $parsedResponse);

            return $parsedResponse;
        }

        public function setExpressCheckout($productName, $quantity, $price, $cancelUrl, $returnUrl)
        {
            $itemAmount = number_format($quantity * $price, 2, '.', '');
        
            // Debug output for $itemAmount
            echo "Item Amount: " . $itemAmount;
        
            $params = array(
                'METHOD' => 'SetExpressCheckout',
                'PAYMENTREQUEST_0_PAYMENTACTION' => 'Sale',
                'PAYMENTREQUEST_0_ITEMAMT' => $itemAmount,
                'PAYMENTREQUEST_0_AMT' => $itemAmount,
                'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD',
                'PAYMENTREQUEST_0_DESC' => $productName,
                'L_PAYMENTREQUEST_0_NAME0' => $productName,
                'L_PAYMENTREQUEST_0_QTY0' => $quantity,
                'L_PAYMENTREQUEST_0_AMT0' => $price,
                'CANCELURL' => $cancelUrl,
                'RETURNURL' => $returnUrl,
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
