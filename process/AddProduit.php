<?php
require('../database/db_connection.php');
require('class/ClsProduit.php');

$data = new ClsProduit();
//$auteur = $_SESSION['postnom'] . " " . $_SESSION['prenom'];

if (isset($_POST['saveProduit'])) {
    try {
        $data->setCODEPRODUIT(NULL);
        $data->setCATEGORIE(ucwords($_POST['categorie']));
        $data->setDESIGNATION(ucwords($_POST['designation']));
        $data->setQUANTITE(ucwords($_POST['quantite']));
        $data->setPRIXUNITAIRE(ucwords($_POST['prix']));
        //$data->setTELEPHONEFOURNISSEUR(strtoupper($_POST['sigle']));
        //$data->setAuteur(ucwords($auteur));
        $data->AJOUT();
        header('location:../page/Produit.php?msg=true&info=Added Successfully');
    } catch (Exception $e) {
        return $e;
    }
} elseif (isset($_GET['supprimer'])) {
    try {

        header('location:../Unités.php?msg=true&info=Deleted Successful');
    } catch (Exception $e) {
        return $e;
    }
} elseif (isset($_POST['updateProduit'])) {
    try {        
        $data->setCODEPRODUIT($_POST['codeproduit']);
        $data->setCATEGORIE(ucwords($_POST['categorie']));
        $data->setDESIGNATION(ucwords($_POST['designation']));
        $data->setQUANTITE(ucwords($_POST['quantite']));
        $data->setPRIXUNITAIRE(ucwords($_POST['prix']));
        $data->MODIFIER();
        // header('location:../page/Fournisseur.php?msg=true&info=Added Successfully');
    } catch (Exception $e) {
        return $e;
    }
}
