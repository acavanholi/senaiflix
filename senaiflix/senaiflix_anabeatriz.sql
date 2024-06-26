CREATE DATABASE senaiflix_anabeatriz;
USE senaiflix_anabeatriz;

CREATE TABLE clientes (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100),
cpf VARCHAR(11),
endereco VARCHAR(255),
bairro VARCHAR(100),
cidade VARCHAR(100),
estado VARCHAR(2),
cep VARCHAR(8),
email VARCHAR(100),
telefone VARCHAR(15),
data_cadastro DATETIME,
data_atualizacao DATETIME,
status INT(1)
);

CREATE TABLE filmes(
id INT AUTO_INCREMENT PRIMARY KEY,
titulo VARCHAR(255),
descricao TEXT, 
ano_lancamento DATE,
genero VARCHAR(100),
classificacao VARCHAR(10),
data_cadastro DATETIME,
data_atualizacao DATETIME,
status INT(1)
);


CREATE TABLE assinaturas(
id INT AUTO_INCREMENT PRIMARY KEY,
id_cliente INT,
plano VARCHAR(50),
data_inicio DATE,
data_fim DATE;
data_cadastro DATETIME,
data_atualizacao DATETIME,
status INT(1),
FOREIGN KEY (id_cliente) REFERENCES clientes(id)
);


CREATE TABLE usuarios(
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(255),
usuario VARCHAR(50) UNIQUE,
senha VARCHAR(255),
email VARCHAR(100) UNIQUE,
data_cadastro DATETIME,
data_atualizacao DATETIME,
status INT(1)
);

