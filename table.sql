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

insert into loi_financier_liste_ministere(nom_ministere) values 
('Ministère des Forces Armées'),
('Ministère de la Santé Publique'),
('Ministère de la Sécurité Publique'),
('Ministère de l’Éducation Nationale'),
('Ministère de l’Enseignement Technique et de la Formation Professionnelle'),
('Ministère de l’Enseignement Supérieur et de le Recherche Scientifique'),
('Ministère délégué en charge de la Gendarmerie Nationale'),
('Ministère des Affaires Étrangères'),
('Ministère de la Justice'),
('Ministère de l’Intérieur'),
('Ministère de l’Économie et des Finances'),
('Ministère de l’Industrialisation et du Commerce'),
('Ministère de la Décentralisation et de l’Aménagement du Territoire'),
('Ministère du Travail, de l’Emploi et de la Fonction Publique'),
('Ministère du Tourisme et de l’Artisanat'),
('Ministère de l’Environnement et du Développement Durable'),
('Ministère des Transports et de la Météorologie'),
('Ministère de la Communication et de la Culture'),
('Ministère des Travaux Publics'),
('Ministère des Mines et des Ressources Strategiques'),
('Ministère de l’Énergie et des Hydrocarbures'),
('Ministère de l’Eau, de l’Assainissement et de l’Hygiène'),
('Ministère de l’Agriculture et de l’Élevage'),
('Ministère de la Pêche et de l’Économie Bleue'),
('Ministère de l’Artisanat et des Métiers'),
('Ministère du Développement Numérique, des Postes et des Télécommunications'),
('Ministère de la Population et des Solidarités'),
('Ministère de la Jeunesse et des Sports');

CREATE TABLE loi_financier_liste_institution(
    id_institution INT PRIMARY KEY AUTO_INCREMENT,
    nom_institution VARCHAR(100)
);

insert into loi_financier_liste_institution(nom_institution) values 
('Présidence de la République'),
('Sénat'),
('Assemblée Nationale'),
('Haute Cour Constitutionnelle'),
('Primature'),
('Conseil du Fampihavanana Malagasy'),
('Commission Électorale Nationale Indépendante'),
('Secretariat d’État en charge des Nouvelles Villes et de l’Habitat'),
('Secrétariat d’État en charge de la Souveraineté Alimentaire');

CREATE TABLE loi_financier_liste_organes_constitutionnels(
    id_organes_constitutionnels INT PRIMARY KEY AUTO_INCREMENT,
    nom_organes_constitutionnel VARCHAR(100)
);

insert into loi_financier_liste_organes_constitutionnels(nom_organes_constitutionnel) values
('Haut Conseil pour la Défense de la Démocratie et de l’État de Droit (HCDDED)'),
('Commission Nationale Indépendante des Droits de l’Homme (CNIDH)');

CREATE TABLE loi_financier_liste_hors_operation_dordre(
    id_hors_operation_dordre INT PRIMARY KEY AUTO_INCREMENT,
    nom_operation_dordres VARCHAR(100)
);

insert into loi_financier_liste_hors_operation_dordre(nom_operation_dordres) values 
('Haute Cour de Justice');

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

insert into loi_financier_depenses_de_solde(montant_2024,montant_2025,ecart) values
(3814.5,3846.4,31.9);


CREATE TABLE loi_financier_budget_autorisee(
    id_ministere INT,
    Budget_autorisee INT,
    FOREIGN KEY (id_ministere) REFERENCES loi_financier_liste_ministere(id_ministere)
);

insert into loi_financier_budget_autorisee(id_ministere,Budget_autorisee) values
(1,1000),
(2,300),
(3,1000),
(4,3000),
(5,250),
(6,100),
(7,1000);

CREATE TABLE loi_financier_depenses_hors_solde(
    id_depense_hors_solde INT PRIMARY KEY AUTO_INCREMENT,
    categorie VARCHAR(100),
    montant_2024 DECIMAL(6,2),
    montant_2025 DECIMAL(6,2),
    ecart DECIMAL(6,2)
);

insert into loi_financier_depenses_hors_solde(categorie,montant_2024,montant_2025,ecart) values
('Indemnités',244.8,244.8,0),
('Bien et Services',573.2,504.7,68.5),
('Transferts',2251,1554.8,696.2);

CREATE TABLE loi_financier_depenses_investissement(
    id_depense_investissement INT PRIMARY KEY AUTO_INCREMENT,
    annee INT,
    pip_interne DECIMAL(6,2),
    pip_externe DECIMAL(6,2),
    total DECIMAL(6,2)
);

insert into loi_financier_depenses_investissement(annee,pip_interne,pip_externe,total) values
(2024,1254.8,3265.6,4520.4),
(2025,2368.4,5897.4,8265.8);

