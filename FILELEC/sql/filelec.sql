drop database if exists filelec;
create database filelec;
use filelec;


create table client (
    id_client int(5) not null auto_increment, 
    nom_client varchar(50) not null, 
    prenom_client varchar(50) not null, 
    adresse_client varchar(50) not null, 
    email_client varchar(50) not null, 
    tel_client char(12) not null, 
    mdp_client varchar(30) not null,
    date_creation_client date not null,
    primary key (id_client),
    unique (email_client), 
    unique (tel_client)
);

create table image_client(
    id_image_client int(5) not null auto_increment,
    nom_image_client varchar(255) not null,                       
    url_client varchar(255) not null,                             
    id_client int(5) not null,     
    primary key(id_image_client),                              
    foreign key (id_client) references client(id_client)

);

create table specialisation (
    id_spe int(10) not null auto_increment,
    nom_spe varchar(25) not null,
    primary key (id_spe)
);

create table categorie (
    id_cat int(10) not null auto_increment,
    nom_cat varchar(25) not null,
    primary key (id_cat)
);

create table article (
    id_article int(10) not null auto_increment,
    nom_article varchar(25) not null,
    description_article varchar(100) not null,
    prix_article float(10,2) not null,
    stock_article int default 0,
    id_cat int(10) not null,
    primary key (id_article),
    foreign key (id_cat) references categorie(id_cat),
    foreign key (id_marque) references marque(id_marque),
    unique (id_article)
);

create table marque (
    id_marque int(10) not null auto_increment,
    nom_marque varchar(25) not null,
    primary key (id_marque)
);
----------------------------------------------------
create table image_article (
    id_image_article int(10) not null auto_increment,  
    nom_image_article varchar(255) not null,                       
    url_article varchar(255) not null,                             
    id_article int(10) NOT NULL,     
    primary key(id_image_article),                              
    foreign key (id_article) references article(id_article) 
);


--------------------------------------------------------
create table commande (
    id_commande int(10) not null auto_increment,
    id_client int(5) not null,
    date_commande date not null,
    statut enum('en preparation', 'en chemin', 'livré') not null,
    montant_total float(10, 2),
    adresse_client varchar(50) not null,
    primary key (id_commande),
    foreign key (id_client) references client(id_client),
    unique(id_commande)
);

create table ligne_de_commande (
    id_ligne_cmd int(12) not null auto_increment,
    id_article int(10) not null,
    quantite float(5,2) not null,
    sous_total float(5,2),
    prix_unitaire float(5,2),
    id_commande int(10) not null,
    primary key (id_ligne_cmd),
    foreign key (id_commande) references commande(id_commande),
    foreign key (id_article) references article(id_article)
    
);

create table technicien (
    id_technicien int(12) not null auto_increment,
    nom_technicien varchar(25) not null,
    prenom_technicien varchar(25) not null,
    email varchar(25) not null,
    telephone_technicien varchar(20),
    id_article int(10),
    primary key (id_technicien),
    foreign key (id_article) references article(id_article)
);

create table intervention (
    id_intervention int(12) not null auto_increment,
    date_intervention date not null,
    id_client int(12) not null,
    id_technicien int(12) not null,
    id_commande int(12) not null,
    primary key (id_intervention),
    foreign key (id_client) references client(id_client),
    foreign key (id_technicien) references technicien(id_technicien),
    foreign key (id_commande) references commande(id_commande),
    unique (id_intervention)
);

create table planning (
    date_debut_inter date,
    date_fin_inter date,
    primary key (date_debut_inter)
);

create table admin ( 
    id_admin int(5) auto_increment,
    nom_admin varchar(25) not null,
    prenom_admin varchar(25) not null,
    email_admin varchar(25) not null,
    mdp_admin varchar(25) not null,
    primary key (id_admin),
    unique (id_admin)
);



