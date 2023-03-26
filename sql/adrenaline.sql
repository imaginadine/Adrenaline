CREATE DATABASE IF NOT EXISTS adrenaline;
USE adrenaline;


DROP TABLE IF EXISTS Categorie ;
DROP TABLE IF EXISTS Client ;

/*
--
-- Structure de la table Categories
--
*/


CREATE TABLE Categories (
  cat varchar(1) NOT NULL,
  sourceImg varchar(42) NOT NULL,
  idCategorie varchar(4) NOT NULL PRIMARY KEY,
  nom varchar(42) NOT NULL,
  prix varchar(5) NOT NULL,
  stock int(4)
);

/* ---------------------------------------------------------- */

/*
--
-- Structure de la table Client
--
*/
CREATE TABLE Client (
  idClient int(100) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  pseudo varchar(12) NOT NULL,
  mdp varchar(15) NOT NULL,
  nom varchar(42) NOT NULL,
  prenom varchar(42) NOT NULL
);
