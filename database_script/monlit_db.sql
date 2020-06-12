--dropping database
select pg_terminate_backend (pg_stat_activity.pid)
from pg_stat_activity
where pg_stat_activity.datname = 'pgluxedatabase';

drop database monlit_db
--

create database monlit_db

create sequence MARQUE_seq
start 500;
create table MARQUE
(
    id_marque int default nextval('MARQUE_seq') primary key,
    nom_marque varchar(20),
    sloggan_marque varchar(100),
    logo_marque varchar(200)
);

create sequence TYPE_seq
start 1;
create table TYPE_PRODUIT
(
    id_type int default nextval ('TYPE_seq') primary key,
    libelle_type varchar(20)
);

create sequence COULEUR_seq
start 1;
create table COULEUR
(
    id_couleur int default nextval('COULEUR_seq') primary key,
    libelle_couleur varchar(20),
    valeur_couleur varchar(20)
);

create sequence PRODUIT_seq
start 1;
create table PRODUIT
(
    id_produit int default nextval('PRODUIT_seq') primary key,
    nom_produit varchar(50),
    qtt_stock int,
    min_qtt_stock int,
    max_qtt_stock int,
    marque_ int,
    foreign key(marque_) references MARQUE(id_marque),
    type_ int,
    foreign key(type_) references TYPE_PRODUIT(id_type)
);

create table POSSESSION_COULEUR
(
    produit_ int,
    foreign key(produit_) references PRODUIT(id_produit),
    couleur_ int,
    foreign key(couleur_) references COULEUR(id_couleur),
    primary key(produit_,couleur_)
);

create sequence PHOTO_seq
start 1;
create table PHOTO
(
    id_photo int default nextval('PHOTO_seq') primary key,
    chemin_photo varchar(50),
    produit_ int,
    foreign key(produit_) references PRODUIT(id_produit)
);

create sequence CARATERISTIQUE_seq
start 1;
create table CARATERISTIQUE
(
    id_caractere int default nextval('CARATERISTIQUE_seq') primary key,
    libelle_caractere varchar(20),
    libell_option_produit varchar(30),
    prix_suplementaire double precision,
    produit_ int,
    foreign key(produit_) references PRODUIT(id_produit)
);

create sequence DESCRIPTION_PRODUIT_seq
start 1;
create table DESCRIPTION_PRODUIT
(
    id_description int default nextval('DESCRIPTION_PRODUIT_seq') primary key,
    caracteristique_ int,
    foreign key(caracteristique_) references CARATERISTIQUE(id_caractere),
    libelle_description varchar(50)
);

create sequence CONTACT_seq
start 1;
create table CONTACT
(
    id_message int default nextval('CONTACT_seq') primary key,
    nom_personne varchar(30),
    email_persone varchar(50),
    sujet_message varchar(50),
    contenu_message varchar(250)
);

create table ROLE_PERSONNE
(
    id_role int primary key,
    libelle_role varchar(10),
    description_role varchar(50)
);

create table SEXE
(
    id_sexe int primary key,
    libele_sexe varchar(10)
);

create sequence PERSONNE_seq
start 1;
create table PERSONNE
(
    id_personne int default nextval('PERSONNE_seq') primary key,
    nom varchar(20),
    prenom varchar(20),
    date_naissance date,
    date_inscription date,
    sexe_ int,
    foreign key(sexe_) references SEXE(id_sexe),
    adresse varchar(100),
    ville varchar(20),
    telephone varchar(15),
    email varchar(20),
    username varchar(10),
    mot_de_passe varchar(20),
    role_personne_ int,
    foreign key(role_personne_) references ROLE_PERSONNE(id_role)
);

create sequence COMMANDE_seq
start 1;
create table COMMANDE
(
    id_commande int default nextval('COMMANDE_seq') primary key,
    personne_ int,
    foreign key(personne_) references PERSONNE(id_personne),
    produit_ int,
    foreign key(produit_) references PRODUIT(id_produit),
    date_ajout date,
    statut_commande varchar(25),
    check(statut_commande in('Payé','En attente')),
);