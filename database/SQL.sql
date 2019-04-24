CREATE DATABASE projeto_cursos;
CREATE TABLE usuarios (
id_usuario INT NOT NULL PRIMARY KEY UNIQUE auto_increment,
nome VARCHAR (100) NOT NULL,
email VARCHAR (65) NOT NULL UNIQUE,
senha INT (65) NOT NULL,
cpf INT UNIQUE,
tipo_usuario INT,
foto VARCHAR (65)
);

CREATE TABLE tipo_usuario (
id_tipo_usuario INT NOT NULL PRIMARY KEY UNIQUE auto_increment,
nome VARCHAR (65) NOT NULL
);

CREATE TABLE cursos(
id_curso INT NOT NULL PRIMARY KEY UNIQUE auto_increment,
nome VARCHAR (100) NOT NULL,
descricao TEXT,
preco FLOAT DEFAULT 0.0,
tag VARCHAR (65),
imagem VARCHAR (3000),
professor INT
);

CREATE TABLE professor (
id_professor INT NOT NULL PRIMARY KEY UNIQUE auto_increment,
nome VARCHAR (100)
);

ALTER TABLE usuarios CHANGE tipo_usuario tipo_usuario_fk INT;

ALTER TABLE usuarios ADD FOREIGN KEY (tipo_usuario_fk) REFERENCES tipo_usuario (id_tipo_usuario);

ALTER TABLE cursos CHANGE professor professor_fk INT;

ALTER TABLE cursos ADD foreign key (professor_fk) references professor (id_professor); 

