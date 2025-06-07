<?php
$posts = json_decode(file_get_contents('posts.json'), true);
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$post = null;
foreach($posts as $p) {
    if($p['id'] === $id) {
        $post = $p;
        break;
    }
}
if(!$post) {
    echo 'Príspevok nenájdený.';
    exit;
}
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($post['title']); ?> - PetBlog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="<?php echo htmlspecialchars($post['excerpt']); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>
<body>
    <!-- NAVBAR -->
    <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                    <span class="icon icon-bar"></span>
                </button>
                <a href="index.php" class="navbar-brand">PetBlog</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="index.php">Domov</a></li>
                    <li><a href="index.php#blog">Blog</a></li>
                    <li><a href="#">O nás</a></li>
                    <li><a href="#">Kontakt</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="admin.php">Admin</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="blog-post">
        <div class="container">
            <h2><?php echo htmlspecialchars($post['title']); ?></h2>
            <img src="<?php echo htmlspecialchars($post['image']); ?>" class="img-responsive" alt="">
            <div><?php echo $post['content']; ?></div>
            <a href="index.php" class="section-btn btn btn-default">Späť na blog</a>
        </div>
    </section>
    
    <!-- FOOTER -->
    <footer id="footer" class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>© 2025 PetBlog. Všetky práva vyhradené.</p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- SCRIPTS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>