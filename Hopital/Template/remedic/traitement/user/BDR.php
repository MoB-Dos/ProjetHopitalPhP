<?php

require '../../Class/ClassManager/User/UserManager.php';
require '../../Class/SetUp/SetUpGestion.php';

$rd = new SetUpGestion([
    'Recherche' => $_POST['Recherche'],
]);

$try = new UserManager($rd);

$act = $try->Recherche($rd);


?>
