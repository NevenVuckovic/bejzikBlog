<?php
$sql1 = "SELECT * FROM posts ORDER BY created_at DESC";
$statement = $connection->prepare($sql1);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$posts = $statement->fetchAll();
?>

<?php
foreach ($posts as $post) {
?>
<article class="blog-post">
    <header>
        <h1 class="blog-post-title"><a class="naslov" href="single-post.php?id=<?php echo($post['id']) ?>"><?php echo($post['title']) ?></a></h1>
        <div> <?php echo($post['created_at']) ?> by <?php echo($post['author']) ?></div>
    </header>
        <div>
        <p> <?php echo($post['body']) ?></p>
        </div>
</article>

<?php
 }
?>