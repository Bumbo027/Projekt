<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

$posts = json_decode(file_get_contents('posts.json'), true);
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['delete_id'])) {
        $delid = (int)$_POST['delete_id'];
        $posts = array_filter($posts, fn($p) => $p['id'] !== $delid);
        file_put_contents('posts.json', json_encode(array_values($posts), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        header('Location: admin.php');
        exit;
    }
    if(isset($_POST['title'])) {
        $title = trim($_POST['title']);
        $excerpt = trim($_POST['excerpt']);
        $content = trim($_POST['content']);
        $image = trim($_POST['image']);
        $ids = array_column($posts, 'id');
        $newId = $ids ? max($ids) + 1 : 1;
        $posts[] = ['id' => $newId, 'title' => $title, 'excerpt' => $excerpt, 'content' => $content, 'image' => $image];
        file_put_contents('posts.json', json_encode($posts, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        header('Location: admin.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Admin - PetBlog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
</head>
<body>
    <div class="container" style="margin-top:100px;">
        <h1>Admin rozhranie</h1>
        <a href="logout.php" class="btn btn-warning" style="margin-bottom:20px;">Odhlásiť sa</a>
        <h2>Existujúce príspevky</h2>
        <table class="table table-striped">
            <thead><tr><th>ID</th><th>Názov</th><th>Akcie</th></tr></thead>
            <tbody>
            <?php foreach($posts as $post): ?>
            <tr>
                <td><?php echo $post['id']; ?></td>
                <td><?php echo htmlspecialchars($post['title']); ?></td>
                <td>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Zmazať</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Pridať príspevok</h2>
        <form method="post">
            <div class="form-group">
                <label>Názov:<input type="text" name="title" class="form-control" required></label>
            </div>
            <div class="form-group">
                <label>Excerpt:<input type="text" name="excerpt" class="form-control" required></label>
            </div>
            <div class="form-group">
                <label>Obsah:<textarea name="content" class="form-control" required></textarea></label>
            </div>
            <div class="form-group">
                <label>URL obrázka:<input type="text" name="image" class="form-control" required></label>
            </div>
            <button type="submit" class="btn btn-primary">Pridať</button>
        </form>
    </div>
    
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