<?php
class ClsFournisseur {
    private $CODEFOURNISSEUR;
    private $NOMFOURNISSEUR;
    private $TELEPHONEFOURNISSEUR;
    private $ADRESSEFOURNISSEUR;
    private $MAILFOURNISSEUR; 

    public function getCODEFOURNISSEUR()
    {
        return $this->CODEFOURNISSEUR;
    }
    public function setCODEFOURNISSEUR($value)
    {
        $this->CODEFOURNISSEUR = $value;
    }

    public function getNOMFOURNISSEUR()
    {
        return $this->NOMFOURNISSEUR;
    }
    public function setNOMFOURNISSEUR($value)
    {
        $this->NOMFOURNISSEUR = $value;
    }

    public function getTELEPHONEFOURNISSEUR()
    {
        return $this->TELEPHONEFOURNISSEUR;
    }
    public function setTELEPHONEFOURNISSEUR($value)
    {
        $this->TELEPHONEFOURNISSEUR = $value;
    }

    public function getADRESSEFOURNISSEUR()
    {
        return $this->ADRESSEFOURNISSEUR;
    }
    public function setADRESSEFOURNISSEUR($value)
    {
        $this->ADRESSEFOURNISSEUR = $value;
    }

    public function getMAILFOURNISSEUR()
    {
        return $this->MAILFOURNISSEUR;
    }
    public function setMAILFOURNISSEUR($value)
    {
        $this->MAILFOURNISSEUR = $value;
    }
//============FONCTION D'AFFICHAGE===============
    public function afficher()
    {
        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare(" SELECT * FROM tfournisseur ");
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
            $stmt = $connect->prepare(" SELECT * FROM tfournisseur WHERE id_fournisseur=? ");
            $stmt->bindParam(1, $this->CODEFOURNISSEUR, PDO::PARAM_INT);
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
            $stmt = $connect->prepare("CALL InsertOrUpdateFournisseur(?,?,?,?,?)");

            // Liaison des valeurs aux marqueurs de paramètres
            $stmt->bindParam(1, $this->CODEFOURNISSEUR, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->NOMFOURNISSEUR, PDO::PARAM_STR);
            $stmt->bindParam(3, $this->TELEPHONEFOURNISSEUR, PDO::PARAM_STR);
            $stmt->bindParam(4, $this->ADRESSEFOURNISSEUR, PDO::PARAM_STR);
            $stmt->bindParam(5, $this->MAILFOURNISSEUR, PDO::PARAM_STR);

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