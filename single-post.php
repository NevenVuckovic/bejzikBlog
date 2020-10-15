<?php
    include('konekcija.php');
?>

<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $servername = "127.0.0.1";
    $username = "root";
    $password = "vivify";
    $dbname = "blog";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

$sql1 = "SELECT * FROM posts WHERE id = {$_GET['id']}";
$statement = $connection->prepare($sql1);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$posts = $statement->fetchAll();
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
