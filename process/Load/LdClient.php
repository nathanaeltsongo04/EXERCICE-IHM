<?php
require('../../database/db_connection.php');
require('../class/ClsClient.php');
$data = new ClsClient();
$data->setCODECLIENT($_POST['codeclient']);
$all = $data->afficherById();
foreach ($all as $key => $val){
    echo "<div class='container'>
                        <div class='row'>                        
                            <div class='row justify-content-center'>
                                <div class=' col-md-6 form-group mt-3 '>
                                
                                    <div class='input-group has-validation'>
                                        <input type='text' value='".$val['noms']."' name='noms' class='form-control' id='noms'
                                            placeholder='Noms' required>
                                    </div>
                                </div>
                                <div class=' col-md-6 form-group mt-3 '>
                                    <div class='input-group has-validation'>
                                        <input type='text'value='".$val['telephone']."' name='telephone' class='form-control' id='telephone'
                                            placeholder='Téléphone' required>
                                    </div>
                                </div>
                                <div class=' col-md-6 form-group mt-3 '>
                                    <div class='input-group has-validation'>
                                        <input type='text' value='".$val['adresse']."' name='adresse' class='form-control' id='adresse'
                                            placeholder='Adresse' required>
                                    </div>
                                </div>
                                <div class=' col-md-6 form-group mt-3 '>
                                    <div class='input-group has-validation'>
                                        <input type='text' value='".$val['mail']."' name='mail' class='form-control' id='mail'
                                            placeholder='Adresse mail' required>
                                    </div>
                                </div>
                                <div class='col-md-12 text-center'>
                                    <button name='updateClient' class='btn btn-success w-50 fw-bold'
                                        type='submit'>Modifier</button>
                                </div>
                                <input type='hidden' value='".$_POST['codeclient']."' id='idClient' name='idClient'>
                                
                            </div>
                            </div>
                            </div>
                        </div>";
}