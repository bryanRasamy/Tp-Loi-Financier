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
?>