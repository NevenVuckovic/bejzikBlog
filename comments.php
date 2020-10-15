<?php

include('konekcija.php');

        $sqlComments = "SELECT text, author, comments.id FROM comments 
        INNER JOIN posts ON comments.post_id = posts.id WHERE posts.id = {$_GET["id"]}";
 
        $comments = queryAll($sqlComments, $connection);

    
        foreach ($comments as $comment) {
        ?>
            <li id = "singleComment" class = "wrap">
                <?php echo $comment["author"] . ": <br>" . $comment["text"] . "<br>" ; ?>
                
            
                <hr>
            </li>
    <?php } ?>