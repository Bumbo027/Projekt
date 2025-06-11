<?php
// Trieda na pripojenie k databáze pomocou PDO
class Database {
    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset;
    private $pdo;

   // Konštruktor – nastaví parametre a vytvorí pripojenie k databáze
    public function __construct() {
        $this->host = DB_HOST;
        $this->db = DB_NAME;
        $this->user = DB_USER;
        $this->pass = DB_PASS;
        $this->charset = DB_CHARSET;
        // Vytvorenie DSN (reťazec pre pripojenie)
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Ak sa pripojenie nepodarí, vypíše chybu a skončí
            die('Connection failed: ' . $e->getMessage());
        }
    }
    // Destruktor – zatvorí pripojenie k databáze (uvoľní objekt)
    public function __destruct() {
        $this->pdo = null;
    }
    // Funkcia, ktorá vráti PDO pripojenie na použitie v iných triedach
    public function getConnection() {
        return $this->pdo;
    }
}