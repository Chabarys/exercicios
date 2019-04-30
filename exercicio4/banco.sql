create table biblioteca(
	idbiblioteca integer not null,
	datacriacao date not null default current_date,
	horacriacao time not null default current_time,
	nome varchar(100) not null,
	telefone varchar(20) not null,
	constraint pk_biblioteca primary key (idbiblioteca)
);
create table livro(
	idlivro integer,
	datacriacao date not null default current_date,
	horacriacao time not null default current_time,
	nome varchar(50) not null,
	preco numeric(12,2) not null default 0,
	idbiblioteca integer not null,
	constraint pk_livro primary key (idlivro),
	constraint fk_livro_biblioteca foreign key (idbiblioteca) references biblioteca (idbiblioteca) on delete restrict on update cascade
	
);
	