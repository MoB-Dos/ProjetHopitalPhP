<?php



require '../../../Class/ClassManager/User/UserManager.php';
require '../../../Class/SetUp/SetUpGestion.php';

var_dump($_POST);
var_dump($_COOKIE["mail"]);
var_dump($_COOKIE["verif"]);


$add= new UserManager();
$act = $add->MdpOublier2();
?>
