SELECT * FROM projeto_cursos.usuarios;

select count(*) from usuarios;

select count(*) from usuarios
 where tipo_usuario_fk = 3; /* 9 alunos */
 
 select * from cursos;
 
select AVG(preco)
from cursos; /* Média de preço: 267.5 */

select min(preco)
from cursos;	/* puxa o preço minimo dos cursos */

select max(preco)
from cursos;	/* pua o preço maimo dos cursos */

select sum(preco)
from cursos;	/* mostra o preço total de todos os cursos */

select min(preco), max(preco), avg(preco), sum(preco)
from cursos;	/* traz o minimo o maximo a média e a soma de tudo em uma consulta só */

select min(preco) as "Minimo", max(preco) as "Máximo", avg(preco) as "Média", sum(preco) as "Total"
from cursos;	/* Aqui estou colocando os nomes dos campos apenas para a consulta, ele não altera o nome na tabela */

select tipo_usuario_fk, count(*)
 from usuarios
group by tipo_usuario_fk; /* group by agrupa a soma dos tipos do usuários a os tipos de usuários */

select tipo_usuario_fk from usuarios;

/* Inner Join */
SELECT	 u.nome AS usuario, t.nome AS tipo
FROM usuarios AS u
INNER JOIN tipo_usuario AS t
ON u.tipo_usuario_fk = t.id_tipo_usuario; /* você pode abreviar o nome da tabela apenas com a primeira letra e o ponto ( . ) */


SELECT	u.nome  AS Professor , c.nome AS curso
FROM usuarios AS u
INNER JOIN  cursos AS c
ON c.professor_fk = u.id_usuario; 

INSERT INTO	cursos (nome, descricao, preco, tag, image)
VALUES
('Drinks Maneiros',
'Aprenda a fazer drinks sensacionais',
3000,
'drinks',
'happyhour.png');

select * from cursos ;

select cursos.nome As Curso, usuarios.nome As Nome
from cursos
left join usuarios
on cursos.professor_fk = usuarios.id_usuario; /* left join dá preferencia para a tabela da esquerda o right para a da direita */
