<!DOCTYPE html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Client</title>
        <?php
    include '../include/head.php';
    require('../database/db_connection.php');
    require('../process/class/ClsClient.php');

    $data = new ClsClient();
    $all = $data->afficher();

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
            location.replace('Client.php');
        });
        </script>
        <?php } ?>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
        <div class="wrapper">
            <header class="header-top" header-theme="light">
                <?php include('../include/header.php'); ?>
            </header>
            <div class="page-wrap">
                <?php include('../include/sidebar.php'); ?>
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header row">
                                <div class="col col-sm-12">
                                    <div class="card-options d-inline-block">
                                        <h4><b>Liste de Clients</b></h4>
                                    </div>
                                    <div class=" float-right px-4">
                                        <!-- Button trigger modal -->
                                        <a class="text-primary" href="" data-toggle="modal"
                                            data-target="#exampleModalCenter"><i
                                                class="fa solid fa-plus-circle fa-xl"></i> <span><b>Ajouter
                                                    Client</b></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container table-responsive">
                                    <table id="order-table" class="table table-striped  nowrap">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nom</th>
                                                <th>Téléphone</th>
                                                <th>Adresse</th>
                                                <th>Mail</th>
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
                                                <td><b><?= $val['noms'] ?></b></td>
                                                <td><b><?= $val['telephone'] ?></b></td>
                                                <td><b><?= $val['adresse'] ?></b></td>
                                                <td><b><?= $val['mail'] ?></b></td>
                                                <td>
                                                    <span data-id='<?= $val['id_client'] ?>'
                                                        class="badge elementinfo "><i
                                                            class="fa fa-edit fa-xl text-success" data-toggle="tooltip"
                                                            data-placement="top"
                                                            title="Modifier cet élément"></i></span>
                                                    <span data-id='<?= $val['id_client'] ?>'
                                                        class="badge elementinfo "><i
                                                            class="fa fa-trash-can fa-xl text-danger"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="Supprimer cet élément"></i></span>
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
                                                <th>Nom</th>
                                                <th>Téléphone</th>
                                                <th>Adresse</th>
                                                <th>Mail</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include('../include/footer.php'); ?>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Ajouté un client</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" method="POST" action="../process/AddClient.php">
                            <div class="container">
                                <div class="row">
                                    <div class="modal-body">
                                        <div class="row justify-content-center">
                                            <div class=" col-md-6 form-group mt-3 ">
                                                <div class="input-group has-validation">
                                                    <input type="text" name="noms" class="form-control" id="noms"
                                                        placeholder="Noms" required>
                                                </div>
                                            </div>
                                            <div class=" col-md-6 form-group mt-3 ">
                                                <div class="input-group has-validation">
                                                    <input type="text" name="telephone" class="form-control"
                                                        id="telephone" placeholder="Téléphone" required>
                                                </div>
                                            </div>
                                            <div class=" col-md-6 form-group mt-3 ">
                                                <div class="input-group has-validation">
                                                    <input type="text" name="adresse" class="form-control" id="adresse"
                                                        placeholder="Adresse" required>
                                                </div>
                                            </div>
                                            <div class=" col-md-6 form-group mt-3 ">
                                                <div class="input-group has-validation">
                                                    <input type="text" name="mail" class="form-control" id="mail"
                                                        placeholder="Adresse mail" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <button name="save" class="btn btn-primary w-50 fw-bold"
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
        <script>
        $(document).ready(function() {
            $('.elementinfo').click(function() {
                var codeclient = $(this).data('id');
                $.ajax({
                    url: '../process/Load/LdClient.php',
                    type: 'POST',
                    data: {
                        codeclient: codeclient
                    },
                    success: function(response) {
                        $('.modification').html(response);
                        $('#exampleModalCenter1').modal('show');
                    }
                });
            });
        });
        </script>

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
            b[l] || (b[l] = function() {
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
    </body>

</html>