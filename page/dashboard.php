<!DOCTYPE html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Produit</title>
        <?php
    include '../include/head.php';
    require('../database/db_connection.php');
    ?>
    </head>

    <body>
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
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Client</h6>
                                                <?php 
                                                    $con = new db_connection();
                                                    $connect = $con->openconnection();
                                                    $sql = "SELECT * FROM tclient";
                                                    $stmt = $connect->query($sql);
                                                    $rowcount = $stmt->rowCount();
                                                    echo "<h2>$rowcount</h2>"
                                                ?>
                                                <!-- <h2>1,410</h2> -->
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-users"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Nombre total de clients</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="100"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Total entrés</h6>
                                                <?php 
                                                    $con = new db_connection();
                                                    $connect = $con->openconnection();
                                                    $sql = "SELECT SUM(quantite * prixu) as SOMME FROM mouvementstock WHERE type_operation='ENTREE'";
                                                    $stmt= $connect->query($sql);
                                                    $rowcount = $stmt->fetch(PDO::FETCH_ASSOC);
                                                    $somme = $rowcount['SOMME'];
                                                    echo "<h2>$somme $</h2>";
                                                ?>
                                                
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-arrow-down-left"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Montant total des entrés</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="state">
                                                <h6>Total sortie</h6>
                                                <?php 
                                                    $con = new db_connection();
                                                    $connect = $con->openconnection();
                                                    $sql = "SELECT SUM(quantite * prixu) as SOMME FROM mouvementstock WHERE type_operation='SORTIE'";
                                                    $stmt= $connect->query($sql);
                                                    $rowcount = $stmt->fetch(PDO::FETCH_ASSOC);
                                                    $somme = $rowcount['SOMME'];
                                                    echo "<h2>$somme $</h2>";
                                                ?>                                                
                                            </div>
                                            <div class="icon">
                                                <i class="ik ik-arrow-up-right"></i>
                                            </div>
                                        </div>
                                        <small class="text-small mt-10 d-block">Total sortie</small>
                                    </div>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                

            </div>
            <?php
                include('../include/footer.php');
            ?>

        </div>
        <script type='text/javascript'>
        $(document).ready(function() {
            $('.elementinfo').click(function() {
                var codeproduit = $(this).data('id');

                $.ajax({
                    url: '../process/Load/LdProduit.php',
                    type: 'POST',
                    data: {
                        codeproduit: codeproduit
                    },
                    success: function(response) {
                        $('.modification').html(response);
                        $('#exampleModalCenter1').modal('show');
                    }
                })
            });
        });
        </script>
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
        </div>
    </body>

</html>