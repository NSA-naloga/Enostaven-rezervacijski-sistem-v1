/*
Created		17.3.2015
Modified		17.3.2015
Project		
Model		
Company		
Author		
Version		
Database		mySQL 5 
*/

















drop table IF EXISTS Izvajanje;
drop table IF EXISTS Naloga;
drop table IF EXISTS Profesor;




Create table Profesor (
	ID Int NOT NULL,
	Profesor_Ime Char(50) NOT NULL,
	Profesor_Priimek Char(50) NOT NULL,
	UNIQUE (ID),
 Primary Key (ID)) ENGINE = MyISAM;

Create table Naloga (
	Naloga_ID Int NOT NULL,
	Naslov Char(50) NOT NULL,
	Opis Char(250) NOT NULL,
	Kljucne_besede Char(150),
	Datum_kreiranja Datetime NOT NULL,
	Datum_objave Datetime NOT NULL,
	Zacetni_datum Datetime NOT NULL,
	Datum_oddaje Datetime NOT NULL,
	St_kandidatov Smallint NOT NULL,
	Profesor_ID Int NOT NULL,
	UNIQUE (Naloga_ID),
 Primary Key (Naloga_ID)) ENGINE = MyISAM;

Create table Izvajanje (
	Izvajanje_ID Int NOT NULL,
	Profesor_ID Int NOT NULL,
	Naloga_ID Int NOT NULL,
 Primary Key (Profesor_ID,Naloga_ID)) ENGINE = MyISAM;












Alter table Naloga add Foreign Key (Profesor_ID) references Profesor (Profesor_ID) on delete  restrict on update  restrict;
Alter table Izvajanje add Foreign Key (Profesor_ID) references Profesor (Profesor_ID) on delete  restrict on update  restrict;
Alter table Izvajanje add Foreign Key (Naloga_ID) references Naloga (Naloga_ID) on delete  restrict on update  restrict;















/* Users permissions */






