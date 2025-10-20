<?php
    require("connection.php");

    function get_all_total_depense(){
        $sql= "SELECT * FROM v_total_depense ";
     
        $result= mysqli_query(dbconnect(),$sql);
        $demande=array();
        
        while($donnee=mysqli_fetch_assoc($result)){
            $demande[]=$donnee;
        }

        return $demande;
    }

    function get_somme(){
        $sql="SELECT SUM(total_2024) as st24, SUM(total_2025) as st25 FROM v_total_depense";
        $resultat=mysqli_query(dbconnect(),$sql);
        
        $donnee=mysqli_fetch_assoc($resultat);
            
        return $donnee;
    }

    function get_all_interet_dette(){
        $sql= "SELECT * FROM  loi_financier_interet_dette";
     
        $result= mysqli_query(dbconnect(),$sql);
        $demande=array();
        
        while($donnee=mysqli_fetch_assoc($result)){
            $demande[]=$donnee;
        }

        return $demande;
    }

    function get_all_depense_solde(){
        $sql="SELECT * FROM loi_financier_depenses_de_solde";
        $resultat=mysqli_query(dbconnect(),$sql);
        
        $donnee=mysqli_fetch_assoc($resultat);
            
        return $donnee;
    }

    function get_all_budget_autorisee(){
        $sql= "SELECT * FROM v_budget_autorisee ";
     
        $result= mysqli_query(dbconnect(),$sql);
        $demande=array();
        
        while($donnee=mysqli_fetch_assoc($result)){
            $demande[]=$donnee;
        }

        return $demande;
    }

    function get_total_budget(){
        $sql="SELECT SUM(Budget_autorisee) as total FROM v_budget_autorisee";
        $resultat=mysqli_query(dbconnect(),$sql);
        
        $donnee=mysqli_fetch_assoc($resultat);
            
        return $donnee;
    }

    function get_all_depense_hors_solde(){
        $sql= "SELECT * FROM loi_financier_depenses_hors_solde ";
     
        $result= mysqli_query(dbconnect(),$sql);
        $demande=array();
        
        while($donnee=mysqli_fetch_assoc($result)){
            $demande[]=$donnee;
        }

        return $demande;
    }

    function get_total_depense_hors_solde(){
        $sql="SELECT SUM(montant_2024) as total_2024, SUM(montant_2025) as total_2025, SUM(ecart) as total_ecart FROM loi_financier_depenses_hors_solde";
        $resultat=mysqli_query(dbconnect(),$sql);
        
        $donnee=mysqli_fetch_assoc($resultat);
            
        return $donnee;
    }

    function get_all_investissement(){
        $sql= "SELECT * FROM loi_financier_depenses_investissement ";
     
        $result= mysqli_query(dbconnect(),$sql);
        $demande=array();
        
        while($donnee=mysqli_fetch_assoc($result)){
            $demande[]=$donnee;
        }

        return $demande;
    }
?>