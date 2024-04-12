<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mouvement</title>
    <?php
    include('../include/head.php');
    require('../database/db_connection.php');
    require('../process/class/ClsMouvement.php');
    // require('../process/class/ClsVente.php');
    // require('../process/class/ClsProduit.php');

    $data = new ClsMouvement();
    // $data2 = new ClsVente();
    // $data1 = new ClsProduit();

    $all = $data->fichestock();
    // $all1 = $data1->afficher();
    // $all2 = $data2->afficher();

    ?>
</head>

<body>
    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'true') {
    ?>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_GET['info'] ?>',
                showConfirmButton: false,
                timer: 2800
            }).then(function() {
                location.replace('Mouvement.php');
            });
        </script>
    <?php } ?>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="wrapper">
        <header class="header-top" header-theme="light">
            <?php
            include('../include/header.php');
            ?>
        </header>

        <div class="page-wrap">
            <?php
            include('../include/sidebar.php');
            ?>
            <div class="main-content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header row">

                            <div class="col col-sm-12">
                                <div class="card-options d-inline-block">
                                    <h4><b>Fiche Stock</b></h4>
                                </div>
                                <div class=" float-right px-4">
                                        
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container table-responsive">
                                <table id="order-table" class="table table-striped  nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Produit</th>
                                            <th>Stock Entré</th>
                                            <th>Stock Sorti</th>
                                            <th>Stock Actuel</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $numero = 1;
                                        foreach ($all as $key => $val) {
                                        ?>
                                            <tr>

                                                <th scope="row"><b><?= $numero ?></b></th>
                                                <td><b><?= $val['Produit'] ?></b></td>
                                                <td><b><?= $val['stock_entree'] ?></b></td>
                                                <td><b><?= $val['stock_sortie'] ?></b></td>
                                                <td><b><?= $val['StockActuel'] ?></b></td>
                                                <th><b>
                                                <a href="../rapports/fichedestock.php?Produit=<?= $val['Produit'] ?>"
                                                        data-toggle="tooltip" data-placement="top" title="Imprimer"
                                                        class="badge"><i class="fa fa-print text-dark fa-xl"></i></a>
                                                </b></th>

                                            </tr>
                                        <?php
                                            $numero++;
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Produit</th>
                                            <th>Stock Entré</th>
                                            <th>Stock Sorti</th>
                                            <th>Stock Actuel</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include('../include/footer.php');
            ?>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Details Vente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" method="POST" action="../process/AddDetailVente.php">
                        <div class="container">
                            <div class="row">
                                <div class="modal-body">
                                    <div class="row justify-content-center">
                                        <div class=" col-md-6 form-group mt-3 ">
                                            <div class="input-group has-validation">
                                                <!-- Options pour les ventes -->
                                                <select name="vente" id="vente" class="form-control">
                                                    <option value="">Vente</option>
                                                    <?php
                                                    foreach ($all2 as $key2 => $val2) {
                                                        echo "<option value=$val2[id_vente]>$val2[date_vente]</option>";
                                                    };
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" col-md-6 form-group mt-3 ">
                                            <div class="input-group has-validation">
                                                <!-- Options pour les produits -->
                                                <select name="produit" id="produit" class="form-control">
                                                    <option value="">Produit</option>
                                                    <?php
                                                    foreach ($all1 as $key1 => $val1) {
                                                        echo "<option value=$val1[id_produit]>$val1[designation]</option>";
                                                    };
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" col-md-6 form-group mt-3 ">
                                            <div class="input-group has-validation">
                                                <input type="number" class="form-control" placeholder="Quantité" required id="quantite" name="quantite">
                                            </div>
                                        </div>
                                        <div class=" col-md-6 form-group mt-3 ">
                                            <div class="input-group has-validation">
                                                <input type="number" class="form-control" placeholder="Prix unitaire" required id="prixun" name="prixun">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <button name="saveDetailVente" class="btn btn-primary w-50 fw-bold" type="submit">Enregistrer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>

        </div>
    </div>


    <!-- MODAL MODIFICATION -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Details Vente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="row g-3" method="POST" action="../process/AddDetailVente.php">
                    <div class="modal-body modification">


                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="../plugins/popper.js/dist/umd/popper.min.js"></script>
    <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="../plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../dist/js/theme.min.js"></script>
    <script src="../js/datatables.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function() {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = 'https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X', 'auto');
        ga('send', 'pageview');
    </script>

    <!-- SCRIPT AJAX POUR CHARGER LE CORPS DU MODAL DE MODIFICATION -->
    <script type='text/javascript'>
        $(document).ready(function() {
            $('.elementinfo').click(function() {
                var codedetail = $(this).data('id');
                $.ajax({
                    url: '../process/Load/LdDetailVente.php',
                    type: 'POST',
                    data: {
                        codedetail: codedetail
                    },
                    success: function(response) {
                        $('.modification').html(response);
                        $('#exampleModalCenter1').modal('show');
                    }
                });
            });
        });
    </script>
</body>

</html>