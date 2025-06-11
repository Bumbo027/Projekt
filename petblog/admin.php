<?php
require_once 'inc/config.php';

// Kontrola prihlásenia
$auth->requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Odstránenie príspevku
    if (isset($_POST['delete_id'])) {
        $id = (int)$_POST['delete_id'];
        if ($post->delete($id)) {
            header('Location: admin.php?message=deleted');
            exit;
        }
    }
    
    // Vytvorenie príspevku
    if (isset($_POST['title']) && !isset($_POST['update_id'])) {
        $data = [
            'title' => trim($_POST['title']),
            'excerpt' => trim($_POST['excerpt']),
            'content' => trim($_POST['content']),
            'image' => trim($_POST['image'])
        ];
        
        if ($post->create($data)) {
            header('Location: admin.php?message=created');
            exit;
        }
    }
    
    // Aktualizácia príspevku
    if (isset($_POST['title']) && isset($_POST['update_id'])) {
        $id = (int)$_POST['update_id'];
        $data = [
            'title' => trim($_POST['title']),
            'excerpt' => trim($_POST['excerpt']),
            'content' => trim($_POST['content']),
            'image' => trim($_POST['image'])
        ];
        
        if ($post->update($id, $data)) {
            header('Location: admin.php?message=updated');
            exit;
        }
    }
}

$edit_post = null;
if (isset($_GET['edit_id'])) {
    $edit_id = (int)$_GET['edit_id'];
    $edit_post = $post->show($edit_id);
}

$posts = $post->index();

$messages = [
    'deleted' => 'Príspevok bol úspešne odstránený.',
    'created' => 'Príspevok bol úspešne vytvorený.',
    'updated' => 'Príspevok bol úspešne aktualizovaný.'
];
$message = isset($_GET['message']) && isset($messages[$_GET['message']]) ? $messages[$_GET['message']] : null;
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Admin - PetBlog</title>
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
    <div class="container mt-5 pt-5 mb-5">
        <h1 class="mt-4">Admin rozhranie</h1>
        <div class="mb-4 mt-3">
            <a href="logout.php" class="btn btn-warning me-2">Odhlásiť sa</a>
            <a href="index.php" class="btn btn-info">Späť na stránku</a>
        </div>
        
        <?php if ($message): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        
        <h2>Existujúce príspevky</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Názov</th>
                    <th>Akcie</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($posts)): ?>
                    <tr>
                        <td colspan="3">Žiadne príspevky na zobrazenie.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach($posts as $post_item): ?>
                    <tr>
                        <td><?php echo $post_item['id']; ?></td>
                        <td><?php echo htmlspecialchars($post_item['title']); ?></td>
                        <td>
                            <a href="?edit_id=<?php echo $post_item['id']; ?>" class="btn btn-primary btn-sm">Upraviť</a>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="delete_id" value="<?php echo $post_item['id']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Naozaj chcete zmazať tento príspevok?')">Zmazať</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        
        <h2><?php echo $edit_post ? 'Upraviť príspevok' : 'Pridať príspevok'; ?></h2>
        <form method="post">
            <?php if ($edit_post): ?>
                <input type="hidden" name="update_id" value="<?php echo $edit_post['id']; ?>">
            <?php endif; ?>
            
            <div class="mb-3">
                <label for="title" class="form-label">Názov:</label>
                <input type="text" name="title" id="title" class="form-control" value="<?php echo $edit_post ? htmlspecialchars($edit_post['title']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="excerpt" class="form-label">Excerpt:</label>
                <input type="text" name="excerpt" id="excerpt" class="form-control" value="<?php echo $edit_post ? htmlspecialchars($edit_post['excerpt']) : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Obsah:</label>
                <textarea name="content" id="content" class="form-control" rows="10" required><?php echo $edit_post ? htmlspecialchars($edit_post['content']) : ''; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">URL obrázka:</label>
                <input type="text" name="image" id="image" class="form-control" value="<?php echo $edit_post ? htmlspecialchars($edit_post['image']) : ''; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo $edit_post ? 'Aktualizovať' : 'Pridať'; ?></button>
            <?php if ($edit_post): ?>
                <a href="admin.php" class="btn btn-outline-secondary">Zrušiť</a>
            <?php endif; ?>
        </form>
    </div>
    </div>
    
    <?php include 'partials/footer.php'; ?>
</body>
</html>