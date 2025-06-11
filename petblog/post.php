<?php
require_once 'inc/config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$post_data = $post->show($id);

if (!$post_data) {
    echo 'Príspevok nenájdený.';
    exit;
}
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($post_data['title']); ?> - PetBlog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="<?php echo htmlspecialchars($post_data['excerpt']); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <?php include 'partials/navbar.php'; ?>
    
    <div class="content-wrapper">
    <section class="blog-post mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-4"><?php echo htmlspecialchars($post_data['title']); ?></h2>
                    <img src="<?php echo htmlspecialchars($post_data['image']); ?>" class="img-fluid mb-4" alt="">
                    <div class="mb-4"><?php echo $post_data['content']; ?></div>
                    <a href="index.php" class="btn btn-primary">Späť na blog</a>
                </div>
            </div>
        </div>
    </section>
    </div>
    
    <?php include 'partials/footer.php'; ?>
</body>
</html>