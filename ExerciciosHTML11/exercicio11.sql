-- 1. Criar uma base de dados
CREATE DATABASE biblioteca;

-- 2. Selecionar a base de dados para uso
USE biblioteca;

-- 3. Criar uma tabela com 3 campos
CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100),
    autor VARCHAR(100)
);

-- 4. Inserir dados
INSERT INTO livros (titulo, autor) VALUES
('O Senhor dos Anéis', 'J.R.R. Tolkien'),
('Dom Casmurro', 'Machado de Assis');

-- 5. Alterar dados
UPDATE livros
SET autor = 'Machado de Souza'
WHERE autor = 'Machado de Assis';

-- 6. Visualizar dados
SELECT * FROM livros;

-- 7. Apagar dados
DELETE FROM livros
WHERE titulo = 'O Senhor dos Anéis';

-- 8. Apagar a tabela
DROP TABLE livros;

-- 9. Apagar a base de dados
DROP DATABASE biblioteca;
