<?php
    require("connection.php");

    function get_membre_connecte($prenom,$surnom,$mdp){
        $sql="SELECT * FROM tc_membres WHERE nom='%s' AND pseudo='%s' AND mot_de_passe='%s'";
        $sql=sprintf($sql,$prenom,$surnom,$mdp);
        $resultat=mysqli_query(dbconnect(),$sql);
        $donnees=mysqli_fetch_assoc($resultat);
        return $donnees;
    }

    function get_all_publication(){
        $rqt = "SELECT id_publication,poste,tc_membres.id_membre,date_publication,tc_publications.bio,titre,nom,pseudo,pdp ,tc_membres.bio AS texte FROM tc_publications JOIN tc_membres  ON tc_publications.id_membre= tc_membres.id_membre ORDER BY date_publication DESC";
        $resultat= mysqli_query(dbconnect(), $rqt);
        $demande=array();

        while($donnee=mysqli_fetch_assoc($resultat)){
            $demande[]=$donnee;
        }

        return $demande;
    }

    function get_commentaire($id_pub){
        $rqt= "SELECT * FROM tc_commentaire JOIN tc_membres ON tc_commentaire.id_membre= tc_membres.id_membre WHERE tc_commentaire.id_publication = '%s';";
        $rqt= sprintf($rqt, $id_pub);
        $resultat= mysqli_query(dbconnect(), $rqt);
        $demande=array();
        
        while($donnee=mysqli_fetch_assoc($resultat)){
            $demande[]=$donnee;
        }

        return $demande;
    }

    function inserer_publication($poste,$utilisateur,$bio,$titre){
        $sql="INSERT INTO tc_publications(poste,id_membre,bio,titre) VALUES ('%s','%s','%s','%s')";
        $sql=sprintf($sql,$poste,$utilisateur['id_membre'],$bio,$titre);
        mysqli_query(dbconnect(),$sql);
    }

    function inserer_commentaire( $utilisateur,$id_pub,$commentaire){
        $sql="INSERT INTO tc_commentaire(commentaire,id_publication,id_membre,date_commentaire) VALUES ('%s','%s','%s',NOW())";
        $sql=sprintf($sql,$commentaire,$id_pub,$utilisateur['id_membre']);
     
        mysqli_query(dbconnect(),$sql);
    }

    function inserer_favoris( $utilisateur,$id_pub){
        $sql="INSERT INTO tc_favoris(id_publication,id_membre,date_favoris) VALUES ('%s','%s',NOW())";
        $sql=sprintf($sql,$id_pub,$utilisateur['id_membre']);
     
        mysqli_query(dbconnect(),$sql);
    }

    function verifier_like($id_user, $id_publication)
    {
        $sql= "SELECT * FROM tc_favoris WHERE id_publication='%s' AND id_membre='%s';";
        $sql= sprintf($sql,$id_publication,$id_user['id_membre']);
     
        $result= mysqli_query(dbconnect(),$sql);
        $donnee= mysqli_fetch_assoc($result);

        return $donnee;
    }

    function delete_favoris( $utilisateur,$id_pub){
        $sql="DELETE FROM tc_favoris WHERE id_membre='%s' AND id_publication='%s'";
        $sql=sprintf($sql,$utilisateur['id_membre'],$id_pub);
     
        mysqli_query(dbconnect(),$sql);
    }

    function get_number_favoris($id_pub){
        $sql="SELECT COUNT(id_favoris) as nombre_favoris FROM tc_favoris WHERE id_publication='%s'";
        $sql=sprintf($sql,$id_pub);
        $resultat=mysqli_query(dbconnect(),$sql);
        $donnee=mysqli_fetch_assoc($resultat);

        return $donnee;
    }

    function get_publication($id_utilisateur){
        $sql = "SELECT * FROM tc_publications WHERE id_membre='%s';";
        $sql=sprintf($sql,$id_utilisateur);
        $resultat=mysqli_query(dbconnect(),$sql);

        $demande=array();
        
        while($donnee=mysqli_fetch_assoc($resultat)){
            $demande[]=$donnee;
        }

        return $demande;
    }

    function get_number_commentaire($id_pub){
        $sql="SELECT COUNT(commentaire) as nombre_commentaire FROM tc_commentaire WHERE id_publication='%s'";
        $sql=sprintf($sql,$id_pub);
        $resultat=mysqli_query(dbconnect(),$sql);
        $donnee=mysqli_fetch_assoc($resultat);

        return $donnee;
    }

    function get_duree_pub($id_pub){
        $rqt= "SELECT date_publication , CONCAT( FLOOR(HOUR(TIMEDIFF(NOW(), tc_publications.date_publication))), ' h ', MINUTE(TIMEDIFF(NOW(), tc_publications.date_publication)), ' min ') as duree_ecoulee FROM tc_publications WHERE id_publication = '%s' ;";
        $rqt=sprintf($rqt,$id_pub);
        $result = mysqli_query(dbconnect(), $rqt);
        $duree = mysqli_fetch_assoc($result);
        return $duree;
    }

    function remplacer_image($image,$bio,$id_membre){
        $sql="UPDATE tc_membres SET pdp ='%s',bio='%s' WHERE id_membre='%s'";
        $sql=sprintf($sql,$image,$bio,$id_membre);
        mysqli_query(dbconnect(),$sql);
    }

    function get_all_membre($utilisateur){
        $sql="SELECT * FROM tc_membres WHERE id_membre!='%s'";
        $sql=sprintf($sql,$utilisateur['id_membre']);
        $resultat=mysqli_query(dbconnect(),$sql);

        $demande=array();
        
        while($donnee=mysqli_fetch_assoc($resultat)){
            $demande[]=$donnee;
        }

        return $demande;
    }

    function get_info_membre($id){
        $sql="SELECT * FROM tc_membres WHERE id_membre='%s'";
        $sql=sprintf($sql,$id);

        $resultat=mysqli_query(dbconnect(),$sql);

        $info=mysqli_fetch_assoc($resultat);

        return $info;
    }


    function inserer_conversation($id,$id_membre){

        $sql="SELECT * FROM tc_conversation WHERE id_participant1='%s' AND id_participant2='%s' OR id_participant1='%s' AND id_participant2='%s'";
        $sql=sprintf($sql,$id,$id_membre,$id_membre,$id);
        $resultat=mysqli_query(dbconnect(),$sql);
        $donnee=mysqli_fetch_assoc($resultat);

        if(isset($donnee)){
            return;
        }
        else{
            $sql="INSERT INTO tc_conversation(date_creation,id_participant1,id_participant2) VALUES (NOW(),'%s','%s')";
            $sql=sprintf($sql,$id,$id_membre);
         
            mysqli_query(dbconnect(),$sql);
        }
    }    

    function get_id_conversation($id,$id_membre){
        $sql="SELECT * FROM tc_conversation WHERE id_participant1='%s' AND id_participant2='%s' OR id_participant1='%s' AND id_participant2='%s'";
        $sql=sprintf($sql,$id,$id_membre,$id_membre,$id);
        $resultat=mysqli_query(dbconnect(),$sql);

        $donnee=mysqli_fetch_assoc($resultat);

        return $donnee;
    }

    function get_message($utilisateur,$id2){
        $id_Conversation=get_id_conversation($utilisateur['id_membre'],$id2)['id_Conversation'];
        $sql="SELECT * FROM tc_message JOIN tc_membres ON tc_message.id_auteur=tc_membres.id_membre WHERE id_Conversation='%s' ORDER BY date_envoi ASC";
        $sql=sprintf($sql,$id_Conversation);

        $resultat=mysqli_query(dbconnect(),$sql);

        $demande=array();
        
        while($donnee=mysqli_fetch_assoc($resultat)){
            $demande[]=$donnee;
        }

        return $demande;
    }

    function inserer_message($utilisateur,$id2,$message){
        $id_Conversation=get_id_conversation($utilisateur['id_membre'],$id2)['id_Conversation'];
        $sql="INSERT INTO tc_message(id_Conversation,id_auteur, contenu_message, date_envoi) VALUES ('%s','%s','%s',NOW())";
        $sql=sprintf($sql,$id_Conversation,$utilisateur['id_membre'],$message);

        mysqli_query(dbconnect(),$sql);
    }

    function get_conversation($id_membre){
        $sql="SELECT id_Conversation,date_creation,id_participant1,id_participant2,nom as nm FROM tc_conversation JOIN tc_membres ON tc_membres.id_membre=tc_conversation.id_participant2 WHERE id_participant1='%s' UNION SELECT id_Conversation,date_creation,id_participant2,id_participant1, nom as nm2 FROM tc_conversation JOIN tc_membres ON tc_membres.id_membre=tc_conversation.id_participant1 WHERE id_participant2='%s'";
        $sql=sprintf($sql,$id_membre,$id_membre);

        $resultat=mysqli_query(dbconnect(),$sql);

        $demande=array();
        
        while($donnee=mysqli_fetch_assoc($resultat)){
            $demande[]=$donnee;
        }

        return $demande;
    }

    function changer_nom($id,$nom){
        $sql="UPDATE tc_membres SET nom='%s' WHERE id_membre='%s'";
        $sql=sprintf($sql,$nom,$id);

        mysqli_query(dbconnect(),$sql);
    }

    function changer_pseudo($id,$pseudo){
        $sql="UPDATE tc_membres SET pseudo='%s' WHERE id_membre='%s'";
        $sql=sprintf($sql,$pseudo,$id);

        mysqli_query(dbconnect(),$sql);
    }

    function changer_mot_de_passe($id,$ancien,$nouveau){
        $sql="UPDATE tc_membres SET mot_de_passe='%s' WHERE id_membre='%s' AND mot_de_passe='%s'";
        $sql=sprintf($sql,$nouveau,$id,$ancien);

        mysqli_query(dbconnect(),$sql);
    }
?>