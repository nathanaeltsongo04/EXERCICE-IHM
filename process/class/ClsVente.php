<?php 
class ClsVente {
    private $CODEVENTE;
    private $CLIENT;
    private $DATEVENTE;

    /**
     * Get the value of CODEVENTE
     */ 
    public function getCODEVENTE()
    {
        return $this->CODEVENTE;
    }

    /**
     * Set the value of CODEVENTE
     *
     * @return  self
     */ 
    public function setCODEVENTE($CODEVENTE)
    {
        $this->CODEVENTE = $CODEVENTE;

        return $this;
    }

    /**
     * Get the value of CLIENT
     */ 
    public function getCLIENT()
    {
        return $this->CLIENT;
    }

    /**
     * Set the value of CLIENT
     *
     * @return  self
     */ 
    public function setCLIENT($CLIENT)
    {
        $this->CLIENT = $CLIENT;

        return $this;
    }

    /**
     * Get the value of DATEVENTE
     */ 
    public function getDATEVENTE()
    {
        return $this->DATEVENTE;
    }

    /**
     * Set the value of DATEVENTE
     *
     * @return  self
     */ 
    public function setDATEVENTE($DATEVENTE)
    {
        $this->DATEVENTE = $DATEVENTE;

        return $this;
    }

    //============FONCTION D'AFFICHAGE===============
    public function afficher()
    {
        $con = new db_connection();
        $connect = $con->openconnection();
        try {
            $stmt = $connect->prepare(" SELECT * FROM vvente ");
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
            $stmt = $connect->prepare(" SELECT * FROM vvente WHERE id_vente=? ");
            $stmt->bindParam(1, $this->CODEVENTE, PDO::PARAM_INT);
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
            $stmt = $connect->prepare("CALL InsertOrUpdateVente(?,?)");

            // Liaison des valeurs aux marqueurs de paramètres
            $stmt->bindParam(1, $this->CODEVENTE, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->CLIENT, PDO::PARAM_STR);
            
            
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
            $stmt = $connect->prepare("CALL InsertOrUpdateVente(?,?)");

            // Liaison des valeurs aux marqueurs de paramètres
            $stmt->bindParam(1, $this->CODEVENTE, PDO::PARAM_STR);
            $stmt->bindParam(2, $this->CLIENT, PDO::PARAM_STR);
            
            
            // Exécution de la procédure stockée
            $stmt->execute();

            // Fermeture de la connexion
            $con->closeconnection();
        } catch (Exception $e) {

            // Gestion des erreurs : utilisez plutôt une logique appropriée, par exemple, journalisation ou renvoi d'une exception
            return $e->getMessage();
        }
    }
    public function getUserById($id){
        $con = new db_connection();
        $sql="SELECT * FROM vvente WHERE id_vente=:id";
        $stmt=$this->$con->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}