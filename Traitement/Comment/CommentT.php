<?php

session_start();
require '../../Class/ClassManager/Comment/CommentManager.php';
require '../../Class/SetUp/SetUpComment.php';


$ajout = new SetUpComment([
    'message' => $_POST['message'],
    'note' => $_POST['note'],
    'film' => $_POST['film']
]);

$add = new CommentManager($ajout);


$act = $add->ajoutCommentaire($ajout);


?>