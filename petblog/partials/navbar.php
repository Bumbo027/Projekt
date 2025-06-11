<!-- NAVBAR -->
<nav class="navbar custom-navbar navbar-expand-lg fixed-top" role="navigation">
    <div class="container">
        <a href="index.php" class="navbar-brand">PetBlog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Domov</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php#blog">Blog</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if ($auth->isLoggedIn()): ?>
                    <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Odhlásiť sa</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Prihlásiť sa</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>