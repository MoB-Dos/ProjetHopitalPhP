
<?php
include_once('init.php');
\Stripe\Stripe::setApiKey('sk_test_M3tdrhBhqPxIRn9A9ZwPZppO00montQHDD');

\Stripe\Subscription::create([
  'customer' => 'cus_Gv5q4C6q1laR4a',
  'items' => [['plan' => 'plan_Gv5vkGf9Os8lir']],
]);
header('Location: ../ndex.php');
?>
