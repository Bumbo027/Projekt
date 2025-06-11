<?php
require_once 'inc/config.php';

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($auth->login($username, $password)) {
        header('Location: admin.php');
        exit;
    } else {
        $error = 'Nesprávne prihlasovacie meno alebo heslo.';
    }
}
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Prihlásenie - PetBlog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <?php include 'partials/navbar.php'; ?>

    <div class="content-wrapper">
    <section class="mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="feature-thumb mt-5">
                        <h2 class="mb-4">Prihlásenie do administrácie</h2>
                        <?php if ($error): ?>
                            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                        <?php endif; ?>
                        <form method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Meno:</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Heslo:</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Prihlásiť sa</button>
                            <a href="index.php" class="btn btn-outline-secondary">Späť na stránku</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    
    <?php include 'partials/footer.php'; ?>
</body>
</html>
