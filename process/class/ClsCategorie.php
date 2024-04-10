<?php
class ClsCategorie {
    private $CODECATEGORIE;
    private $DESIGNATION;

    public function getCODECATEGORIE()
    {
        return $this->CODECATEGORIE;
    }
    public function setCODECATEGORIE($value)
    {
        $this->CODECATEGORIE = $value;
    }

    public function getDESIGNATION()
    {
        return $this->DESIGNATION;
    }
    public function setDESIGNATION($value)
    {
        $this->DESIGNATION = $value;
    }

//============FONCTION D'AFFICHAGE===============
    public function afficher()
    {
        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare(" SELECT * FROM categorieproduit ");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function afficherById()
    {
        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare(" SELECT * FROM categorieproduit WHERE id_categorie=? ");
            $stmt->bindParam(1, $this->CODECATEGORIE, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

//CLASSE D'AJOUT DANS LA BASE DE DONNEES 
    public function AJOUT()
    {
        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare("CALL InsertOrUpdateCategorieProduit(?,?)");

            // Liaison des valeurs aux marqueurs de paramètres
            $stmt->bindParam(1, $this->CODECATEGORIE, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->DESIGNATION, PDO::PARAM_STR);            

            // Exécution de la procédure stockée
            $stmt->execute();

            // Fermeture de la connexion
            $con->closeconnection();
        } catch (Exception $e) {

            // Gestion des erreurs : utilisez plutôt une logique appropriée, par exemple, journalisation ou renvoi d'une exception
            return $e->getMessage();
        }
    }

    //CLASSE DE MODIFICATION DANS LA BASE DE DONNEES 
    public function MODIFIER()
    {
        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare("CALL InsertOrUpdateCategorieProduit(?,?)");

            // Liaison des valeurs aux marqueurs de paramètres
            $stmt->bindParam(1, $this->CODECATEGORIE, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->DESIGNATION, PDO::PARAM_STR);            

            // Exécution de la procédure stockée
            $stmt->execute();

            // Fermeture de la connexion
            $con->closeconnection();
        } catch (Exception $e) {

            // Gestion des erreurs : utilisez plutôt une logique appropriée, par exemple, journalisation ou renvoi d'une exception
            return $e->getMessage();
        }
    }
}