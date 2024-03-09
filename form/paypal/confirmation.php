<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    function generateCSRFToken() {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    function validateCSRFToken($token) {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PayPal Integration Example</title>
        
        <style>
            .card{
                margin-top: 20px;
                margin-bottom: auto;
                margin-left: 100px;
                margin-right: 100px;
            }
            .card-form{
                margin-top: 10px;
                margin-bottom: 20px;
                margin-left: 100px;
                margin-right: 100px;
            }
        </style>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="card">
            <form class="card-form" action="PayPal_entry.php" method="post">

                <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">

                <div class="form-group">
                    <label for="productName">Product Name:</label>
                    <input type="text" class="form-control" id="productName" name="productName" required><br>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="1" required><br>
                </div>
                <div class="form-group">
                    <label for="price">Price per Unit:</label>
                    <input type="number" class="form-control" id="price" name="price" min="0.01" step="0.01" required><br>
                </div>

                <input type="submit" class="btn btn-primary" value="Proceed to PayPal">
            </form>

        </div>
    </body>
</html>
