/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     23/10/2013 20:39:48                          */
/*==============================================================*/


drop table if exists TBL_CIDADE;

drop table if exists TBL_CLIENTE;

/*==============================================================*/
/* Table: TBL_CIDADE                                            */
/*==============================================================*/
create table TBL_CIDADE
(
   CID_CODIGO           int not null,
   CID_DESCRICAO        varchar(40) not null,
   CID_UF               char(2),
   primary key (CID_CODIGO)
);

/*==============================================================*/
/* Table: TBL_CLIENTE                                           */
/*==============================================================*/
create table TBL_CLIENTE
(
   CLI_CODIGO           int not null,
   CID_CODIGO           int not null,
   CLI_NOME             varchar(40) not null,
   CLI_ENDERECO         varchar(50),
   CLI_NUMERO           varchar(10),
   CLI_COMPLEMENTO      varchar(20),
   CLI_BAIRRO           varchar(30),
   CLI_CEP              char(10),
   CLI_FONERES          varchar(16),
   CLI_FONECEL          varchar(16),
   CLI_FONECON          varchar(16),
   CLI_CPF              varchar(14),
   CLI_RG               varchar(20),
   CLI_DATACADASTRO     date,
   CLI_DATANASC         date,
   CLI_EMAIL            varchar(60),
   CLI_LOGIN            varchar(20),
   CLI_SENHA            varchar(15),
   CLI_DATAULTCOMP      date,
   CLI_VALOR_ULTCOMP    numeric(10,2),
   CLI_VALOR_TOTAL      numeric(10,2),
   primary key (CLI_CODIGO)
);

alter table TBL_CLIENTE add constraint FK_CIDADES_CLIENTES foreign key (CID_CODIGO)
      references TBL_CIDADE (CID_CODIGO) on delete restrict on update restrict;

