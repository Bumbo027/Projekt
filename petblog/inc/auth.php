<?php

class Auth {
    private $db;  // Premenná na uchovanie pripojenia k databáze
    private $user; // Premenná na uchovanie objektu používateľa
    // Konštruktor triedy - spustí sa automaticky pri vytvorení objektu
    public function __construct(Database $database, User $user) {
        $this->db = $database->getConnection();            // Získa pripojenie k databáze z objektu Database
        $this->user = $user; 
        // Ak ešte nebeží session, tak ju spustí                             // Uloží objekt používateľa
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Prihlási používateľa
     */
    public function login(string $username, string $password): bool {
        $user = $this->user->findByUsername($username);
        if ($user && $this->user->verifyPassword($user, $password)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
        return false;
    }

    /**
     * Odhlási používateľa
     */
    public function logout(): void {
        session_unset();
        session_destroy();
    }

    /**
     * Kontroluje, či je používateľ prihlásený
     */
    public function isLoggedIn(): bool {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    /**
     * Presmeruje na prihlásenie, ak používateľ nie je prihlásený
     */
    public function requireLogin(): void {
        if (!$this->isLoggedIn()) {
            header('Location: login.php');
            exit;
        }
    }
}