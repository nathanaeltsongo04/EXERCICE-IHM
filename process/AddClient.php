<?php
require('../database/db_connection.php');
require('class/ClsClient.php');

$data = new ClsClient();
//$auteur = $_SESSION['postnom'] . " " . $_SESSION['prenom'];

if (isset($_POST['save'])) {
    try {
        $data->setCODECLIENT(NULL);
        $data->setNOMCLIENT(ucwords($_POST['noms']));
        $data->setTELEPHONECLIENT(ucwords($_POST['telephone']));
        $data->setADRESSECLIENT(ucwords($_POST['adresse']));
        $data->setMAILCLIENT(ucwords($_POST['mail']));
        //$data->setTELEPHONECLIENT(strtoupper($_POST['sigle']));
        //$data->setAuteur(ucwords($auteur));
        $data->AJOUT();
        header('location:../page/Client.php?msg=true&info=Added Successfully');
    } catch (Exception $e) {
        return $e;
    }
} elseif (isset($_GET['supprimer'])) {
    try {

        header('location:../Unités.php?msg=true&info=Deleted Successful');
    } catch (Exception $e) {
        return $e;
    }
} elseif (isset($_POST['updateClient'])) {
    try {
        $data->setCODECLIENT($_POST['idClient']);
        $data->setNOMCLIENT(ucwords($_POST['noms']));
        $data->setTELEPHONECLIENT(ucwords($_POST['telephone']));
        $data->setADRESSECLIENT(ucwords($_POST['adresse']));
        $data->setMAILCLIENT(ucwords($_POST['mail']));
        //$data->setTELEPHONECLIENT(strtoupper($_POST['sigle']));
        //$data->setAuteur(ucwords($auteur));
        $data->MODIFIER();
        header('location:../page/Client.php?msg=true&info=Uptade Successfully');
    } catch (Exception $e) {
        return $e;
    }
}
