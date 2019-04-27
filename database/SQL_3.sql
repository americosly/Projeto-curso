insert into tipo_usuario (nome)
values ("admin");

insert into tipo_usuario (nome)
values ("professor"),("aluno");

select * from tipo_usuario;

insert into usuarios (nome, email, senha , cpf , foto, tipo_usuario_fk)
values ("Américo", "americo_tss@hotmail.com","123",99999999999,"foto.png", 2);

insert into usuarios (nome, email, senha , cpf , foto, tipo_usuario_fk)
values ("Américo t", "americo_tss1@hotmail.com","1234",97229129439,"foto.png", 3);

insert into usuarios (nome, email, senha , cpf , foto, tipo_usuario_fk)
values ("Américo1 t", "americo_t2s1@hotmail.com","1234",97429129439,"foto.png", 1);

insert into usuarios (nome, email, senha , cpf , foto, tipo_usuario_fk)
values ("Améric81 t", "ameri10_t2s1@hotmail.com","1234",97429189439,"foto.png", 1);

insert into usuarios (nome, email, senha , cpf , foto, tipo_usuario_fk)
values ("Auéric81 t", "aueri10_t2s1@hotmail.com","1234",27429189439,"foto.png", 2);

insert into usuarios (nome, email, senha , cpf , foto, tipo_usuario_fk)
values ("tuéric81 t", "tueri10_t2s1@hotmail.com","1234",27429180439,"foto.png", 2);



alter table usuarios
change cpf cpf bigint (12);


select * from usuarios;

select nome, email, tipo_usuario_fk from usuarios;

select * from usuarios
where tipo_usuario_fk = 2;

select * from usuarios
where nome like "A%";

select * from usuarios
where nome like "t%" or tipo_usuario_fk = 2;

select * from usuarios
where nome in ("Américo", "Auéric81 t", "tuéric81 t");

select nome,email from usuarios
where tipo_usuario_fk = 3
order by nome asc;

select * from usuarios;

update usuarios
set nome = "Alex"
where id_usuario =6;

set sql_safe_updates = 0; /* desabilitando modo seguro do SQL */

update usuarios
set foto = "nicolascage.png"
where tipo_usuario_fk = 3;

delete from usuarios
where nome = "tuéric81 t";