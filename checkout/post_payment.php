<?php

require_once '../vendor/autoload.php';

MercadoPago\SDK::setAccessToken("ACCESS_TOKEN");

$payment = new MercadoPago\Payment();

    $payment->transaction_amount = 200;
    $payment->token = $_REQUEST['token'];
    $payment->description = "Smartphone";
    $payment->installments = (int)$_REQUEST['installmentsOption'];
    $payment->payment_method_id = $_REQUEST['paymentMethodId'];;
    $payment->payer = array(
      "email" => "email@email.com"
    );

    $payment->save();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Payment Status</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
  <link rel="stylesheet" href="../public/css/post_payment.css">
</head>
<body>
 <main class="page payment-page">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/">
        <button type="button" class="btn btn-primary">Go back!</button>
      </a>
    </nav>
    <section class="payment-form dark">
      <div class="container">
        <div class="block-heading">
          <h2>Payment Status</h2>
        </div>

        <form>
          <div class="products">
            <div class="total">Status: <?php echo $payment->status;?><span></span></div>
            <div class="total">Status Detail: <?php echo $payment->status_detail;?><span></span></div>
            <div class="total">Payment ID: <?php echo $payment->id;?><span></span></div>
            <div class="total">date created: <?php echo $payment->date_created;?><span></span></div>
            <div class="total">amount: <?php echo $payment->transaction_amount;?><span></span></div>
            <div class="total">Installments: <?php echo $payment->installments;?><span></span></div>
            <div class="total">Payment Method ID: <?php echo $payment->payment_method_id;?><span></span></div>
            <div class="total"><span></span></div>
          </div>
        </form>
      </div>
    </section>
  </main>
</body>
</html>
