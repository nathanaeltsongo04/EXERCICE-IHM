<?php
class ClsClient {
    private $CODECLIENT;
    private $NOMCLIENT;
    private $TELEPHONECLIENT;
    private $ADRESSECLIENT;
    private $MAILCLIENT; 

    public function getCODECLIENT()
    {
        return $this->CODECLIENT;
    }
    public function setCODECLIENT($value)
    {
        $this->CODECLIENT = $value;
    }

    public function getNOMCLIENT()
    {
        return $this->NOMCLIENT;
    }
    public function setNOMCLIENT($value)
    {
        $this->NOMCLIENT = $value;
    }

    public function getTELEPHONECLIENT()
    {
        return $this->TELEPHONECLIENT;
    }
    public function setTELEPHONECLIENT($value)
    {
        $this->TELEPHONECLIENT = $value;
    }

    public function getADRESSECLIENT()
    {
        return $this->ADRESSECLIENT;
    }
    public function setADRESSECLIENT($value)
    {
        $this->ADRESSECLIENT = $value;
    }

    public function getMAILCLIENT()
    {
        return $this->MAILCLIENT;
    }
    public function setMAILCLIENT($value)
    {
        $this->MAILCLIENT = $value;
    }
//============FONCTION D'AFFICHAGE===============
    public function afficher()
    {
        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare(" SELECT * FROM tclient ");
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
            $stmt = $connect->prepare(" SELECT * FROM tclient WHERE id_client=? ");
            $stmt->bindParam(1, $this->CODECLIENT, PDO::PARAM_INT);
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
            $stmt = $connect->prepare("CALL InsertOrUpdateClient(?,?,?,?,?)");

            // Liaison des valeurs aux marqueurs de paramètres
            $stmt->bindParam(1, $this->CODECLIENT, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->NOMCLIENT, PDO::PARAM_STR);
            $stmt->bindParam(3, $this->TELEPHONECLIENT, PDO::PARAM_STR);
            $stmt->bindParam(4, $this->ADRESSECLIENT, PDO::PARAM_STR);
            $stmt->bindParam(5, $this->MAILCLIENT, PDO::PARAM_STR);

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
            $stmt = $connect->prepare("CALL InsertOrUpdateClient(?,?,?,?,?)");

            // Liaison des valeurs aux marqueurs de paramètres
            $stmt->bindParam(1, $this->CODECLIENT, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->NOMCLIENT, PDO::PARAM_STR);
            $stmt->bindParam(3, $this->TELEPHONECLIENT, PDO::PARAM_STR);
            $stmt->bindParam(4, $this->ADRESSECLIENT, PDO::PARAM_STR);
            $stmt->bindParam(5, $this->MAILCLIENT, PDO::PARAM_STR);

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
