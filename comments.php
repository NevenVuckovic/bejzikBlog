<?php
    $sql = "SELECT * FROM posts WHERE id = {$_GET['id']}";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $posts = $statement->fetch();
?>
    
<?php
    $sql2 = "SELECT * FROM comments WHERE post_id = {$_GET['id']} ORDER BY id DESC";
    $statement2 = $connection->prepare($sql2);
    $statement2->execute();
    $statement2->setFetchMode(PDO::FETCH_ASSOC);
    $comments = $statement2->fetchAll();
?>
<ul>
    <?php
        foreach ($comments as $comment) {
    ?>
        <li>
            <hr>
                <div> <?php echo('Author: ' . $comment['author'])?></div>
                <p> <?php echo($comment['text']); ?></p>
            
        </li>
    <?php
        }
    ?>
</ul>