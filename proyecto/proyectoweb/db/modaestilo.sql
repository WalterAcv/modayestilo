drop DATABASE if EXISTS modaestilo;
create DATABASE modaestilo;
use modaestilo;


drop table if exists usuarios;
create table usuarios(id int not null PRIMARY key AUTO_INCREMENT, user varchar(50), pass varchar(50), nombre varchar(50), apellido varchar(50));

insert into usuarios(user,pass,nombre,apellido) values ("admin","admin","Admin","A");
insert into usuarios(user,pass,nombre,apellido) values ("waltera","12345","Walter","Acevedo");


drop PROCEDURE if EXISTS sp_usr_vista;
create PROCEDURE sp_usr_vista() 
SELECT * from usuarios;

drop PROCEDURE if EXISTS sp_usr_insertar;
create procedure sp_usr_insertar(_user varchar(50), _pass varchar(50), _nombre varchar(50), _apellido varchar(50))
insert into usuarios(user,pass,nombre,apellido) values(_user, _pass, _nombre, _apellido);

drop PROCEDURE if EXISTS sp_usr_buscar;
create PROCEDURE sp_usr_buscar(_id int)
select * from usuarios where id= _id;

drop PROCEDURE if EXISTS sp_usr_actualizar;
create procedure sp_usr_actualizar(_id int,_user varchar(50), _pass varchar(50), _nombre varchar(50), _apellido varchar(50))
update usuarios set user=_user , pass=_pass , nombre=_nombre ,apellido=_apellido where id=_id;

drop PROCEDURE if EXISTS sp_usr_eliminar;
create procedure sp_usr_eliminar(_id int)
delete from usuarios where id=_id;

-- -------------------------------------------------------------------------------------------------------------------------------------------

drop table if exists prod;
create table prod(codigo int not null PRIMARY key AUTO_INCREMENT, nombre varchar(50), precio double, descripcion text, imagen varchar(50));

insert into prod(nombre,precio,descripcion,imagen) values ("Saco",150.00,"Saco para hombres - talla M - color negro","sacohombres.webp");
insert into prod(nombre,precio,descripcion,imagen) values ("Falda",50.00,"Falda larga color verde aqua","falda.jpg");
insert into prod(nombre,precio,descripcion,imagen) values ("Camiseta",30.00,"Camiseta básica de manga corta, color amarillo","camiseta.webp");
insert into prod(nombre,precio,descripcion,imagen) values ("Pantalón",80.00,"Pantalón vaquero ajustado, color azul oscuro","pantalon.png");
insert into prod(nombre,precio,descripcion,imagen) values ("Bufanda",60.00,"Bufanda de lana, color burdeos","bufanda.webp");
insert into prod(nombre,precio,descripcion,imagen) values ("Calzado",120.00,"Zapatillas deportivas, color blanco","zapatillas.webp");

drop PROCEDURE if EXISTS sp_vista;
create PROCEDURE sp_vista() 
SELECT * from prod;

drop PROCEDURE if EXISTS sp_insertar;
create procedure sp_insertar(_nom varchar(50),_pre int, _desc text,_img varchar(50))
insert into prod(nombre,precio,descripcion,imagen) values(_nom, _pre, _desc , _img);

drop PROCEDURE if EXISTS sp_buscar;
create PROCEDURE sp_buscar(_cod int)
select * from prod where codigo= _cod;

drop PROCEDURE if EXISTS sp_actualizar;
create procedure sp_actualizar(_cod int, _nom varchar(50), _pre double, _desc text, _img varchar(50))
update prod set nombre=_nom ,precio=_pre , descripcion=_desc ,imagen=_img where codigo=_cod;

drop PROCEDURE if EXISTS sp_eliminar;
create procedure sp_eliminar(_cod int)
delete from prod where codigo=_cod;
