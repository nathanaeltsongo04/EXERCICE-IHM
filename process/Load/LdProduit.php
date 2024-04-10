<?php
require('../../database/db_connection.php');
require('../class/ClsProduit.php');
require('../class/ClsCategorie.php');
$data = new ClsProduit();
$data2 = new ClsCategorie();
$data->setCODEPRODUIT($_POST['codeproduit']);
$all = $data->afficherById();
$all2 = $data2->afficher();
foreach ($all as $key => $val){

    echo "  <div class='container'>
                        <div class='row'>                        
                            <div class='row justify-content-center'>
                                <div class=' col-md-6 form-group mt-3 '>
                                    <div class='input-group has-validation'>
                                        <select name='categorie' id='categorie' class='form-control'>
                                            <option value=''>".$val['categorie']."</option>";                                                                                           
                                                foreach ($all2 as $key2 => $val2) {                                                    
                                                    echo '<option value='.$val2['id_categorie'].'>'.$val2['designation'].'</option>';
                                                };                                                                                     
                                 echo " </select>                                        
                                    </div>
                                </div>                                
                                <div class=' col-md-6 form-group mt-3 '>
                                    <div class='input-group has-validation'>
                                        <input type='text' value='".$val['designation']."' name='designation' class='form-control' id='designation'
                                            placeholder='Désignation' required>
                                    </div>
                                </div>
                                <div class=' col-md-6 form-group mt-3 '>
                                    <div class='input-group has-validation'>
                                        <input type='number' value='".$val['quantite']."' name='quantite' class='form-control' id='quantite'
                                            placeholder='Quantité' required>
                                    </div>
                                </div>
                                <div class=' col-md-6 form-group mt-3 '>
                                    <div class='input-group has-validation'>
                                        <input type='number' value='".$val['prixu']."' name='prix' class='form-control' id='prix'
                                            placeholder='Prix unitaire' required>
                                    </div>
                                </div>
                                <div class='col-md-12 text-center'>
                                    <button name='updateProduit' class='btn btn-success w-50 fw-bold'
                                        type='submit'>Modifier</button>
                                </div>
                                <input type='hidden' value='".$_POST['codeproduit']."' id='idProduit' name='idProduit'>
                            </div>
                            </div>
                            </div>
                        </div>";
                    }