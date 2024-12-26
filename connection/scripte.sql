CREATE DATABASE voyage_2;

USE voyage_2;

CREATE TABLE client(
  idClient int NOT NULL,
  nom VARCHAR(100),
  prenom VARCHAR(100),
  email VARCHAR(100),
  password VARCHAR(100),
  status enum('active','blocke'),
  PRIMARY KEY (idClient)
);

CREATE TABLE admin(
  idAdmin int NOT NULL,
  nom VARCHAR(100),
  prenom VARCHAR(100),
  email VARCHAR(100),
  password VARCHAR(100),
  PRIMARY KEY (idAdmin)
);

CREATE TABLE superAdmin(
  idSuperAdmin int NOT NULL,
  nom VARCHAR(100),
  prenom VARCHAR(100),
  email VARCHAR(100),
  password VARCHAR(100),
  PRIMARY KEY (idSuperAdmin)
);

CREATE TABLE activity(
  idActivity int NOT NULL,
  nom VARCHAR(100),
  description VARCHAR(100),
  price float,
  date_activite datetime,
  idReservation int,
  PRIMARY KEY (idActivity),
  FOREIGN KEY (idReservation) REFERENCES reservation(idReservation)
);

CREATE TABLE reservation(
  idReservation int NOT NULL,
  date_activite datetime,
  status enum('waiting','accepte','refuse'),
  PRIMARY KEY (idActivity)
);
