<?php
class ClsProduit {
    private $CODEPRODUIT;
    private $CATEGORIE;
    private $DESIGNATION;
    private $QUANTITE;
    private $PRIXUNITAIRE; 

    public function getCODEPRODUIT()
    {
        return $this->CODEPRODUIT;
    }
    public function setCODEPRODUIT($value)
    {
        $this->CODEPRODUIT = $value;
    }

    public function getCATEGORIE()
    {
        return $this->CATEGORIE;
    }
    public function setCATEGORIE($value)
    {
        $this->CATEGORIE = $value;
    }

    public function getDESIGNATION()
    {
        return $this->DESIGNATION;
    }
    public function setDESIGNATION($value)
    {
        $this->DESIGNATION = $value;
    }

    public function getQUANTITE()
    {
        return $this->QUANTITE;
    }
    public function setQUANTITE($value)
    {
        $this->QUANTITE = $value;
    }
    
    public function getPRIXUNITAIRE()
    {
        return $this->PRIXUNITAIRE;
    }
    public function setPRIXUNITAIRE($value)
    {
        $this->PRIXUNITAIRE = $value;
    }
    
//============FONCTION D'AFFICHAGE===============
    public function afficher()
    {
        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare(" SELECT * FROM vproduit");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function afficherSpecial()
    {
        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare(" SELECT * FROM produit");
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
            $stmt = $connect->prepare(" SELECT * FROM vproduit WHERE id_produit=? ");
            $stmt->bindParam(1, $this->CODEPRODUIT, PDO::PARAM_INT);
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
            $stmt = $connect->prepare("CALL InsertOrUpdateProduit(?,?,?,?,?)");

            // Liaison des valeurs aux marqueurs de paramètres
            $stmt->bindParam(1, $this->CODEPRODUIT, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->CATEGORIE, PDO::PARAM_STR);
            $stmt->bindParam(3, $this->DESIGNATION, PDO::PARAM_STR);
            $stmt->bindParam(4, $this->QUANTITE, PDO::PARAM_STR);
            $stmt->bindParam(5, $this->PRIXUNITAIRE, PDO::PARAM_STR);
            
            // Exécution de la procédure stockée
            $stmt->execute();

            // Fermeture de la connexion
            $con->closeconnection();
        } catch (Exception $e) {

            // Gestion des erreurs : utilisez plutôt une logique appropriée, par exemple, journalisation ou renvoi d'une exception
            return $e->getMessage();
        }
    }
    public function MODIFIER()
    {

        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare("CALL InsertOrUpdateProduit(?,?,?,?,?)");

            // Liaison des valeurs aux marqueurs de paramètres
            $stmt->bindParam(1, $this->CODEPRODUIT, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->CATEGORIE, PDO::PARAM_STR);
            $stmt->bindParam(3, $this->DESIGNATION, PDO::PARAM_STR);
            $stmt->bindParam(4, $this->QUANTITE, PDO::PARAM_STR);
            $stmt->bindParam(5, $this->PRIXUNITAIRE, PDO::PARAM_STR);
            
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