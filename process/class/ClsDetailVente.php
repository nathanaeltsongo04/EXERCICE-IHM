<?php 
class ClsDetailVente {
    private $CODEDETAIL;
    private $REFVENTE;
    private $REFPRODUIT;
    private $QUANTITE;
    private $PRIXUNITAIRE;
    private $OPERATION;

        /**
     * Get the value of CODEDETAIL
     */ 
    public function getCODEDETAIL()
    {
        return $this->CODEDETAIL;
    }

    /**
     * Set the value of CODEDETAIL
     *
     * @return  self
     */ 
    public function setCODEDETAIL($CODEDETAIL)
    {
        $this->CODEDETAIL = $CODEDETAIL;

        return $this;
    }

    /**
     * Get the value of REFVENTE
     */ 
    public function getREFVENTE()
    {
        return $this->REFVENTE;
    }

    /**
     * Set the value of REFVENTE
     *
     * @return  self
     */ 
    public function setREFVENTE($REFVENTE)
    {
        $this->REFVENTE = $REFVENTE;

        return $this;
    }

    /**
     * Get the value of REFPRODUIT
     */ 
    public function getREFPRODUIT()
    {
        return $this->REFPRODUIT;
    }

    /**
     * Set the value of REFPRODUIT
     *
     * @return  self
     */ 
    public function setREFPRODUIT($REFPRODUIT)
    {
        $this->REFPRODUIT = $REFPRODUIT;

        return $this;
    }

    /**
     * Get the value of QUANTITE
     */ 
    public function getQUANTITE()
    {
        return $this->QUANTITE;
    }

    /**
     * Set the value of QUANTITE
     *
     * @return  self
     */ 
    public function setQUANTITE($QUANTITE)
    {
        $this->QUANTITE = $QUANTITE;

        return $this;
    }

    /**
     * Get the value of PRIXUNITAIRE
     */ 
    public function getPRIXUNITAIRE()
    {
        return $this->PRIXUNITAIRE;
    }

    /**
     * Set the value of PRIXUNITAIRE
     *
     * @return  self
     */ 
    public function setPRIXUNITAIRE($PRIXUNITAIRE)
    {
        $this->PRIXUNITAIRE = $PRIXUNITAIRE;

        return $this;
    }

    /**
     * Get the value of OPERATION
     */ 
    public function getOPERATION()
    {
        return $this->OPERATION;
    }

    /**
     * Set the value of OPERATION
     *
     * @return  self
     */ 
    public function setOPERATION($OPERATION)
    {
        $this->OPERATION = $OPERATION;

        return $this;
    }

    //============FONCTION D'AFFICHAGE===============
    public function afficher()
    {
        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare(" SELECT * FROM vdetailvente ");
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
            $stmt = $connect->prepare(" SELECT * FROM vdetailvente WHERE id_detailVente=? ");
            $stmt->bindParam(1, $this->CODEDETAIL, PDO::PARAM_INT);
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
            $stmt = $connect->prepare("CALL InsertOrUpdateDetailVente(?,?,?,?,?); CALL sp_transaction_stock(?,?,?,'SORTIE')");

            // Liaison des valeurs aux marqueurs de paramètres
            $stmt->bindParam(1, $this->CODEDETAIL, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->REFVENTE, PDO::PARAM_STR);
            $stmt->bindParam(3, $this->REFPRODUIT, PDO::PARAM_STR);
            $stmt->bindParam(4, $this->QUANTITE, PDO::PARAM_STR);
            $stmt->bindParam(5, $this->PRIXUNITAIRE, PDO::PARAM_STR);
            $stmt->bindParam(6, $this->REFPRODUIT, PDO::PARAM_STR);
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
            $stmt = $connect->prepare("CALL InsertOrUpdateDetailVente(?,?,?,?,?)");

            // Liaison des valeurs aux marqueurs de paramètres
            $stmt->bindParam(1, $this->CODEDETAIL, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->REFVENTE, PDO::PARAM_STR);
            $stmt->bindParam(3, $this->REFPRODUIT, PDO::PARAM_STR);
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