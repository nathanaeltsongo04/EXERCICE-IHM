<?php
require('../../database/db_connection.php');
require('../class/ClsFournisseur.php');
$data = new ClsFournisseur();
$data->setCODEFOURNISSEUR($_POST['codefour']);
$all = $data->afficherById();
foreach ($all as $key => $val) {
    echo "
        <div class='row justify-content-center'>
        <div class='container'>
        <div class='row'>
        <div class=' col-md-6 form-group mt-3 '>
            <div class='input-group has-validation'>
                <input type='text' name='noms' class='form-control' id='noms'
                    placeholder='Noms' value='" . $val['noms'] . "' required>
            </div>
        </div>
        <div class=' col-md-6 form-group mt-3 '>
            <div class='input-group has-validation'>
                <input type='text' name='telephone' class='form-control' id='telephone'
                    placeholder='Téléphone' value='" . $val['telephone'] . "' required>
            </div>
        </div>
        <div class=' col-md-6 form-group mt-3 '>
            <div class='input-group has-validation'>
                <input type='text' name='adresse' class='form-control' id='adresse'
                    placeholder='Adresse' value='" . $val['adresse'] . "' required>
            </div>
        </div>
        <div class=' col-md-6 form-group mt-3 '>
            <div class='input-group has-validation'>
                <input type='text' name='mail' class='form-control' id='mail'
                    placeholder='Adresse mail' value='" . $val['mail'] . "' required>
            </div>
        </div>
        <div class='col-md-12 text-center'>
            <button name='saveFournisseur' class='btn btn-success w-50 fw-bold'
                type='submit'>Modifier</button>
        </div>
        <input type='hidden' value='" . $_POST['codefour'] . "' id='idFourn' name='idFourn'>
        </div>
        </div>
        </div>
        ";
}
