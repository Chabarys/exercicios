create table pergunta (
	idpergunta SERIAL,
	texto text not null,
	constraint pk_pergunta primary key (idpergunta)
);

create table resposta (
	idresposta SERIAL,
	idpergunta integer not null,
	texto text not null, 
	correto boolean not null,
	constraint pk_resposta primary key (idresposta),
	constraint fk_resposta_pergunta foreign key (idpergunta) references pergunta (idpergunta) on update cascade on delete cascade
);
create table ranking (
	idranking SERIAL,
	nome varchar(50) not null,
	pontos integer not null default 0,
	constraint pk_ranking primary key (idranking)
);

