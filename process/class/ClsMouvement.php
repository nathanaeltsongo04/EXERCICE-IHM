<?php
class ClsMouvement{
    private $CODEMOUVEMENT;
    private $REFPRODUIT;
    private $QUANTITEL;
    private $PRIXUNITAIRE;
    private $TYPEOPERATION;
    private $DATEOPS; 
    private $TYPE;
    

    /**
     * Get the value of CODEMOUVEMENT
     */ 
    public function getCODEMOUVEMENT()
    {
        return $this->CODEMOUVEMENT;
    }

    /**
     * Set the value of CODEMOUVEMENT
     *
     * @return  self
     */ 
    public function setCODEMOUVEMENT($CODEMOUVEMENT)
    {
        $this->CODEMOUVEMENT = $CODEMOUVEMENT;

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
     * Get the value of QUANTITEL
     */ 
    public function getQUANTITEL()
    {
        return $this->QUANTITEL;
    }

    /**
     * Set the value of QUANTITEL
     *
     * @return  self
     */ 
    public function setQUANTITEL($QUANTITEL)
    {
        $this->QUANTITEL = $QUANTITEL;

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
     * Get the value of TYPEOPERATION
     */ 
    public function getTYPEOPERATION()
    {
        return $this->TYPEOPERATION;
    }

    /**
     * Set the value of TYPEOPERATION
     *
     * @return  self
     */ 
    public function setTYPEOPERATION($TYPEOPERATION)
    {
        $this->TYPEOPERATION = $TYPEOPERATION;

        return $this;
    }

    /**
     * Get the value of DATEOPS
     */ 
    public function getDATEOPS()
    {
        return $this->DATEOPS;
    }

    /**
     * Set the value of DATEOPS
     *
     * @return  self
     */ 
    public function setDATEOPS($DATEOPS)
    {
        $this->DATEOPS = $DATEOPS;

        return $this;
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
            $stmt = $connect->prepare(" SELECT * FROM vmouvementstock");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    
}