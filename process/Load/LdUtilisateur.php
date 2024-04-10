<?php
require('../../database/db_connection.php');
require('../../Model/Clsutilisateur.php');
require('../../Model/ClsService.php');
$data = new Utilisateurs();
$data2 = new services();
$data->setCODEUTILISATEUR($_POST['codeutilisateur']);
$all = $data->afficherById();
$all2 = $data2->afficher();
foreach ($all as $key => $val) {
    echo "
    <form class='row g-3' method='POST' action='../process/utilisateur.php'>
                                <div class='container'>
                                    <div class='row'>
        <div class='row justify-content-center'>
                                            <div class=' col-md-10 form-group mt-2 '>
                                            <input type='hidden' value='" . $_POST['codeutilisateur'] . "' id='codeutilisateur' name='codeutilisateur'>
                                                <div class='input-group has-validation'>
                                                    <input type='text' value='" . $val['NOM'] . "' name='nom' class='form-control' id='nom' placeholder='Nom' required>
                                                </div>
                                            </div>
                                            <div class=' col-md-10 form-group mt-2 '>
                                                <div class='input-group has-validation'>
                                                    <input type='text' value='" . $val['POSTNOM'] . "' name='postnom' class='form-control' id='postnomm' placeholder='Post Nom' required>
                                                </div>
                                            </div>
                                            <div class=' col-md-10 form-group mt-2 '>
                                                <div class='input-group has-validation'>
                                                    <input type='text' value='" . $val['PRENOM'] .
        "' name='prenom' class='form-control' id='prenom' placeholder='Prénom' required>
                                                </div>
                                            </div>
                                            <div class=' col-md-10 form-group mt-2 '>
                                                <div class='input-group has-validation'>
                                                    <select name='service' id='service' class='form-control'>
                                            <option value='" . $val['CODESERVICE'] . "'>" . $val['SERVICE'] . "</option>";
    foreach ($all2 as $key2 => $val2) {
        echo "<option value=$val2[CODESERVICE]>$val2[DESIGNATION]</option>";
    };
    echo " </select>
</div>
</div>

<div class='col-md-10 text-center'>
    <button name='update' class='btn btn-success w-50 fw-bold' type='submit'>Modifier</button>
</div>
</div>
</div>
</div>
</form>
";
}
