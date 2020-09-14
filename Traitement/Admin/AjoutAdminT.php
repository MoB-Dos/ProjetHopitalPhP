<?php


require '../../Class/ClassManager/Admin/AdminManager.php';



$login = $_POST['login'];



$try = new AdminManager($login);

$act = $try->AjoutAdmin($login);





?>