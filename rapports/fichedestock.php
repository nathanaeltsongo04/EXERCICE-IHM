<?php
require_once '../database/db_connection.php';
require '../dompdf/autoload.inc.php';

if ($_GET['Produit'] && !empty($_GET['Produit'])) {
  $con = new db_connection();
  $connect = $con->openconnection();
  $Produit = strip_tags($_GET['Produit']);
  $sql = 'SELECT * FROM fiche_stock WHERE Produit=:Produit';

  $data = $connect->prepare($sql);
  $data->bindValue(':Produit', $Produit, PDO::PARAM_STR);
  $data->execute();
  $row = $data->fetch();
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
      <h1>FICHE DE STOCK </h1>
    </div>
    <p>Article : <b>' . strtoupper($row['Produit']) . '</b> </p>
    <table>
      <tr>
        <th>Stock Entre</th>
        <th>Stock Sorti</th>
        <th>Stock Actuel</th>
      </tr>
            <tr>
                <tr>
                <td>' . $row['stock_entree'] . '</td>
                <td>' . $row['stock_sortie'] . '</td>
                <td>' . $row['StockActuel'] . '</td>
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
$dompdf->setPaper('A4', 'Portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('print.pdf', ['Attachment' => false]);