CREATE DATABASE IF NOT EXISTS petblog CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE petblog;

CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    excerpt TEXT NOT NULL,
    content LONGTEXT NOT NULL,
    image VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Vloženie ukážkových príspevkov
INSERT INTO posts (title, excerpt, content, image) VALUES
('Ako sa starať o psa', 'Základné tipy pre zdravie vášho psa.', '<p>Detaily o kŕmení, venčení a starostlivosti o vášho štvornohého priateľa.</p>', 'images/dog1.jpg'),
('Výživa mačiek', 'Správne krmivo pre vašu mačku.', '<p>Informácie o diétach, vitamínoch a stravovacích návykoch mačiek.</p>', 'images/cat1.jpg');

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Heslo: admin123
INSERT INTO users (username, password) VALUES 
('admin', '$2a$12$kdsvVp9Qvs1ziBJpP6qG2OpHQR/k0Y1RR951RYJFeYGemUPR6PtN6');