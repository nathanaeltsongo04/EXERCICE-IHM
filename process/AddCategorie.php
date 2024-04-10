<?php
require('../database/db_connection.php');
require('class/ClsCategorie.php');

$data = new ClsCategorie();
//$auteur = $_SESSION['postnom'] . " " . $_SESSION['prenom'];

if (isset($_POST['saveCat'])) {
    try {
        $data->setCODECATEGORIE(NULL);
        $data->setDESIGNATION(ucwords($_POST['designation']));        
        //$data->setTELEPHONECLIENT(strtoupper($_POST['sigle']));
        //$data->setAuteur(ucwords($auteur));
        $data->AJOUT();
        header('location:../page/Categorie.php?msg=true&info=Added Successfully');
    } catch (Exception $e) {
        return $e;
    }
} elseif (isset($_GET['supprimer'])) {
    try {

        header('location:../Unités.php?msg=true&info=Deleted Successful');
    } catch (Exception $e) {
        return $e;
    }
} elseif (isset($_POST['idCategorie'])) {
    try {
        $data->setCODECATEGORIE($_POST['idCategorie']);
        $data->setDESIGNATION(ucwords($_POST['designation']));        
        $data->MODIFIER();
        header('location:../page/Categorie.php?msg=true&info=Added Successfully');
    } catch (Exception $e) {
        return $e;
    }
}
