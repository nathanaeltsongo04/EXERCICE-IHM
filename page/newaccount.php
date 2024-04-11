<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Nouveau Compte</title>
    <?php
    include('../include/head.php');
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
                location.replace('newaccount.php');
            });
        </script>
    <?php } else if (isset($_GET['msg']) && $_GET['msg'] == 'false') { ?>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: '<?php echo $_GET['info'] ?>',
                showConfirmButton: false,
                timer: 2800
            }).then(function() {
                location.replace('newaccount.php');
            });
        </script>
    <?php } ?>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div class="auth-wrapper">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">

                <div class="container  ">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-6 col-md-6 my-auto p-0">
                            <div class="authentication-form mx-auto">
                                <div class="text-center text-primary mb-4">
                                    <h4><b style="color:#00684A;">Créer Votre Compte</b></h4>
                                </div>
                                <form action="../process/compte.php" method="POST">
                                    <div class="form-group mt-2">
                                        <input name="matricule" type="text" class="form-control" placeholder="Matricule" required="">
                                        <i class="fa fa-id-badge " style="color:#00684A;"></i>
                                    </div>
                                    <div class="form-group mt-2">
                                        <input name="nomdutilisateur" type="text" class="form-control" placeholder="Nom d'Utilisateur" required="">
                                        <i class="fa fa-user-circle" style="color:#00684A;"></i>

                                    </div>
                                    <div class="form-group mt-2">
                                        <input name="password" type="password" class="form-control" placeholder="Mot de passe" required="">
                                        <i class="fa fa-lock" style="color:#00684A;"></i>
                                    </div>
                                    <div class="form-group mt-2 ">
                                        <input name="confirmpassword" type="password" class="form-control" placeholder="Confirmer Mot de passe" required="">
                                        <i class="fa fa-check " style="color:#00684A;"></i>
                                    </div>
                                    <div class="form-group mt-2 text-center">
                                        <button style="background-color:#00684A;" type="submit" name="save" class="btn text-white "><b>Créer</b></button>
                                    </div>
                                    <div class="form-group mt-2 text-center">
                                        <p class="fw-bold">J'ai un Compte? <a href="../page/authentification.php" class=""><b style="color:#00684A;">Se Connecter</b></a></p>
                                    </div>

                                </form>

                            </div>
                        </div>
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
    <script src="../dist/js/theme.js"></script>
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