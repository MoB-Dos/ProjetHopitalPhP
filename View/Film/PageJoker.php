<?php

session_start();
require '../../Class/ClassManager/Comment/CommentManager.php';
require '../../Class/SetUp/SetUpComment.php';

$film = 'joker';

$show= new CommentManager();

$act = $show->CommentAff($film);

$film = "joker";

?>


<form action="../../Traitement/Comment/CommentT.php" method="post"  novalidate="novalidate">

    
     <?php echo $_SESSION['login'];?>
    

    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message" required></textarea>

    <input type="number" id="note" name="note" min="1" max="5" required>
    
    <input id="film" name="film" type="hidden" value="joker">

    <button type="submit" value="submit" class="primary-btn text-uppercase">Send Comment</button>

</form>

