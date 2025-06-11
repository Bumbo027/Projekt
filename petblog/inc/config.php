<?php
// Definovanie konštánt pre pripojenie k databáze
define('DB_HOST', 'localhost');
define('DB_NAME', 'petblog');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_CHARSET', 'utf8mb4');

// Načítanie externých PHP súborov s definíciou tried
require_once 'inc/database.php';
require_once 'inc/post.php';
require_once 'inc/user.php';
require_once 'inc/auth.php';

// Vytvorenie inštancií objektov pre ďalšiu prácu
$database = new Database();
$post = new Post($database);
$user = new User($database);
$auth = new Auth($database, $user);