<?php
require_once '../database/db_connection.php';
require '../dompdf/autoload.inc.php';

if ($_GET['client'] && !empty($_GET['client']) && $_GET['datefin'] && !empty($_GET['datefin'])) {
  $con = new db_connection();
  $connect = $con->openconnection();
  $client = strip_tags($_GET['client']);
  $datefin = strip_tags($_GET['datefin']);
  $sql = 'SELECT * FROM vdetailvente WHERE client = :client AND datevente = :datefin';
  $data = $connect->prepare($sql);
  $data->bindValue(':client', $client, PDO::PARAM_STR);
  $data->bindValue(':datefin', $datefin, PDO::PARAM_STR);
  $data->execute();
  
  $sqlDolar = "SELECT SUM(prix_total) AS sum FROM vdetailvente WHERE  client = :client AND datevente = :datefin";
  $resultDol = $connect->prepare($sqlDolar);
  $resultDol->bindParam(':client', $client, PDO::PARAM_STR);
  $resultDol->bindParam(':datefin', $datefin, PDO::PARAM_STR);
  $resultDol->execute();
  while ($rowcount = $resultDol->fetch()) {
   $out = "Totaux : " . " " . $rowcount['sum'];
     }
  
}


// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;


// les choses a charger comme pdf dans la page
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Facture</title>
</head>
<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.invoice {
  width: 80%;
  margin: 50px auto;
  border: 1px solid #000;
  padding: 20px;
}

.header {
  text-align: center;
  margin-bottom: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

table, th, td {
  border: 1px solid #000;
}

th, td {
  padding: 8px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
}

.total {
  text-align: right;
}

.signature {
  margin-top: 50px;
}

</style>
<body>
  <div class="invoice">
    <div class="header">
      <h1>Facture</h1>      
      <p>Date: ' . $datefin . '</p>
      <p>Mr/Mme ' . $client . ' doit pour ce qui suit </p>
    </div>
    <table>
      <tr>
        <th>Description</th>
        <th>Quantité</th>
        <th>Prix unitaire</th>
        <th>Total</th>
      </tr>';
      while ($row = $data->fetch()) {
        $html .= '
            <tr>
                <tr>
                <td>' . $row['produit'] . '</td>
                <td>' . $row['quantite'] . '</td>
                <td>' . $row['prixu'] . '</td>
                <td>' . $row['prix_total'] . '</td>
            </tr>';
        }
        $html .= '<tr>
                <td colspan="4" style="text-align:right; font-weight: bold;font-size:18px;">'.$out.'</td>
            </tr>';
        
$html .= '
</table>
    <div class="signature">
      <p>Signature: ________________________</p>
    </div>
  </div>
</body>
</html>';
$dompdf = new Dompdf();
$option = new Options();
$option->set('chroot', realpath(''));
$dompdf->set_option("isPhpEnabled", true);
$dompdf = new Dompdf($option);
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A5', 'Portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('print.pdf', ['Attachment' => false]);