/* Creacion de la base de datos */
create database bd_escola;
use bd_escola;

/* Creacion de la tabla administracion */
create table 'tbl_administracio' (
    id int autoincrement primary key not null,
    nom varchar(25) not null,
    rol enum("educadors","profesors","secretaria")
    pwd varchar(50) not null
);

/* Insercion de datos en la tabla de administracion */
insert into tbl_administracio values (null,'Alberto','profesors','qazQAZ123');
insert into tbl_administracio values (null,'Jose','profesors','$2y$10$zvlgp9DVf0UYSh80gb4gsOBu4iLwx/2lnz6FPvpiZkZpb.Gnh6aLu');