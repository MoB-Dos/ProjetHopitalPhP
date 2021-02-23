<?php



require '../../Class/ClassManager/User/UserManager.php';
require '../../Class/SetUp/SetUpGestion.php';


$Setup = new SetUpGestion([
    'mail' => $_POST['mail'],

]);

$add = new UserManager($Setup);

$act = $add->MdpOublier($Setup);
exit();
header("location: ../../View/Mdp/MdpOublier2.php");



?>
