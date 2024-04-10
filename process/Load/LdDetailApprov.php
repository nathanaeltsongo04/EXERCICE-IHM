<?php
require('../../database/db_connection.php');
require ('../class/ClsApprovisionnement.php');
require ('../class/ClsProduit.php');
require('../class/ClsDetailApprov.php');
$data = new ClsDetailApprov();
$data1 = new ClsApprovisionnement();
$data2 = new ClsProduit();
$data->setCODEDETAILAPPROV($_POST['codedetail']);
$all = $data->afficherById();
$all1 = $data1->afficher();
$all2 = $data2->afficher();
foreach ($all as $key => $val){
         echo "<div class='container'>
                        <div class='row'>
                        <div class='modal-body'>
                            <div class='row justify-content-center'>
                                <div class=' col-md-6 form-group mt-3 '>
                                    <div class='input-group has-validation'>
                                    <select name='fournisseur' id='fournisseur' class='form-control'>
                                        <option value=''>".$val['dateApprovisionnement']."</option>";                                                                                    
                                        foreach ($all1 as $key1 => $val1) {                                                    
                                            echo "<option value=".$val1['id_approvisionnement'].">".$val1['fournisseur']."  ".$val1['date_approvisionnement']."</option>";
                                        };                                                                               
                                    echo "</select>
                            </div>
                        </div>
                        <div class=' col-md-6 form-group mt-3 '>                                    
                            <div class='input-group has-validation'>
                                <select name='produit' id='produit' class='form-control'>
                                    <option value=''>".$val['produit']."</option>";                                                                                  
                                        foreach ($all2 as $key2 => $val2) {                                                    
                                            echo "<option value='".$val2['id_produit']."'>".$val2['categorie']."  ".$val2['designation']."</option>";
                                        };                                                                               
                                echo "</select>                                        
                            </div>
                        </div>
                                <div class=' col-md-6 form-group mt-3 '>                                    
                                    <div class='input-group has-validation'>
                                        <input type='number' value='".$val['quantite']."' class='form-control' placeholder='Quantité' required id='quantite' name='quantite'>                                        
                                    </div>
                                </div> 
                                <div class=' col-md-6 form-group mt-3 '>                                    
                                    <div class='input-group has-validation'>
                                        <input type='number' value='".$val['prixu']."' class='form-control' placeholder='Prix unitaire' required id='prixun' name='prixun'>                                        
                                    </div>
                                </div>                                
                                
                                <div class='col-md-12 text-center'>
                                    <button name='updateDetail' class='btn btn-success w-50 fw-bold'
                                        type='submit'>Modifier</button>
                                </div>
                                </div>
                                <input type='hidden' value='".$_POST['codedetail']."' id='idDetail' name='idDetail'>
                            </div>
                            </div>
                        </div>";
        }