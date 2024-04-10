<?php
require('../../database/db_connection.php');
require('../class/ClsCategorie.php');
$data = new ClsCategorie();
$data->setCODECATEGORIE($_POST['codecategorie']);
$all = $data->afficherById();
foreach ($all as $key => $val){
echo "<form class='row g-3' method='POST' action='../process/AddCategorie.php'>
<div class='container'>
<div class='row'>
<div class='modal-body'>
    <div class='row justify-content-center'>
        <div class=' col-md-6 form-group mt-3 '>
            <div class='input-group has-validation'>
                <input type='text' name='designation' class='form-control' id='designation'
                    placeholder='Désignation' value='".$val['designation']."' required>
            </div>
        </div>
        
        <div class='col-md-12 text-center'>
            <button name='saveCat' class='btn btn-success w-50 fw-bold'
                type='submit'>Modifier</button>
        </div>
        <input type='hidden' value='".$_POST['codecategorie']."' id='idCategorie' name='idCategorie'>
    </div>
    </div>
    </div>
</div>
</form>";

}