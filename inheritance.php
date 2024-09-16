<?php
class PaymentGateway
{

    public function pay($amount, $gatewayType)
    {
        if ($gatewayType == "paypal") {

            echo "Paypal Payment successfull of amount: $amount.\n";
        } else if ($gatewayType == "stripe") {

            echo "Stripe Payment successfull of amount: $amount.\n";
        }
    }
}

class PaymentProcessor extends PaymentGateway
{
    public function processPayment($amount, $gatewayType)
    {
        $this->pay($amount, $gatewayType);
    }
}

$paymentProcessor = new PaymentProcessor();
$paymentProcessor->processPayment(40, "stripe");
