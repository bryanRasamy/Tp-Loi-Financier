Create database loi_financier;

use loi_financier;

CREATE TABLE loi_financier_type_depense(
    id_type_depense INT PRIMARY KEY AUTO_INCREMENT,
    type_depense VARCHAR(100)
);

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
    id_type_depense INT,
    type_dette VARCHAR(100),
    montant_2024 DECIMAL(65,2),
    montant_2025 DECIMAL(65,2),
    interet DECIMAL(65,2),
    total DECIMAL(65,2),
    FOREIGN KEY (id_type_depense) REFERENCES loi_financier_type_depense(id_type_depense)
);

CREATE TABLE loi_financier_depenses_de_solde(
    id_type_depense INT,
    montant_2024 DECIMAL(65,2),
    montant_2025 DECIMAL(65,2),
    ecart DECIMAL(65,2),
    FOREIGN KEY (id_type_depense) REFERENCES loi_financier_type_depense(id_type_depense)
);


CREATE TABLE loi_financier_budget_autorisee(
    id_ministere INT,
    nom_ministere VARCHAR(100),
    Budget_autorisee INT,
    FOREIGN KEY (id_ministere) REFERENCES loi_financier_liste_ministere(id_ministere)
);

CREATE TABLE loi_financier_depenses_hors_solde(
    id_type_depense INT,
    categorie VARCHAR(100),
    montant_2024 DECIMAL(65,2),
    montant_2025 DECIMAL(65,2),
    ecart DECIMAL(65,2),
    FOREIGN KEY (id_type_depense) REFERENCES loi_financier_type_depense(id_type_depense)
);

CREATE TABLE loi_financier_depenses_investissement(
    id_type_depense INT,
    montant_2024 DECIMAL(65,2),
    montant_2025 DECIMAL(65,2),
    FOREIGN KEY (id_type_depense) REFERENCES loi_financier_type_depense(id_type_depense)
);

CREATE TABLE loi_financier_depense_par_ministere(
    id_ministere INT,
    somme_2024 DECIMAL(65,2),
    somme_2025 DECIMAL(65,2),
    FOREIGN KEY (id_ministere) REFERENCES loi_financier_liste_ministere(id_ministere)
);

CREATE TABLE loi_financier_depense_par_institution(
    id_institution INT,
    somme_2024 DECIMAL(65,2),
    somme_2025 DECIMAL(65,2),
    FOREIGN KEY (id_institution) REFERENCES loi_financier_liste_institution(id_institution)
);

CREATE TABLE loi_financier_depense_par_organes_constitutionnels(
    id_organes_constitutionnels INT,
    somme_2024 DECIMAL(65,2),
    somme_2025 DECIMAL(65,2),
    FOREIGN KEY (id_organes_constitutionnels) REFERENCES loi_financier_liste_organes_constitutionnels(id_organes_constitutionnels)
);

CREATE TABLE loi_financier_depense_operation_dordre(
    id_operation_dordre INT,
    somme_2024 DECIMAL(65,2),
    somme_2025 DECIMAL(65,2),
    FOREIGN KEY (id_operation_dordre) REFERENCES loi_financier_liste_operation_dordre(id_operation_dordre)
);