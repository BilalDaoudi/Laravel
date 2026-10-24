create database GestionPersonnes;
use GestionPersonnes;
create table Personne(
cin varchar(20) primary key,
nom varchar(50),
prenom varchar(50),
sexe varchar(10),
datenaissance date,
nationalite varchar(50)
);
insert into Personne values("SB125487","Daoudi","Bilal","Homme","2002-12-09","Maroc");
insert into Personne values("SB235689","Daoudi","Hamza","Homme","1999-12-15","Maroc");