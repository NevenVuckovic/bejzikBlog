<?php
    include('konekcija.php');

$sql1 = "SELECT * FROM posts WHERE id = {$_GET['id']}";
$statement = $connection->prepare($sql1);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$posts = $statement->fetch();
?>


<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>

<body>

    <?php include('header.php'); ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
        
<article class="blog-post">
    <header>
        <h1 class="blog-post-title"><a class="naslov" href="single-post.php?id=<?php echo($posts['id']) ?>"><?php echo($posts['title']) ?></a></h1>
        <div> <?php echo($posts['created_at']) ?> by <?php echo($posts['author']) ?></div>
    </header>
        <div>
        <p> <?php echo($posts['body']) ?></p>
        </div>
       <?php include('comments.php'); ?>
</article>


        </div>
        <?php include('sidebar.php');?>
        
    </div>
    <?php include('footer.php'); ?>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>
</main>

<?php include('footer.php'); ?>

</body>
</html>
