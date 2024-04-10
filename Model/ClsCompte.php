<?php
class Comptes
{
    private $CODECOMPTE;
    private $UTILISATEUR;
    private $NOMUTILISATEUR;
    private $MOTDEPASSE;
    private $VISIBLE;


    public function getCODECOMPTE()
    {
        return $this->CODECOMPTE;
    }

    public function setCODECOMPTE($value)
    {
        $this->CODECOMPTE = $value;
    }

    public function getUTILISATEUR()
    {
        return $this->UTILISATEUR;
    }

    public function setUTILISATEUR($value)
    {
        $this->UTILISATEUR = $value;
    }

    public function getNOMUTILISATEUR()
    {
        return $this->NOMUTILISATEUR;
    }

    public function setNOMUTILISATEUR($value)
    {
        $this->NOMUTILISATEUR = $value;
    }

    public function getMOTDEPASSE()
    {
        return $this->MOTDEPASSE;
    }

    public function setMOTDEPASSE($value)
    {
        $this->MOTDEPASSE = $value;
    }

    public function getVISIBLE()
    {
        return $this->VISIBLE;
    }

    public function setVISIBLE($value)
    {
        $this->VISIBLE = $value;
    }

    public function inserer()
    {

        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare("INSERT INTO `tcompte`(`UTILISATEUR`, `NOMUTILISATEUR`, `MOTDEPASSE`) VALUES (?,?,?)");
            $stmt->execute([$this->UTILISATEUR, $this->NOMUTILISATEUR, $this->MOTDEPASSE]);
            $con->closeconnection();
        } catch (Exception $e) {
            return $this->$e;
        }
    }

    public function afficher()
    {
        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare("SELECT * FROM `tcompte` ");
            $stmt->execute([$this->VISIBLE = 1]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function utilisateur()
    {
        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare("SELECT UTILISATEUR FROM `tcompte` WHERE UTILISATEUR=? ");
            $stmt->execute([$this->UTILISATEUR]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function afficherid()
    {
        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare("SELECT * FROM `tcompte` WHERE UTILISATEUR=? ");
            $stmt->execute([$this->UTILISATEUR]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function supprimer()
    {
        try {
            $con = new db_connection();
            $connect = $con->openconnection();
            $stmt = $connect->prepare("UPDATE ``compte`` SET `VISIBLE`=? WHERE CODECOMPTE=?");
            $stmt->execute([$this->CODECOMPTE, $this->VISIBLE = 0]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function modifier()
    {
        try {
            $con = new db_connection();
            $connect = $con->openconnection();
            $stmt = $connect->prepare("UPDATE `compte` SET `NOMUTILISATEUR`=?,`MOTDEPASSE`=?,`VISIBLE`=? WHERE `CODECOMPTE`=?");
            $stmt->execute([$this->NOMUTILISATEUR, $this->MOTDEPASSE, $this->VISIBLE = 1, $this->CODECOMPTE]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
