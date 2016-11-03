create database loja;
use loja;
create table produtos (id integer auto_increment primary key, nome varchar(255), preco decimal(10,2));
insert into produtos (nome, preco) values ('Carro', 20000);
insert into produtos (nome, preco) values ('Motocicleta', 10000);
insert into produtos (nome, preco) values ('Bicicleta', 300);
alter table produtos add column descricao text;
update produtos set descricao = 'Descrição deste produto.';
