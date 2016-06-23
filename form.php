<?php

include 'function.php';

switch ($_REQUEST['action']) {
        case 'add':
            include 'bd.php';
            
            $comment = $_POST['comment'];
            $id_parent = $_POST['idParent'];

            $dbh->exec("insert into `table` (comment, parent_id) values ('$comment', '$id_parent')");
            
            unset ($comment);
            unset ($id_parent);

            ShowCommentList(0, 0); 

            $dbh = null;
            
            break;
        case 'delete':
            include 'bd.php';

            $id = $_POST['get_id'];

            $dbh->exec("DELETE FROM `table` WHERE `parent_id`= '$id' "); //delete child if have so
            $dbh->exec("DELETE FROM `table` WHERE `id`= '$id' ");  

            unset ($id);  

            header("Content-Type: application/json", true);
            $show = 'Comment was delete';
            echo json_encode($show);

            $dbh = null;

            break;
        case 'comment':
            include 'bd.php';

            ShowCommentQuantity();
            $dbh = null;

            break;
}

?>