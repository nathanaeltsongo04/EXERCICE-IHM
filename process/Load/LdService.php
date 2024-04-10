<?php
require('../../database/db_connection.php');
require('../../Model/ClsService.php');
$data = new services();
$data->setCODESERVICE($_POST['codeservice']);
$all = $data->afficherById();
foreach ($all as $key => $val) {
    echo "<form class='row g-3' method='POST' action='../process/services.php'>
<div class='container'>
<div class='row'>
<div class='modal-body'>
    <div class='row justify-content-center'>
        <div class=' col-md-10 form-group mt-3 '>
            <div class='input-group has-validation'>
                <input type='text' name='designation' class='form-control' id='designation'
                    placeholder='Désignation' value='" . $val['DESIGNATION'] . "' required>
            </div>
        </div>
        
        <div class='col-md-12 text-center'>
            <button name='update' class='btn btn-success w-50 fw-bold'
                type='submit'>Modifier</button>
        </div>
        <input type='hidden' value='" . $_POST['codeservice'] . "' id='codeservice' name='codeservice'>
    </div>
    </div>
    </div>
</div>
</form>";
}
