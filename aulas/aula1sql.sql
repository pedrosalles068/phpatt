create table usuarios (
    id serial primary key,
    nome varchar(255) not null,
    email varchar(255) not null,
    senha varchar(255) not null
);