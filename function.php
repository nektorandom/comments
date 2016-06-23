<?php

function ShowCommentList($ParentID, $lvl) {

    include 'bd.php';

    global $lvl;
     
    $statement = $dbh->query('SELECT * FROM `table` WHERE parent_id=' . $ParentID . ' ORDER BY id ASC');
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($result as $row) {
        $ID1 = $row["id"];
        
        if ( $ParentID == 0 ) {
            ?>

            <div class="comment" style="margin-left: <?=($lvl * 650);?>px;" data-id="<?=$ID1;?>" data-parentId="<?=$row['parent_id'];?>" data-lvl="<?=$lvl;?>">
                
                <div class="bg-info text-comment">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span><?=$row['comment'];?></span>
                
                </div>
                <a href="#" class="reply">Reply</a>
            </div>

            <?php
        }
        elseif ( $lvl < 5 ) {
            ?>

            <div class="child-comment" style="margin-left: <?=($lvl * 50);?>px;" data-id="<?=$ID1;?>" data-parentId="<?=$row['parent_id'];?>" data-lvl="<?=$lvl;?>">
                <div class="bg-info text-comment">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span><?=$row['comment'];?></span>
                </div>
                <a href="#" class="reply">Reply</a>
            </div>

            <?php
        }
        else {
             ?>

            <div class="child-comment" style="margin-left: <?=($lvl * 50);?>px;" data-id="<?=$ID1;?>" data-parentId="<?=$row['parent_id'];?>" data-lvl="<?=$lvl;?>">
                <div class="bg-info text-comment" style="margin-bottom: 20px;">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span><?=$row['comment'];?></span>
                </div>
                
            </div>

            <?php
        }
        
        $lvl++;
        ShowCommentList($ID1, $lvl);
        $lvl--;
    }


}

function ShowCommentQuantity() {

    include 'bd.php';

    $res = $dbh->query('SELECT COUNT(*) FROM `table` WHERE parent_id=0 ');
    $res->execute();

    $quantity = $res->fetchColumn();

    if ( $quantity == 0 ) {
        echo 'no comment';
    }
    else if ( $quantity == 1 ) {
        echo $quantity . ' comment';
    }
    else {
        echo $quantity . ' comments';
    }

}


?>