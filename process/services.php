<?php
require('../database/db_connection.php');
require('../Model/ClsService.php');

$data = new services();
$auteur = $_SESSION['postnom'] . " " . $_SESSION['prenom'];

if (isset($_POST['save'])) {


    try {
        $data->setDESIGNATION($_POST['designation']);
        $data->inserer();
        header('location:../page/Services.php?msg=true&info=Added Successfully');
    } catch (Exception $e) {
        return $e;
    }
} elseif (isset($_GET['supprimer'])) {
    try {
        $data->setCODESERVICE($_GET['id']);
        $data->supprimer();
        header('location:../services.php?msg=true&info=Deleted Successful');
    } catch (Exception $e) {
        return $e;
    }
} elseif (isset($_POST['update'])) {
    try {
        $data->setCODESERVICE($_POST['codeservice']);
        $data->setDESIGNATION($_POST['designation']);
        $data->modifier();
        header('location:../page/Services.php?msg=true&info=Updated Successfully');
    } catch (Exception $e) {
        return $e;
    }
}
