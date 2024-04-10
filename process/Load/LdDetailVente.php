<?php
require('../../database/db_connection.php');
require('../class/ClsDetailVente.php');
require('../class/ClsVente.php');
require('../class/ClsProduit.php');
$data = new ClsDetailVente();
$data1 = new ClsProduit();
$data2 = new ClsVente();
            
$data->setCODEDETAIL($_POST['codedetail']);
$all = $data->afficherById();
$all1 = $data1->afficherSpecial();
$all2 = $data2->afficher();
foreach ($all as $key => $val){
         echo "<div class='container'>
         <div class='row'>
             <div class='row justify-content-center'>
                 <div class=' col-md-6 form-group mt-3 '>
                     <div class='input-group has-validation'>
                         <select name='ventedetail' id='ventedetail' class='form-control'>
                            <option value=''>".$val['datevente']."</option>";                                                                             
                                 foreach ($all2 as $key2 => $val2) {                                                    
                                     echo "<option value=".$val2['id_vente'].">".$val2['date_vente']."</option>";
                                 };                                                                         
                    echo "</select>
                     </div>
                 </div>
                 <div class=' col-md-6 form-group mt-3 '>                                    
                     <div class='input-group has-validation'>
                         <select name='produitdetail' id='produitdetail' class='form-control'>
                            <option value=''>".$val['produit']."</option>";                                                                                                      
                                 foreach ($all1 as $key1 => $val1) {                                                    
                                     echo '<option value='.$val1['id_produit'].'>'.$val1['designation'].'</option>';
                                 };                                                                         
                     echo "</select>                                        
                     </div>
                 </div>
                 <div class=' col-md-6 form-group mt-3 '>                                    
                     <div class='input-group has-validation'>
                         <input type='number' class='form-control' value='".$val['quantite']."' placeholder='Quantité' required id='quantite' name='quantite'>                                        
                     </div>
                 </div> 
                 <div class=' col-md-6 form-group mt-3 '>                                    
                     <div class='input-group has-validation'>
                         <input type='number' class='form-control' value='".$val['prixu']."' placeholder='Prix unitaire' required id='prixun' name='prixun'>                                        
                     </div>
                 </div>                                
                 </div>

                 <div class='col-md-12 text-center'>
                     <button name='updateDetailVente' class='btn btn-success w-50 fw-bold'
                         type='submit'>Modifier</button>
                 </div>
                 <input type='hidden' value='".$_POST['codedetail']."' id='idDetailVente' name='idDetailVente'>
             </div>
             </div>";
        }

        