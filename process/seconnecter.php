<?php
require('../database/db_connection.php');
$con = new db_connection();
$connect = $con->openconnection();

if (isset($_POST['connecter'])) {
    $nomdutilisateur = $_POST['nomdutilisateur'];
    $password = htmlspecialchars($_POST['password']);
    try {
        $stmt = $connect->prepare("SELECT `CODECOMPTE`,tcompte.UTILISATEUR as UTILISATEUR , tutilisateur.NOM as NOM, tutilisateur.POSTNOM as POSTNOM, tutilisateur.PRENOM as PRENOM , `NOMUTILISATEUR`, tcompte.MOTDEPASSE as MOTDEPASSE, tservice.DESIGNATION as SERVICE FROM `tcompte`
inner join tutilisateur on tcompte.UTILISATEUR=tutilisateur.CODEUTILISATEUR
inner join tservice on tutilisateur.SERVICE=tservice.CODESERVICE where NOMUTILISATEUR=? AND MOTDEPASSE=? ");
        $stmt->execute(array($nomdutilisateur, $password));
        $nbre = $stmt->rowCount();

        if ($nbre == 1) {
            $row = $stmt->fetch();

            $_SESSION['CODE'] = (string)$row['CODECOMPTE'];
            $_SESSION["user"] = (string)$row['UTILISATEUR'];
            $_SESSION["nom"] = $row['NOM'];
            $_SESSION["postnom"] = $row['POSTNOM'];
            $_SESSION["prenom"] = $row['PRENOM'];
            $_SESSION["SERVICE"] = $row['SERVICE'];
            $_SESSION["nomutilisateur"] = $row['NOMUTILISATEUR'];
            $_SESSION["motdepasse"] = $row['MOTDEPASSE'];
            header("Location:../page/dashboard.php");
        } else {
            header('location:../page/authentification.php?msg=false&info=Check Your Username or Your Password');
        }
    } catch (PDOException $e) {
        $erreur = $e->getMessage();
        header("location: ../page/authentification.php?msg=false&info= $erreur");
    }
} else {
    header('location:../login.php?msg=false&info=Check Your Username or Your Password');
}
