<?php
require('../database/db_connection.php');
require('../Model/Clsutilisateur.php');

$data = new Utilisateurs();
//$auteur = $_SESSION['postnom'] . " " . $_SESSION['prenom'];

if (isset($_POST['save'])) {


    try {
        $data->setNOM($_POST['nom']);
        $data->setPOSTNOM($_POST['postnom']);
        $data->setPRENOM($_POST['prenom']);
        $data->setSERVICE($_POST['service']);
        $data->inserer();
        header('location:../page/utilisateur.php?msg=true&info=Added Successfully');
    } catch (Exception $e) {
        return $e;
    }
} elseif (isset($_GET['supprimer'])) {
    try {
        $data->setCODEUTILISATEUR($_GET['id']);
        $data->supprimer();
        header('location:../utilisateurs.php?msg=true&info=Deleted Successful');
    } catch (Exception $e) {
        return $e;
    }
} elseif (isset($_POST['update'])) {
    try {
        $data->setCODEUTILISATEUR($_POST['codeutilisateur']);
        $data->setNOM($_POST['nom']);
        $data->setPOSTNOM($_POST['postnom']);
        $data->setPRENOM($_POST['prenom']);
        $data->setSERVICE($_POST['service']);
        $data->modifier();
        header('location:../page/utilisateur.php?msg=true&info=Updated Successfully');
    } catch (Exception $e) {
        return $e;
    }
}
