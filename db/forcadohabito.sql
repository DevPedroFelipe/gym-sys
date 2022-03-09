# PARA CRIAR O BANCO DE DADOS
CREATE DATABASE FORCADOHABITO;

# PARA UTILIZAR O BANCO DE DADOS
USE FORCADOHABITO;

# PARA CRIAR A TABELA DE USUÁRIO
CREATE TABLE USUARIO(
    ID                  INT                 NOT NULL        AUTO_INCREMENT,
    NOMECOMPLETO        VARCHAR(150)        NOT NULL,
    LOGIN               VARCHAR(25)         NOT NULL,
    SENHA               VARCHAR(150)        NOT NULL,
    PERFIL              VARCHAR(25)         NOT NULL,
    EMAIL               VARCHAR(25)         NOT NULL,
    STATUS              BOOLEAN             NOT NULL,
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
    NOMECOMPLETO        VARCHAR(150)        NOT NULL,
    DATANASCIMENTO      DATE                NOT NULL,
    CPF                 CHAR(14)            NOT NULL,
    SEXO                CHAR(1)             NULL,
    EMAIL               VARCHAR(25)         NOT NULL,
    TELEFONE            CHAR(13)            NULL,
    OBSERVACAO          VARCHAR(1000)       NULL,
    STATUS              BOOLEAN             NOT NULL,
    DATACADASTRO        DATETIME            NOT NULL,
    PRIMARY KEY(ID),
    FOREIGN KEY(IDCATEGORIA) REFERENCES CATEGORIA(ID)                     
    );


    INSERT INTO USUARIO(NOMECOMPLETO, LOGIN, SENHA,
     PERFIL, EMAIL, DATACADASTRO)
     VALUES('Pedro Felipe Marques Ramos de França', 'lipe', SHA1('123456'),
     'Premium', 'tipedrofelipe@gmail.com', TRUE, '2022-03-08 09:43:08');