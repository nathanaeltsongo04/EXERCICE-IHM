<?php
require('../database/db_connection.php');
require('class/ClsVente.php');

$data = new ClsVente();
//$auteur = $_SESSION['postnom'] . " " . $_SESSION['prenom'];

if (isset($_POST['saveVente'])) {
    try {
        $data->setCODEVENTE(NULL);
        $data->setCLIENT(ucwords($_POST['client']));
        $data->AJOUT();
        header('location:../page/Vente.php?msg=true&info=Added Successfully');
    } catch (Exception $e) {
        return $e;
    }
} elseif (isset($_GET['supprimer'])) {
    try {
        header('location:../Unités.php?msg=true&info=Deleted Successful');
    } catch (Exception $e) {
        return $e;
    }
} elseif (isset($_POST['updateVente'])) {
    try {
        $data->setCODEVENTE($_POST['idVente']);
        $data->setCLIENT(ucwords($_POST['client']));
        $data->MODIFIER();
        header('location:../page/Vente.php?msg=true&info=Added Successfully');
    } catch (Exception $e) {
        return $e;
    }
}
