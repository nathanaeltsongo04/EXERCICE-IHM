<?php
class ClsApprovisionnement {
    private $CODEAPPROVISIONNEMENT;
    private $FOURNISSEUR;
    private $DATEAPPROVISIONNEMENT; 

    public function getCODEAPPROVISIONNEMENT()
    {
        return $this->CODEAPPROVISIONNEMENT;
    }
    public function setCODEAPPROVISIONNEMENT($value)
    {
        $this->CODEAPPROVISIONNEMENT = $value;
    }

    public function getFOURNISSEUR()
    {
        return $this->FOURNISSEUR;
    }
    public function setFOURNISSEUR($value)
    {
        $this->FOURNISSEUR = $value;
    }

    public function getDATEAPPROVISIONNEMENT()
    {
        return $this->DATEAPPROVISIONNEMENT;
    }
    public function setDATEAPPROVISIONNEMENT($value)
    {
        $this->DATEAPPROVISIONNEMENT = $value;
    }

    
//============FONCTION D'AFFICHAGE===============
    public function afficher()
    {
        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare(" SELECT * FROM vapprovisionnement");
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
            $stmt = $connect->prepare(" SELECT * FROM approvisionnement WHERE id_approvisionnement=? ");
            $stmt->bindParam(1, $this->CODEAPPROVISIONNEMENT, PDO::PARAM_INT);
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
            $stmt = $connect->prepare("CALL InsertOrUpdateApprovisionnement(?,?)");

            // Liaison des valeurs aux marqueurs de paramètres
            $stmt->bindParam(1, $this->CODEAPPROVISIONNEMENT, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->FOURNISSEUR, PDO::PARAM_STR);
            
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