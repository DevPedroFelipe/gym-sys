# PARA CRIAR O BANCO DE DADOS
CREATE DATABASE FORCADOHABITO;

# PARA UTILIZAR O BANCO DE DADOS
USE FORCADOHABITO;

# PARA CRIAR A TABELA DE USUÁRIO
CREATE TABLE USUARIO(
    ID                  INT                 NOT NULL        AUTO_INCREMENT,
    NOME                VARCHAR(150)        NOT NULL,
    LOGIN               VARCHAR(25)         NOT NULL,
    SENHA               VARCHAR(150)        NOT NULL,
    PERFIL              VARCHAR(25)         NOT NULL,
    EMAIL               VARCHAR(25)         NOT NULL,
    DATACADASTRO        DATETIME            NOT NULL,
    PRIMARY KEY(ID)
);

# PARA CRIAR A TABELA DE CATEGORIA
CREATE TABLE CATEGORIA(
    ID                  INT                 NOT NULL        AUTO_INCREMENT,
    NOME                VARCHAR(150)        NOT NULL,
    DESCRICAO           TEXT                NULL,
    PRIMARY KEY(ID)
);

# PARA CRIAR A TABELA DE CLIENTE
CREATE TABLE CLIENTE(
    ID                  INT                 NOT NULL        AUTO_INCREMENT,
    IDCATEGORIA         INT                 NOT NULL,
    NOME                VARCHAR(150)        NOT NULL,
    DATANASCIMENTO      DATE                NOT NULL,
    CPF                 CHAR(14)            NOT NULL,
    SEXO                CHAR(1)             NULL,
    EMAIL               VARCHAR(25)         NOT NULL,
    TELEFONE            CHAR(13)            NULL,
    OBSERVACAO          VARCHAR(1000)       NULL,
    DATACADASTRO        DATETIME            NOT NULL,
    PRIMARY KEY(ID),
    FOREIGN KEY(IDCATEGORIA) REFERENCES CATEGORIA(ID)                     
    );

    INSERT INTO USUARIO(NOME, LOGIN, SENHA,
     PERFIL, EMAIL, DATACADASTRO)
     VALUES('Administrador', 'admin', SHA1('123456'),
     'Administrar', 'adm@gmail.com', '2022-03-10 09:43:08');

    INSERT INTO USUARIO(NOME, LOGIN, SENHA,
     PERFIL, EMAIL, DATACADASTRO)
     VALUES('Pedro Felipe Marques Ramos de França', 'lipe', SHA1('123456'),
     'Operador', 'tipedrofelipe@gmail.com', '2022-03-08 09:43:08');

     INSERT INTO USUARIO(NOME, LOGIN, SENHA,
     PERFIL, EMAIL, DATACADASTRO)
     VALUES('João da Silva Marques', 'joao', SHA1('123456'),
     'Visualizador', 'joao@gmail.com', '2022-03-09 12:13:18');

     INSERT INTO CATEGORIA(NOME, DESCRICAO) 
     VALUES ('Grátis', 'Categoria do tipo grátis.');

     INSERT INTO CATEGORIA(NOME, DESCRICAO) 
     VALUES ('Normal', 'Categoria do tipo normal.');

     INSERT INTO CATEGORIA(NOME, DESCRICAO) 
     VALUES ('Prêmio', 'Categoria do tipo prêmio.');

    INSERT INTO CLIENTE(IDCATEGORIA, NOME, DATANASCIMENTO, CPF,
     SEXO, EMAIL, TELEFONE, OBSERVACAO, DATACADASTRO)
     VALUES(2, 'Daniely Nascimento Faustino da Silva', '1991-06-10', '589.589.968-54', 'f', 'Danyzinha@gmail.com',
     '998789658', 'Nenhum problema de saúde', '2022-03-09 21:50:45');

     INSERT INTO CLIENTE(IDCATEGORIA, NOME, DATANASCIMENTO, CPF,
     SEXO, EMAIL, TELEFONE, OBSERVACAO, DATACADASTRO)
     VALUES(1, 'Otávio de Freitas Lopes', '1984-08-21', '698.147.326-96', 'm', 'otavio@gmail.com',
     '936782698', 'Problemas na coluna', '2022-03-09 18:53:14');

     INSERT INTO CLIENTE(IDCATEGORIA, NOME, DATANASCIMENTO, CPF,
     SEXO, EMAIL, TELEFONE, OBSERVACAO, DATACADASTRO)
     VALUES(3, 'Vanessa Rebeca da Silva', '1992-07-30', '746.698.125-23', 'f', 'vanessa@gmail.com',
     '301786987', 'Possui dor nas pernas', '2022-03-10 15:25:18');

     INSERT INTO CLIENTE(IDCATEGORIA, NOME, DATANASCIMENTO, CPF,
     SEXO, EMAIL, TELEFONE, OBSERVACAO, DATACADASTRO)
     VALUES(3, 'Paulo Ribeiro Texeira', '1984-06-15', '987.264.368-12', 'm', 'paulo@gmail.com',
     '936473657', 'Possui pino no joelho', '2022-03-10 15:34:25');

     INSERT INTO CLIENTE(IDCATEGORIA, NOME, DATANASCIMENTO, CPF,
     SEXO, EMAIL, TELEFONE, OBSERVACAO, DATACADASTRO)
     VALUES(3, 'Manuela Pinheiro de Paula', '2003-12-27', '236.647.036-96', 'f', 'manuela@gmail.com',
     '914363659', 'Nenhum problema de saúde', '2022-03-11 20:14:59');