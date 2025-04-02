-- Criação do banco de dados
CREATE DATABASE sistema;

-- Usar o banco
USE sistema;

-- Criar tabela de usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    login VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);


-- Criar tabela de doutores
CREATE TABLE doutores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    especialidade VARCHAR(50) NOT NULL,
    distancia VARCHAR(20),
    avaliacao FLOAT,
    comentarios INT,
    horario VARCHAR(50)
);

-- Inserir doutores

INSERT INTO doutores (nome, especialidade, distancia, avaliacao, comentarios, horario) VALUES
('Dr. Joseph Brostitto', 'Nutricionista', '1.2 KM', 4.5, 50, 'Abre às 18:00'),
('Dr. Carlos Machado', 'Nutricionista', '2.0 KM', 4.8, 65, 'Abre às 09:00'),
('Dra. Maria Fernanda', 'Clínica Geral', '3.5 KM', 4.7, 80, 'Abre às 10:00'),
('Dr. Luiz Henrique', 'Cardiologista', '5.0 KM', 4.9, 120, 'Abre às 14:00');
