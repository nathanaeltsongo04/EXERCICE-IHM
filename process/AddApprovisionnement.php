<?php
require('../database/db_connection.php');
require('class/ClsApprovisionnement.php');

$data = new ClsApprovisionnement();
//$auteur = $_SESSION['postnom'] . " " . $_SESSION['prenom'];

if (isset($_POST['saveApprov'])) {
    try {
        $data->setCODEAPPROVISIONNEMENT(NULL);
        $data->setFOURNISSEUR(ucwords($_POST['fournisseur']));

        //$data->setTELEPHONEFOURNISSEUR(strtoupper($_POST['sigle']));
        //$data->setAuteur(ucwords($auteur));
        $data->AJOUT();
        header('location:../page/Approvisionnement.php?msg=true&info=Added Successfully');
    } catch (Exception $e) {
        return $e;
    }
} elseif (isset($_GET['supprimer'])) {
    try {

        header('location:../Unités.php?msg=true&info=Deleted Successful');
    } catch (Exception $e) {
        return $e;
    }
} elseif (isset($_POST['update'])) {
    try {
        // $data->setCODEFOURNISSEUR($_POST['codefournisseur']);
        // $data->setNOMFOURNISSEUR(ucwords($_POST['noms']));
        // $data->setTELEPHONEFOURNISSEUR(ucwords($_POST['telephone']));
        // $data->setADRESSEFOURNISSEUR(ucwords($_POST['adresse']));
        // $data->setMAILFOURNISSEUR(ucwords($_POST['mail']));
        //$data->setTELEPHONEFOURNISSEUR(strtoupper($_POST['sigle']));
        //$data->setAuteur(ucwords($auteur));
        // $data->MODIFIER();
        // header('location:../page/Fournisseur.php?msg=true&info=Added Successfully');
    } catch (Exception $e) {
        return $e;
    }
}
