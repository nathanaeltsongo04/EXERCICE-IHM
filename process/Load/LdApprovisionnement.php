<?php
require('../../database/db_connection.php');
require('../class/ClsApprovisionnement.php');
require('../class/ClsFournisseur.php');
$data = new ClsApprovisionnement();
$data2 = new ClsFournisseur();
$data->setCODEAPPROVISIONNEMENT($_POST['codeApprov']);
$all = $data->afficherById();
$all2 = $data2->afficher();
foreach ($all as $key => $val){

 echo "<form class='row g-3' method='POST' action='../process/AddApprovisionnement.php'>
            <div class='container'>
            <div class='row justify-content-center'>
                                            <div class='col-md-6 form-group mt-6 '>
                                                <div class='input-group has-validation'>
                                                    <select name='fournisseur' id='fournisseur' class='form-control'>
                                                        <option value=''>$val[fournisseur]</option>";
                                                    foreach ($all2 as $key2 => $val2) {
                                                        echo "<option value=$val2[id_fournisseur]>$val2[noms]</option>";
                                                    };                                                    
                                                    echo "</select>
                                                </div>
                                            </div>
                                            <div class='col-md-12 text-center'>
                                                <button name='updateApprov' class='btn btn-success w-50 fw-bold'
                                                    type='submit'>Modifier</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </form>";
                           }    