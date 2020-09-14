<?php



include_once('init.php');\Stripe\Stripe::setApiKey("sk_test_M3tdrhBhqPxIRn9A9ZwPZppO00montQHDD");
$customer = \Stripe\Customer::create(array(
  "description" => "Customer for daniel.white@example.com",
  "email" => "daniel.white@example.com",
));
?>
