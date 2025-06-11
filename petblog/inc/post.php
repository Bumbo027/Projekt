<?php
    /**
     * Trieda Post slúži na prácu s blogovými príspevkami
     * cez $db sa pripojuje k databáze
     */

class Post {
    private $db;

    public function __construct(Database $database) {
        $this->db = $database->getConnection();
    }

    /**
     * Získa všetky príspevky
     */
    public function index(): array {
        $stmt = $this->db->prepare("SELECT * FROM posts ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Získa jeden príspevok podľa ID
     */
    public function show(int $id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    /**
     * Vytvorí nový príspevok
     */
    public function create(array $data): int {
        $stmt = $this->db->prepare("INSERT INTO posts (title, excerpt, content, image) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $data['title'],
            $data['excerpt'],
            $data['content'],
            $data['image']
        ]);
        return (int)$this->db->lastInsertId();
    }

    /**
     * Aktualizuje existujúci príspevok
     */
    public function update(int $id, array $data): bool {
        $stmt = $this->db->prepare("UPDATE posts SET title = ?, excerpt = ?, content = ?, image = ? WHERE id = ?");
        return $stmt->execute([
            $data['title'],
            $data['excerpt'],
            $data['content'],
            $data['image'],
            $id
        ]);
    }

    /**
     * Odstráni príspevok
     */
    public function delete(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM posts WHERE id = ?");
        return $stmt->execute([$id]);
    }
}