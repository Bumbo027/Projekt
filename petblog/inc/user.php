<?php

class User {
    private $db;

    public function __construct(Database $database) {
        $this->db = $database->getConnection();
    }

    /**
     * Nájde používateľa podľa používateľského mena
     */
    public function findByUsername(string $username): ?array {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    /**
     * Overí heslo používateľa
     */
    public function verifyPassword(array $user, string $password): bool {
        return password_verify($password, $user['password']);
    }
}