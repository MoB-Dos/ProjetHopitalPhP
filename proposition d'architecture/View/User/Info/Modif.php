<?php

session_start ();

require '../../../Class/ClassManager/User/UserManager.php';
require '../../../Class/SetUp/SetUpUser.php';



$show = new UserManager();
								
$act = $show->AffichageModification();




?>