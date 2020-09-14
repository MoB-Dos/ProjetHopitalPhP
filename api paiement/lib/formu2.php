
<?php
// Set your secret key. Remember to switch to your live secret key in production!
// See your keys here: https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey('sk_test_M3tdrhBhqPxIRn9A9ZwPZppO00montQHDD');

// This creates a new Customer and attaches the default PaymentMethod in one API call.
$customer = \Stripe\Customer::create([
  'payment_method' => 'pm_1FU2bgBF6ERF9jhEQvwnA7sX',
  'email' => 'jenny.rosen@example.com',
  'invoice_settings' => [
    'default_payment_method' => 'pm_1FU2bgBF6ERF9jhEQvwnA7sX'
  ]
]);
?>
