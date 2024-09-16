<?php

interface PaymentGatewayInterface
{
    public function pay($amount);
}

class PaypalGateway implements PaymentGatewayInterface
{
    public function pay($amount)
    {
        echo "PayPal payment successfull of amount: $amount \n";
    }
}

class StripeGateway implements PaymentGatewayInterface
{
    public function pay($amount)
    {
        echo "Stripe payment successfull of amount: $amount \n";
    }
}

class PaymentProcessor
{
    public function __construct(public PaymentGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function processPayment($amount)
    {
        $this->gateway->pay($amount);
    }
}

// paypal payment
$paypalGateway = new PaypalGateway();
$paymentProcessor = new PaymentProcessor($paypalGateway);
$paymentProcessor->processPayment(100);

// stripe payment

$stripeGateway = new StripeGateway();
$paymentProcessor = new PaymentProcessor($stripeGateway);
$paymentProcessor->processPayment(450);
