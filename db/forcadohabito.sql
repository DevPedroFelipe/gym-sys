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
     'Administrar', 'tipedrofelipe@gmail.com', '2022-03-08 09:43:08');

     INSERT INTO CATEGORIA(NOME, DESCRICAO) 
     VALUES ('Grátis', 'Categoria do tipo grátis.');

     INSERT INTO CATEGORIA(NOME, DESCRICAO) 
     VALUES ('Normal', 'Categoria do tipo normal.');

     INSERT INTO CATEGORIA(NOME, DESCRICAO) 
     VALUES ('Prêmio', 'Categoria do tipo prêmio.');

    INSERT INTO CLIENTE(IDCATEGORIA, NOME, DATANASCIMENTO, CPF,
     SEXO, EMAIL, TELEFONE, OBSERVACAO, DATACADASTRO)
     VALUES(1, 'Daniely Nascimento Faustino da Silva', '1991-06-10', '589.589.968-54', 'F', 'Danyzinha@gmail.com',
     '998789658', 'Nenhum problema de sáude', '2022-03-09 21:50:45');