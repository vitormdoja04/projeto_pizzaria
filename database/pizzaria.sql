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
    cpf varchar(11) not null
);

CREATE TABLE sobremesa (
    id_sobremesa integer primary key auto_increment,
    nome_sobremesa varchar(50) not null,
    descricao_sobremesa varchar(200),
    valor_sobremesa numeric(8, 2) not null,
    link_imagem_sobremesa varchar(250)
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
    id_sobremesa integer,
	quantidade integer not null default 1,
	preco_unitario numeric(8,2) not null,
	foreign key (id_carrinho) references carrinho(id_carrinho),
	foreign key (id_pizza) references pizza(id_pizza),
	foreign key (id_bebida) references bebida(id_bebida),
    foreign key (id_sobremesa) references sobremesa(id_sobremesa)
);

INSERT INTO pizza (sabor_pizza, tamanho_pizza, borda_pizza, preco_pizza, link_imagem_pizza) 
VALUES 
('Margherita', 'Média', 'Tradicional', 35.00, 'https://s2-receitas.glbimg.com/wb7DIMyCpEyV07sTAtcDWD8HQjw=/0x0:1200x675/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_1f540e0b94d8437dbbc39d567a1dee68/internal_photos/bs/2024/h/r/EfCbvqTbeDRAD3Lzc5xA/pizza-margherita.jpg'),
('Calabresa', 'Grande', 'Recheada', 45.00, 'https://www.sabornamesa.com.br/media/k2/items/cache/513d7a0ab11e38f7bd117d760146fed3_XL.jpg'),
('Havaiana', 'Média', 'Tradicional', 38.00, 'https://receitasdepesos.com.br/wp-content/uploads/2023/08/shutterstock_84904861.jpg'),
('Pepperoni', 'Grande', 'Tradicional', 50.00, 'https://www.minhareceita.com.br/app/uploads/2022/12/Mpizza-de-pepperoni-caseira-portal-minha-receita.jpg'),
('Quatro Queijos', 'Grande', 'Recheada', 55.00, 'https://www.portalumami.com.br/app/uploads/2021/07/Pizza-4-queijos.jpg'),
('Portuguesa', 'Média', 'Tradicional', 40.00, 'https://receitasde.com.br/wp-content/uploads/2024/07/Pizza-Portuguesa.jpg');

INSERT INTO bebida (nome_bebida, tamanho_bebida, valor_bebida, link_imagem_bebida) VALUES
('Coca-Cola', '350ml', 4.50, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpP4qMPho8EVNFOiviTpYPKYxbW6PnZM6jVA&s'),
('Pepsi', '350ml', 4.50, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFvw74anN5nmA1oaRO5pF2nPJRPh7BwBX3aQ&s'),
('Guaraná Antarctica', '350ml', 4.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-tu5B3r6Fs7wGrOyEMTq187KBZPFQFNS35A&s'),
('Fanta Laranja', '350ml', 4.50, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRO8Feoj7O6PzSjoHreLxE9Q0Vt9jszLqFO1g&s'),
('Água Mineral', '500ml', 2.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMU7qwEU8D8gP0JLtf_MSGe6qHexqUynTQ9g&s'),
('Suco de Uva', '290ml', 5.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-Das1QbbtZT0bmoS97s5NFbcGi4MzB-FXYQ&s');

INSERT INTO sobremesa (nome_sobremesa, descricao_sobremesa, valor_sobremesa, link_imagem_sobremesa) VALUES
('Torta de Limão', 'Deliciosa torta de limão com creme e biscoito', 15.00, 'https://www.receitasnestle.com.br/sites/default/files/styles/recipe_detail_desktop/public/srh_recipes/2c753bd29007f95abbedde5d9087c4d4.png?itok=IEjczbgq'),
('Cheesecake', 'Cheesecake com calda de frutas vermelhas', 18.50, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREWG_3E4snHjhEwQHt-uCdCHlW1nYPPsK-sQ&s'),
('Pudim de Leite', 'Clássico pudim de leite condensado', 12.00, 'https://s2-receitas.glbimg.com/K8OwZ9N2sE5DJltr-CALvxFBXNw=/0x0:633x391/984x0/smart/filters:strip_icc()/s.glbimg.com/po/rc/media/2015/09/22/10_19_02_409_Pudim.png'),
('Brownie', 'Brownie de chocolate com castanhas', 14.50, 'https://www.inspiredtaste.net/wp-content/uploads/2024/01/Brownies-Recipe-Video.jpg'),
('Mousse de Maracujá', 'Mousse suave de maracujá', 10.00, 'https://static.itdg.com.br/images/360-240/8fed8f60d3c8e3990396e2478cbc7f2a/shutterstock-1905617575-1-.jpg'),
('Torta de Chocolate', 'Torta de chocolate recheada com ganache e cobertura de chantilly', 20.00, 'https://janacabral.com/wp-content/uploads/2023/07/ReceitaTorta-mousse-de-chocolate-7-e1689275489693.jpg');

select * from usuario;
