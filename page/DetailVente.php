<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Details | Vente</title>
        <?php
    include '../include/head.php';
    require('../database/db_connection.php');
    require('../process/class/ClsDetailVente.php');
    require('../process/class/ClsVente.php');
    require('../process/class/ClsProduit.php');

    $data = new ClsDetailVente();
    $data2 = new ClsVente();
    $data1 = new ClsProduit();

    $all = $data->afficher();
    $all1 = $data1->afficher();
    $all2 = $data2->afficher();

    ?>

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
            location.replace('DetailVente.php');
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
                                        <h4><b>Details Ventes</b></h4>
                                    </div>
                                    <div class=" float-right px-4">
                                        <!-- Button trigger modal -->
                                        <a class="text-primary" data-toggle="modal" data-target="#exampleModalCenter"><i
                                                class="fa solid fa-plus-circle fa-xl"> </i> <span><b>Faire Une
                                                    Vente</b>
                                            </span></a>
                                    </div>
                                </div>



                            </div>
                            <div class="card-body">
                                <div class="container table-responsive">
                                    <table id="order-table" class="table table-striped  nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Client</th>
                                                <th>Date</th>
                                                <th>Produit</th>
                                                <th>Quantite</th>
                                                <th>Prix unitaire</th>
                                                <th>Prix total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $numero = 1;
                                        foreach ($all as $key => $val) {
                                            $id = $val['id_detailVente'];
                                        ?>
                                            <tr>

                                                <th scope="row"><b><?= $numero ?></b></th>
                                                <td><b><?= $val['client'] ?></b></td>
                                                <td><b><?= $val['datevente'] ?></b></td>
                                                <td><b><?= $val['produit'] ?></b></td>
                                                <td><b><?= $val['quantite'] ?></b></td>
                                                <td><b><?= $val['prixu'] ?></b></td>
                                                <td><b><?= $val['prix_total'] ?></b></td>
                                                <td><span data-id='<?= $val['id_detailVente'] ?>'
                                                        class="badge elementinfo "><i
                                                            class="fa fa-edit fa-xl text-success " data-toggle="tooltip"
                                                            data-placement="top"
                                                            title="Modifier cet élément"></i></span>
                                                    <span data-id='<?= $val['id_detailVente'] ?>'
                                                        class="badge elementinfo "><i
                                                            class="fa fa-trash-can text-danger fa-xl "
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Supprimer cet élément"></i></span>
                                                    <a href="../rapports/facture.php?id=<?php echo $id ?>"
                                                        data-toggle="tooltip" data-placement="top" title="Imprimer"
                                                        class="badge"><i class="fa fa-print text-dark fa-xl"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                            $numero++;
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Client</th>
                                                <th>Date</th>
                                                <th>Produit</th>
                                                <th>Quantite</th>
                                                <th>Prix unitaire</th>
                                                <th>Prix total</th>
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
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                    <input type="number" class="form-control" placeholder="Quantité"
                                                        required id="quantite" name="quantite">
                                                </div>
                                            </div>
                                            <div class=" col-md-6 form-group mt-3 ">
                                                <div class="input-group has-validation">
                                                    <input type="number" class="form-control"
                                                        placeholder="Prix unitaire" required id="prixun" name="prixun">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 text-center">
                                            <button name="saveDetailVente" class="btn btn-primary w-50 fw-bold"
                                                type="submit">Enregistrer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>

            </div>
        </div>
        </div>

        <!-- MODAL MODIFICATION -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

        </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>
        window.jQuery || document.write('<script src="../src/js/vendor/jquery-3.3.1.min.js"><\/script>')
        </script>
        <script src="../plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="../plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="../plugins/screenfull/dist/screenfull.js"></script>
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
        <!-- SCRIPT D'AJOUT DANS LA TABLE -->
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
                        $(' .modification').html(response);
                        $('#exampleModalCenter1').modal('show');
                    }

                })

            });

        });
        </script>
    </body>

</html>