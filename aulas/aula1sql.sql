create table usuarios (
    id serial primary key,
    nome varchar(100) not null,
    email varchar(100) not null,
    senha varchar(100) not null
);