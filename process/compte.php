<?php
require("../database/db_connection.php");
require("../Model/ClsCompte.php");
require("../Model/Clsutilisateur.php");

$data = new Utilisateurs();
$data->setCODEUTILISATEUR($_POST['matricule']);
$user = $data->matricule();

$compte = new comptes();
$compte->setUTILISATEUR($_POST['matricule']);
$account = $compte->utilisateur();
foreach ($user as $key => $val) {
    if ($val['CODEUTILISATEUR'] == $_POST['matricule']) {
        $userid = $val['CODEUTILISATEUR'];
    }
}
foreach ($account as $keys => $vals) {
    if ($vals['UTILISATEUR'] == $userid) {
        $accountid = $vals['UTILISATEUR'];
    }
}

if (isset($_POST['save'])) {
    if ($_POST['password'] === $_POST['confirmpassword']) {
        if (isset($_POST['matricule']) == $userid) {
            if ($userid == $accountid) {
                header('location:../page/newaccount.php?msg=False&info=This User ID has already an account');
            } else {
                try {

                    $data = new comptes();


                    $data->setUTILISATEUR($_POST['matricule']);
                    $data->setNOMUTILISATEUR($_POST['nomdutilisateur']);
                    $data->setMotdepasse($_POST['password']);

                    $data->inserer();
                    header('location:../index.php?msg=true&info=Created Successfully');
                    exit();
                } catch (Exception $e) {
                    return $e->getMessage();
                }
            }
        } else {
            header('location:../page/newaccount.php?msg=false&info=This User ID does not exist');
        }
    } else {
        header('location:../page/newaccount.php?msg=false&info=Type Well Your Password');
    }
} elseif (isset($_GET['update'])) {
    if ($_SESSION['motdepasse'] == $_POST['password']) {
        if ($_POST['newpassword'] == $_POST['confirmpassword']) {
            try {
                $compte->setCODECOMPTE($_POST['id']);
                $compte->setMOTDEPASSE($_POST['newpassword']);
                $compte->setNOMUTILISATEUR($_POST['nomutilisateur']);
                $compte->modifier();
                header('location:../login.php?msg=true&info=Changed Successfully');
            } catch (Exception $e) {
                return $e;
            }
        } else {
            header('location:../profile.php?msg=true&info=Make Sure You Typed Well Your New Password');
        }
    } else {
        header('location:../login.php?msg=true&info=You are a spy');
    }
}
