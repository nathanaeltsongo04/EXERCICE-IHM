<?php
require('../../database/db_connection.php');
require('../class/ClsVente.php');
require('../class/ClsClient.php');
$data = new ClsVente();
$data->setCODEVENTE($_POST['codevente']);
$all = $data->afficherById();
$data2 = new ClsClient();
$all2 = $data2->afficher();
foreach ($all as $key => $val){
echo "<div class='container'>
                        <div class='row'>
                        <div class='modal-body'>
                            <div class='row justify-content-center'>
                                <div class=' col-md-6 form-group mt-3 '>
                                    <div class='input-group has-validation'>
                                        <select name='client' id='client' class='form-control'>
                                            <option value=''>".$val['client']."</option>";
                                            foreach ($all2 as $key2 => $val2) {                                                    
                                                echo "<option value=$val2[id_client]>$val2[noms]</option>";
                                            };                                        
                                        echo " </select>                                        
                                    </div>
                                </div>                                                                
                                <div class='col-md-12 text-center'>
                                    <button name='updateVente' class='btn btn-success w-50 fw-bold'
                                        type='submit'>Modifier</button>
                                </div>
                            </div>
                            <input type='hidden' value='".$_POST['codevente']."' id='idVente' name='idVente'>
                            </div>
                            </div>
                        </div>";
        }
                        