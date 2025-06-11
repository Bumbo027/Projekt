<?php
require_once 'inc/config.php';

$posts = $post->index();
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
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <?php include 'partials/navbar.php'; ?>
    
    <div class="content-wrapper">
        <!-- SLIDER -->
        <section id="home" class="slider mb-5" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row">
                    <section class="slides-container">
                        <div class="slide">
                            <img src="images/carousel.jpg">
                            <div class="slide-text">
                                <div class="caption">
                                    <div class="container">
                                        <div class="col-md-6 col-sm-12">
                                            <h1>Vitajte na PetBlogu</h1>
                                            <h3>Blog plný tipov a rád pre majiteľov domácich zvierat.</h3>
                                            <a href="#blog" class="btn btn-outline-light smoothScroll">Prečítajte si viac</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="slide">
                            <img src="images/carousel2.jpg">
                            <div class="slide-text">
                                <div class="caption">
                                    <div class="container">
                                        <div class="col-md-6 col-sm-12">
                                            <h1>Majte svojho miláčika v top forme</h1>
                                            <h3>Pravidelné články o výžive, starostlivosti a trénovaní.</h3>
                                            <a href="#blog" class="btn btn-outline-light smoothScroll">Zobraziť blog</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="slide">
                            <img src="images/carousel3.jpg">
                            <div class="slide-text">
                                <div class="caption">
                                    <div class="container">
                                        <div class="col-md-6 col-sm-12">
                                            <h1>Pripojte sa k našej komunite</h1>
                                            <h3>Zdieľajte svoje skúsenosti a učte sa od ostatných.</h3>
                                            <a href="#blog" class="btn btn-outline-light smoothScroll">Komunita</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <a id="prev" class="prev">❮</a>
                        <a id="next" class="next">❯</a>
                    </section>
                </div>
            </div>
        </section>
    
    <!-- BLOG SECTION -->
    <section id="blog" class="courses">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center mb-3">
                        <h2>Najnovšie príspevky</h2>
                        <small>Objavte užitočné informácie pre vašich domácich miláčikov</small>
                    </div>
                </div>
                
                <?php if (empty($posts)): ?>
                <div class="col-12">
                    <p class="text-center">Žiadne príspevky na zobrazenie.</p>
                </div>
                <?php else: ?>
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php foreach($posts as $post_item): ?>
                        <div class="col">
                            <div class="courses-thumb courses-thumb-secondary h-100">
                                <div class="courses-top">
                                    <div class="courses-image">
                                        <img src="<?php echo htmlspecialchars($post_item['image']); ?>" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <div class="courses-detail">
                                    <h3><?php echo htmlspecialchars($post_item['title']); ?></h3>
                                    <p><?php echo htmlspecialchars($post_item['excerpt']); ?></p>
                                </div>
                                <div class="courses-info">
                                    <a href="post.php?id=<?php echo $post_item['id']; ?>" class="btn btn-success">Čítať viac</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    </div>
    
    <?php include 'partials/footer.php'; ?>
</body>
</html>