CREATE TABLE loi_financier_depense_par_ministere(
    id_ministere INT,
    somme_2024 DECIMAL(6,2),
    somme_2025 DECIMAL(6,2),
    FOREIGN KEY (id_ministere) REFERENCES loi_financier_liste_ministere(id_ministere)
);

insert into loi_financier_depense_par_ministere values
(1,557,543.2),
(7,99.2,104.7),
(8,199.6,219.8),
(9,150.2,134.7),
(10,2848,2332.7),
(3,228.3,229.2),
(11,113.2,119.6),
(12,356.8,568.1),
(13,31.8,33.7),
(14,19.2,43.9),
(6,284.2,285.6),
(15,94.4,188.8),
(4,1532.8,1562),
(16,63.9,216.3),
(2,716.6,921),
(17,38.4,32.1),
(18,1217.3,2327.5),
(19,18.3,18.1),
(20,407.9,1332),
(21,306.1,600.2),
(22,469.8,795.5),
(23,29.9,28.8),
(5,103.7,94.8),
(24,2.5,0),
(25,8.4,8.8),
(26,99.1,193.4),
(27,40.5,58.1),
(28,414.8,446.4);

CREATE TABLE loi_financier_depense_par_institution(
    id_institution INT,
    somme_2024 DECIMAL(6,2),
    somme_2025 DECIMAL(6,2),
    FOREIGN KEY (id_institution) REFERENCES loi_financier_liste_institution(id_institution)
);

insert into loi_financier_depense_par_institution values 
(1,177.1,224.7),
(2,22.1,21.3),
(3,87.4,85.9),
(4,11.9,9.3),
(5,278.3,339.9),
(6,6.7,6.3),
(7,113.3,16.4),
(8,247.1,138.8),
(9,0,127.3);

CREATE TABLE loi_financier_depense_par_organes_constitutionnels(
    id_organes_constitutionnels INT,
    somme_2024 DECIMAL(6,2),
    somme_2025 DECIMAL(6,2),
    FOREIGN KEY (id_organes_constitutionnels) REFERENCES loi_financier_liste_organes_constitutionnels(id_organes_constitutionnels)
);

insert into loi_financier_depense_par_organes_constitutionnels values 
(1,2.1,2),
(2,2.1,2);

CREATE TABLE loi_financier_depense_hors_operation_dordre(
    id_hors_operation_dordre INT,
    somme_2024 DECIMAL(6,2),
    somme_2025 DECIMAL(6,2),
    FOREIGN KEY (id_hors_operation_dordre) REFERENCES loi_financier_liste_hors_operation_dordre(id_hors_operation_dordre)
);

insert into loi_financier_depense_hors_operation_dordre values 
(1,3.7,3.5);

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

CREATE TABLE loi_financier_total_depense_rattachement(
    nom VARCHAR(100),
    total_2024 DECIMAL(7,2),
    total_2025 DECIMAL(7,2)
);

insert into loi_financier_total_depense_rattachement values 
('Ministères',10452.1,13439),
('Institutions',943.8,969.9),
('Organes Constitutionnels',4.2,4),
('Hors opérations d ordre',3.7,3.5);

Create view v_total_depense as SELECT tl.id_type_depense as id_type_depense, type_depense,total_2024,total_2025 FROM loi_financier_total_depense as tl join loi_financier_type_depense as td on tl.id_type_depense=td.id_type_depense;
Create view v_budget_autorisee as SELECT lm.id_ministere as id_ministere, nom_ministere,Budget_autorisee FROM loi_financier_liste_ministere as lm join loi_financier_budget_autorisee as ba on lm.id_ministere=ba.id_ministere;
Create view v_depense_ministere as SELECT lm.id_ministere as id_ministere, nom_ministere,somme_2024,somme_2025 FROM loi_financier_liste_ministere as lm join loi_financier_depense_par_ministere as dm on lm.id_ministere=dm.id_ministere;
Create view v_depense_institution as SELECT li.id_institution as id_institution, nom_institution,somme_2024,somme_2025 FROM loi_financier_liste_institution as li join loi_financier_depense_par_institution as di on li.id_institution=di.id_institution;
Create view v_depense_organisation as SELECT lo.id_organes_constitutionnels as id_organes_constitutionnels, nom_organes_constitutionnel,somme_2024,somme_2025 FROM loi_financier_depense_par_organes_constitutionnels as do join loi_financier_liste_organes_constitutionnels as lo on lo.id_organes_constitutionnels=do.id_organes_constitutionnels;
Create view v_depense_horsoperation as SELECT lh.id_hors_operation_dordre as id_hors_operation_dordre, nom_operation_dordres,somme_2024,somme_2025 FROM loi_financier_liste_hors_operation_dordre as lh join loi_financier_depense_hors_operation_dordre as dh on lh.id_hors_operation_dordre=dh.id_hors_operation_dordre;