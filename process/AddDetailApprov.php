<?php
require('../database/db_connection.php');
require('class/ClsDetailApprov.php');

$data = new ClsDetailApprov();
//$auteur = $_SESSION['postnom'] . " " . $_SESSION['prenom'];

if (isset($_POST['saveDetail'])) {
    try {
        $data->setCODEDETAILAPPROV(NULL);
        $data->setAPPROVISIONNEMENT(ucwords($_POST['fournisseur']));
        $data->setPRODUIT(ucwords($_POST['fournisseur']));
        $data->setQUANTITE(strtoupper($_POST['quantite']));
        $data->setPRIXUNITAIRE(strtoupper($_POST['prixun']));
        //$data->setAuteur(ucwords($auteur));
        $data->AJOUT();
        header('location:../page/DetailApprov.php?msg=true&info=Added Successfully');
    } catch (Exception $e) {
        return $e;
    }
} elseif (isset($_GET['supprimer'])) {
    try {

        header('location:../Unités.php?msg=true&info=Deleted Successful');
    } catch (Exception $e) {
        return $e;
    }
} elseif (isset($_POST['updateDetail'])) {
    try {
        $data->setCODEDETAILAPPROV($_POST['idDetail']);
        $data->setAPPROVISIONNEMENT(ucwords($_POST['fournisseur']));
        $data->setPRODUIT(ucwords($_POST['fournisseur']));
        $data->setQUANTITE(strtoupper($_POST['quantite']));
        $data->setPRIXUNITAIRE(strtoupper($_POST['prixun']));
        $data->MODIFIER();
        header('location:../page/DetailApprov.php?msg=true&info=Added Successfully');
    } catch (Exception $e) {
        return $e;
    }
}
