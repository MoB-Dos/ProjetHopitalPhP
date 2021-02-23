<?php



require '../../Class/ClassManager/User/UserManager.php';
require '../../Class/SetUp/SetUpUser.php';


$Setup = new SetUpUser([
    'mail' => $_POST['mail'],
    'message' => $_POST['message'],
    'nom' => $_POST['nom'],
    'sujet' => $_POST['sujet'],



]);

$send = new UserManager($Setup);

$act = $send->sendMail($Setup);
header("location: ../../index.php");

?>