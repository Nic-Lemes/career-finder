CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomeCompleto VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    numeroTelefone VARCHAR(20) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    uf VARCHAR(2) NOT NULL,
    UNIQUE(email)
);