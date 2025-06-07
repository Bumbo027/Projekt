CREATE DATABASE IF NOT EXISTS petblog CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE petblog;
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    excerpt TEXT NOT NULL,
    content LONGTEXT NOT NULL,
    image VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO posts (title, excerpt, content, image) VALUES
('Ako sa starať o psa', 'Základné tipy pre zdravie vášho psa.', '<p>Detaily o kŕmení, venčení a starostlivosti o vášho štvornohého priateľa.</p>', 'images/dog1.png'),
('Výživa mačiek', 'Správne krmivo pre vašu mačku.', '<p>Informácie o diétach, vitamínoch a stravovacích návykoch mačiek.</p>', 'images/cat1.jpg');
