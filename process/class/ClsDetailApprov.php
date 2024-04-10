<?php
class ClsDetailApprov {
    private $CODEDETAILAPPROV;
    private $APPROVISIONNEMENT;
    private $PRODUIT;
    private $QUANTITE;
    private $PRIXUNITAIRE; 
    private $TYPE;

    public function getCODEDETAILAPPROV()
    {
        return $this->CODEDETAILAPPROV;
    }
    public function setCODEDETAILAPPROV($value)
    {
        $this->CODEDETAILAPPROV = $value;
    }

    public function getAPPROVISIONNEMENT()
    {
        return $this->APPROVISIONNEMENT;
    }
    public function setAPPROVISIONNEMENT($value)
    {
        $this->APPROVISIONNEMENT = $value;
    }

    
    public function getPRODUIT()
    {
        return $this->PRODUIT;
    }
    public function setPRODUIT($value)
    {
        $this->PRODUIT = $value;
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
        /**
     * Get the value of TYPE
     */ 
    public function getTYPE()
    {
        return $this->TYPE;
    }

    /**
     * Set the value of TYPE
     *
     * @return  self
     */ 
    public function setTYPE($TYPE)
    {
        $this->TYPE = $TYPE;

        return $this;
    }

    
//============FONCTION D'AFFICHAGE===============
    public function afficher()
    {
        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare(" SELECT * FROM vdetailapprovisionnement");
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
            $stmt = $connect->prepare(" SELECT * FROM vdetailapprovisionnement WHERE id_detailApprovisionnement=? ");
            $stmt->bindParam(1, $this->CODEDETAILAPPROV, PDO::PARAM_INT);
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
            $stmt = $connect->prepare("CALL InsertOrUpdateDetailApprovisionnement(?,?,?,?,?); CALL sp_transaction_stock(?,?,?,'ENTREE')");

            // Liaison des valeurs aux marqueurs de paramètres
            $stmt->bindParam(1, $this->CODEDETAILAPPROV, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->APPROVISIONNEMENT, PDO::PARAM_STR);
            $stmt->bindParam(3, $this->PRODUIT, PDO::PARAM_STR);
            $stmt->bindParam(4, $this->QUANTITE, PDO::PARAM_STR);
            $stmt->bindParam(5, $this->PRIXUNITAIRE, PDO::PARAM_STR);
            $stmt->bindParam(6, $this->PRODUIT, PDO::PARAM_STR);
            $stmt->bindParam(7, $this->QUANTITE, PDO::PARAM_STR);
            $stmt->bindParam(8, $this->PRIXUNITAIRE, PDO::PARAM_STR);
            
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
            $stmt = $connect->prepare("CALL InsertOrUpdateDetailApprovisionnement(?,?,?,?,?)");

            // Liaison des valeurs aux marqueurs de paramètres
            $stmt->bindParam(1, $this->CODEDETAILAPPROV, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->APPROVISIONNEMENT, PDO::PARAM_STR);
            $stmt->bindParam(3, $this->PRODUIT, PDO::PARAM_STR);
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