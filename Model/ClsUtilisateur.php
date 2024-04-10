<?php
class Utilisateurs
{
    private $CODEUTILISATEUR;
    private $NOM;
    private $POSTNOM;
    private $PRENOM;
    private $SERVICE;





    public function getCODEUTILISATEUR()
    {
        return $this->CODEUTILISATEUR;
    }

    public function setCODEUTILISATEUR($value)
    {
        $this->CODEUTILISATEUR = $value;
    }

    public function getNOM()
    {
        return $this->NOM;
    }

    public function setNOM($value)
    {
        $this->NOM = $value;
    }

    public function getPOSTNOM()
    {
        return $this->POSTNOM;
    }

    public function setPOSTNOM($value)
    {
        $this->POSTNOM = $value;
    }

    public function getPRENOM()
    {
        return $this->PRENOM;
    }

    public function setPRENOM($value)
    {
        $this->PRENOM = $value;
    }

    public function getSERVICE()
    {
        return $this->SERVICE;
    }

    public function setSERVICE($value)
    {
        $this->SERVICE = $value;
    }



    public function inserer()
    {

        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare("INSERT INTO `tutilisateur`(`NOM`, `POSTNOM`, `PRENOM`, `SERVICE`) VALUES (?,?,?,?)");
            $stmt->execute([$this->NOM, $this->POSTNOM, $this->PRENOM, $this->SERVICE]);
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
            $stmt = $connect->prepare("SELECT * FROM UTILISATEURS");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function matricule()
    {
        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare("SELECT `CODEUTILISATEUR` FROM `tutilisateur` WHERE  CODEUTILISATEUR=?");
            $stmt->execute([$this->CODEUTILISATEUR]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function afficherByid()
    {
        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare("SELECT * FROM UTILISATEURS WHERE CODEUTILISATEUR=? ");
            $stmt->execute([$this->CODEUTILISATEUR]);
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
            $stmt = $connect->prepare("UPDATE `utilisateur` SET `VISIBLE`=? WHERE CODEUTILISATEUR=?");
            $stmt->execute([$this->CODEUTILISATEUR]);
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
            $stmt = $connect->prepare("UPDATE `tutilisateur` SET `NOM`=?,`POSTNOM`=?,`PRENOM`=?,`SERVICE`=? WHERE `CODEUTILISATEUR`=?");
            $stmt->execute([$this->NOM, $this->POSTNOM, $this->PRENOM, $this->SERVICE, $this->CODEUTILISATEUR]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
