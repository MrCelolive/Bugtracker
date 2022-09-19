DROP TABLE IF EXISTS compra_produto;
DROP TABLE IF EXISTS compra;
DROP TABLE IF EXISTS produto;
DROP TABLE IF EXISTS utilizador;
DROP TABLE IF EXISTS tipoUtilizador;

CREATE TABLE tipoUtilizador(
    id INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(255)
);

CREATE TABLE utilizador(
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    foto VARCHAR(255),
    id_tipoUtilizador INT,
    dataHoraBan DATETIME,

    FOREIGN KEY (id_tipoUtilizador) REFERENCES tipoUtilizador(id)
);

CREATE TABLE produto(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255),
    descricao VARCHAR(255),
    preco DOUBLE,
    quantidadeStock INT,
    tipoProduto VARCHAR(255),
    visibilidade BOOLEAN,
    foto VARCHAR(255)
);

CREATE TABLE compra (
    id INT PRIMARY KEY AUTO_INCREMENT,
    precoTotal DOUBLE,
    numArtigos INT,
    dataHora DATETIME,
    estado VARCHAR(255),
    id_utilizador INT,
    FOREIGN KEY(id_utilizador) REFERENCES utilizador(id)
);

CREATE TABLE compra_produto(
    id_compra INT,
    id_produto INT,
    quantidade INT,
    preco_unit DOUBLE,

    PRIMARY KEY(id_compra, id_produto),
    FOREIGN KEY(id_compra) REFERENCES compra (id),
    FOREIGN KEY(id_produto) REFERENCES produto (id)
);

INSERT INTO tipoUtilizador (descricao) VALUES ('administrador');
INSERT INTO tipoUtilizador (descricao) VALUES ('utilizador');

INSERT INTO utilizador (username,password, foto, id_tipoUtilizador) VALUES('admin','pass', 'u1.png', 1);
INSERT INTO utilizador (username,password, foto, id_tipoUtilizador) VALUES('user','pass', 'u2.png', 2);
INSERT INTO utilizador (username,password, foto, id_tipoUtilizador, dataHoraBan) VALUES('ban','pass', 'u3.png', 2, '2023-01-01 10:00');

INSERT INTO produto (nome,descricao,preco,quantidadeStock, tipoProduto, visibilidade, foto) VALUES('Monitor','Monitor de 32',100,10,'Hardware',true, 'p1.png');
INSERT INTO produto (nome,descricao,preco,quantidadeStock, tipoProduto, visibilidade, foto) VALUES('Teclado','Teclado PT',10,12,'Hardware',true, 'p2.png');
INSERT INTO produto (nome,descricao,preco,quantidadeStock, tipoProduto, visibilidade, foto) VALUES('Tinteiros','Tinteiro para Impressora XPTO',30,8,'Consumíveis',false, 'p3.png');

INSERT INTO compra(precoTotal, numArtigos, dataHora, estado, id_utilizador) VALUES(130,11,'2022-01-01 10:00','Finalizada',1);

INSERT INTO compra(precoTotal, numArtigos, dataHora, estado, id_utilizador) VALUES(130,11,'','Carrinho',1);

INSERT INTO compra(precoTotal, numArtigos, dataHora, estado, id_utilizador) VALUES(0,0,'','Carrinho',2);

INSERT INTO compra_produto VALUES (1,2,10,10);
INSERT INTO compra_produto VALUES (1,3,1,30);
INSERT INTO compra_produto VALUES (2,2,10,10);
INSERT INTO compra_produto VALUES (2,3,1,30);