create database pizzaria;

use pizzaria;

CREATE TABLE bebida (
	id_bebida integer primary key auto_increment,
	nome_bebida varchar(50) not null,
	tamanho_bebida varchar(10) not null,
	valor_bebida NUMERIC(8,2) not null, 
    link_imagem_bebida varchar(250)
);

CREATE TABLE pizza (
	id_pizza integer primary key auto_increment,
	sabor_pizza varchar(50) not null,
	tamanho_pizza varchar(10) not null,
	borda_pizza varchar(20) not null,
	preco_pizza numeric(8,2) not null,
	link_imagem_pizza varchar(250)
);

CREATE TABLE usuario (
	id_usuario integer primary key auto_increment,
	email varchar(50) not null,
	senha varchar(50) not null,
	nome varchar(50) not null,
	telefone varchar(15) not null, 
    cpf integer not null
);

CREATE TABLE carrinho (
	id_carrinho integer primary key auto_increment,
	id_usuario integer not null,
	data_criacao datetime default current_timestamp,
	status varchar(20) default 'aberto',
	foreign key (id_usuario) references usuario(id_usuario)
);

CREATE TABLE item_carrinho (
	id_item_carrinho integer primary key auto_increment,
	id_carrinho integer not null,
	id_pizza integer,
	id_bebida integer,
	quantidade integer not null default 1,
	preco_unitario numeric(8,2) not null,
	foreign key (id_carrinho) references carrinho(id_carrinho),
	foreign key (id_pizza) references pizza(id_pizza),
	foreign key (id_bebida) references bebida(id_bebida)
)