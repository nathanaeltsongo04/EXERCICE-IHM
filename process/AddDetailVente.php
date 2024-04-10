<?php
require('../database/db_connection.php');
require('class/ClsDetailVente.php');

$data = new ClsDetailVente();
//$auteur = $_SESSION['postnom'] . " " . $_SESSION['prenom'];

if (isset($_POST['saveDetailVente'])) {
    try {
        $data->setCODEDETAIL(NULL);
        $data->setREFVENTE(ucwords($_POST['vente']));
        $data->setREFPRODUIT(ucwords($_POST['produit']));
        $data->setQUANTITE(strtoupper($_POST['quantite']));
        $data->setPRIXUNITAIRE(strtoupper($_POST['prixun']));
        //$data->setAuteur(ucwords($auteur));
        $data->AJOUT();
        header('location:../page/DetailVente.php?msg=true&info=Added Successfully');
    } catch (Exception $e) {
        return $e;
    }
} elseif (isset($_GET['supprimer'])) {
    try {

        header('location:../Unités.php?msg=true&info=Deleted Successful');
    } catch (Exception $e) {
        return $e;
    }
} elseif (isset($_POST['updateDetailVente'])) {
    try {
        $data->setCODEDETAIL($_POST['idDetailVente']);
        $data->setREFVENTE(ucwords($_POST['ventedetail']));
        $data->setREFPRODUIT(ucwords($_POST['produitdetail']));
        $data->setQUANTITE(strtoupper($_POST['quantite']));
        $data->setPRIXUNITAIRE(strtoupper($_POST['prixun']));
        $data->MODIFIER();
        header('location:../page/DetailVente.php?msg=true&info=Added Successfully');
    } catch (Exception $e) {
        return $e;
    }
}
