<?php
class services
{
    private $CODESERVICE;
    private $DESIGNATION;
    private $EMAIL;
    private $VISIBLE;
    private $AUTEUR;

    public function getCODESERVICE()
    {
        return $this->CODESERVICE;
    }

    public function setCODESERVICE($value)
    {
        $this->CODESERVICE = $value;
    }

    public function getDESIGNATION()
    {
        return $this->DESIGNATION;
    }

    public function setDESIGNATION($value)
    {
        $this->DESIGNATION = $value;
    }

    public function getEMAIL()
    {
        return $this->EMAIL;
    }

    public function setEMAIL($value)
    {
        $this->EMAIL = $value;
    }

    public function getVISIBLE()
    {
        return $this->VISIBLE;
    }

    public function setVISIBLE($value)
    {
        $this->VISIBLE = $value;
    }

    public function getAUTEUR()
    {
        return $this->AUTEUR;
    }

    public function setAUTEUR($value)
    {
        $this->AUTEUR = $value;
    }

    public function inserer()
    {

        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare("INSERT INTO `tservice`( `DESIGNATION`) VALUES (?)");
            $stmt->execute([$this->DESIGNATION]);
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
            $stmt = $connect->prepare("SELECT * FROM `tservice`");
            $stmt->execute();
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
            $stmt = $connect->prepare("SELECT * FROM `tservice` WHERE CODESERVICE=? ");
            $stmt->execute([$this->CODESERVICE]);
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
            $stmt = $connect->prepare("UPDATE `service` SET `VISIBLE`=? WHERE CODESERVICE=?");
            $stmt->execute([$this->VISIBLE = 0, $this->CODESERVICE]);
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
            $stmt = $connect->prepare("UPDATE `tservice` SET `DESIGNATION`=? WHERE CODESERVICE=?");
            $stmt->execute([$this->DESIGNATION, $this->CODESERVICE]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
