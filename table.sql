Create database loi_financier;

use loi_financier;

CREATE TABLE loi_financier_type_depense(
    id_type_depense INT PRIMARY KEY AUTO_INCREMENT,
    type_depense VARCHAR(100)
);

insert into loi_financier_type_depense(type_depense) values
('Intérêts de la dette'),
('Dépenses de solde'),
('Dépense hors solde'),
('Dépense investissement');

CREATE TABLE loi_financier_liste_ministere(
    id_ministere INT PRIMARY KEY AUTO_INCREMENT,
    nom_ministere VARCHAR(100)
);

CREATE TABLE loi_financier_liste_institution(
    id_institution INT PRIMARY KEY AUTO_INCREMENT,
    nom_institution VARCHAR(100)
);

CREATE TABLE loi_financier_liste_organes_constitutionnels(
    id_organes_constitutionnels INT PRIMARY KEY AUTO_INCREMENT,
    nnom_organes_constitutionnel VARCHAR(100)
);

CREATE TABLE loi_financier_liste_operation_dordre(
    id_operation_dordre INT PRIMARY KEY AUTO_INCREMENT,
    nom_operation_dordres VARCHAR(100)
);

CREATE TABLE loi_financier_interet_dette(
    id_interet INT PRIMARY KEY AUTO_INCREMENT,
    type_dette VARCHAR(100),
    interet_2024 DECIMAL(6,2),
    interet_2025 DECIMAL(6,2)
);

insert into loi_financier_interet_dette(type_dette,interet_2024,interet_2025) values
('Dette extérieur',287.60,314.2),
('Dette intérieur',384.40,442.2);

CREATE TABLE loi_financier_depenses_de_solde(
    id_depense_solde INT PRIMARY KEY AUTO_INCREMENT,
    montant_2024 DECIMAL(6,2),
    montant_2025 DECIMAL(6,2),
    ecart DECIMAL(6,2)
);


CREATE TABLE loi_financier_budget_autorisee(
    id_ministere INT,
    nom_ministere VARCHAR(100),
    Budget_autorisee INT,
    FOREIGN KEY (id_ministere) REFERENCES loi_financier_liste_ministere(id_ministere)
);

CREATE TABLE loi_financier_depenses_hors_solde(
    id_depense_hors_solde INT PRIMARY KEY AUTO_INCREMENT,
    categorie VARCHAR(100),
    montant_2024 DECIMAL(6,2),
    montant_2025 DECIMAL(6,2),
    ecart DECIMAL(6,2)
);

CREATE TABLE loi_financier_depenses_investissement(
    id_depense_investissement INT PRIMARY KEY AUTO_INCREMENT,
    montant_2024 DECIMAL(6,2),
    montant_2025 DECIMAL(6,2)
);

CREATE TABLE loi_financier_depense_par_ministere(
    id_ministere INT,
    somme_2024 DECIMAL(6,2),
    somme_2025 DECIMAL(6,2),
    FOREIGN KEY (id_ministere) REFERENCES loi_financier_liste_ministere(id_ministere)
);

CREATE TABLE loi_financier_depense_par_institution(
    id_institution INT,
    somme_2024 DECIMAL(6,2),
    somme_2025 DECIMAL(6,2),
    FOREIGN KEY (id_institution) REFERENCES loi_financier_liste_institution(id_institution)
);

CREATE TABLE loi_financier_depense_par_organes_constitutionnels(
    id_organes_constitutionnels INT,
    somme_2024 DECIMAL(6,2),
    somme_2025 DECIMAL(6,2),
    FOREIGN KEY (id_organes_constitutionnels) REFERENCES loi_financier_liste_organes_constitutionnels(id_organes_constitutionnels)
);

CREATE TABLE loi_financier_depense_operation_dordre(
    id_operation_dordre INT,
    somme_2024 DECIMAL(6,2),
    somme_2025 DECIMAL(6,2),
    FOREIGN KEY (id_operation_dordre) REFERENCES loi_financier_liste_operation_dordre(id_operation_dordre)
);

CREATE TABLE loi_financier_total_depense(
    id_type_depense INT,
    total_2024 DECIMAL(6,2),
    total_2025 DECIMAL(6,2),
    FOREIGN KEY (id_type_depense) REFERENCES loi_financier_type_depense(id_type_depense)
);

Insert into loi_financier_total_depense values
(1,672,756.5),
(2,3814.5,3846.4),
(3,3069,2304.3),
(4,4520.4,8265.8);

Create view v_total_depense as SELECT tl.id_type_depense as id_type_depense, type_depense,total_2024,total_2025 FROM loi_financier_total_depense as tl join loi_financier_type_depense as td on tl.id_type_depense=td.id_type_depense;