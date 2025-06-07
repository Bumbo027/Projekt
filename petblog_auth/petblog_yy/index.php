<?php
$posts = json_decode(file_get_contents('posts.json'), true);
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>PetBlog - Blog pre majiteľov domácich zvierat</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="Blog pre majiteľov domácich zvierat">
    <meta name="keywords" content="pet, blog, zviera, pes, mačka, starostlivosť">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">


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
    <!-- SLIDER -->
    <section id="home" class="slider" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div id="carousel-slider" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-slider" data-slide-to="1"></li>
                        <li data-target="#carousel-slider" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item item-first active">
                            <div class="caption">
                                <div class="container">
                                    <div class="col-md-6 col-sm-12">
                                        <h1>Vitajte na PetBlogu</h1>
                                        <h3>Blog plný tipov a rád pre majiteľov domácich zvierat.</h3>
                                        <a href="#blog" class="section-btn btn btn-default smoothScroll">Prečítajte si viac</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item item-second">
                            <div class="caption">
                                <div class="container">
                                    <div class="col-md-6 col-sm-12">
                                        <h1>Majte svojho miláčika v top forme</h1>
                                        <h3>Pravidelné články o výžive, starostlivosti a trénovaní.</h3>
                                        <a href="#blog" class="section-btn btn btn-default smoothScroll">Zobraziť blog</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item item-third">
                            <div class="caption">
                                <div class="container">
                                    <div class="col-md-6 col-sm-12">
                                        <h1>Pripojte sa k našej komunite</h1>
                                        <h3>Zdieľajte svoje skúsenosti a učte sa od ostatných.</h3>
                                        <a href="#blog" class="section-btn btn btn-default smoothScroll">Komunita</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BLOG SECTION -->
    <section id="blog" class="courses">
        <div class="container">
            <div class="row">
                <?php foreach($posts as $post): ?>
                <div class="col-md-4 col-sm-6">
                    <div class="courses-thumb courses-thumb-secondary">
                        <div class="courses-top">
                            <div class="courses-image">
                                <img src="<?php echo htmlspecialchars($post['image']); ?>" class="img-responsive" alt="">
                            </div>
                        </div>
                        <div class="courses-detail">
                            <h3><?php echo htmlspecialchars($post['title']); ?></h3>
                            <p><?php echo htmlspecialchars($post['excerpt']); ?></p>
                        </div>
                        <div class="courses-info">
                            <a href="post.php?id=<?php echo $post['id']; ?>" class="section-btn btn btn-primary">Čítať viac</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
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
    <script src="js/smoothscroll.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>