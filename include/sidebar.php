<!-- <style>
.nav-item a {


    text-decoration: none;
    /* Remove default underline */
    color: #3CA788;
    /* Default text color */
    border: 1px solid transparent;
    /* Default border */
    border-radius: 5px;
    /* Default border radius */
}

.nav-item a:hover {
    background-color: #00684A;
    /* Change background color on hover */
    border-color: #00684A;
    /* Change border color on hover */
    color: white;
    /* Change text color to white on hover */
    border-radius: 5px;
    /* Change border radius on hover */
}
</style> -->
<?php
if ($_SESSION['SERVICE'] == "Admin") {
?>
<div class="app-sidebar">
    <div class="sidebar-header" style="background-color: #00684A;">
        <a class="header-brand" href="../page/dashboard.php">
            <span class="text text-white">Stock Manager</span>
        </a>
    </div>

    <div class="sidebar-content mt-2">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main fw-bold">

                <div class="nav-item">
                    <a id="myLink" href="../page/dashboard.php"><i class="fa fa-dashboard fa-2x "></i><span><b>Tableau
                                de
                                Bord</b></span></a>
                </div>
                <div class="nav-item">
                    <a id="myLink" href="../page/Produit.php"><i class="fa-solid fa-boxes-stacked fa-1x "
                            style="color: #3CA788;"></i><span>Produits</span></a>
                </div>
                <div class=" nav-item">
                    <a id="myLink" href="../page/Categorie.php"><i
                            class="fa-solid fa-list fa-1x"></i><span>Catégories</span></a>
                </div>
                <div class="nav-item">
                    <a id="myLink" href="../page/Mouvement.php"><i class="fa-solid fa-boxes-packing fa-1x"
                            style="color: #3CA788;"></i><span>Mouvement
                            Stock</span></a>
                </div>

                <div class="nav-item">
                    <a id="myLink" href="../page/Approvisionnement.php"><i
                            class="fa-solid fa-cart-shopping fa-1x"></i><span>Approvisionnements</span></a>
                </div>
                <div class="nav-item">
                    <a id="myLink" href="../page/Fournisseur.php"><i class="fa fa-hand-holding-hand fa-1x"
                            style="color: #3CA788;"></i><span>Fournisseurs</span></a>
                </div>
                <div class="nav-item">
                    <a id="myLink" href="../page/Client.php"><i
                            class="fa fa-people-group fa-1x"></i><span>Clients</span></a>
                </div>
                <div class="nav-item">
                    <a id="myLink" href="../page/Vente.php"><i class="fa fa-exchange fa-1x"
                            style="color: #3CA788;"></i><span>Ventes</span></a>
                </div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="fa fa-table-cells-large "></i><span>Rapports</span></a>
                    <div class="submenu-content">
                        <a href="../page/DetailVente.php" class="menu-item">Facture</a>
                        <a href="../page/rapportVente.php" class="menu-item">Vente</a>
                    </div>
                </div>
                <div class="nav-item">
                    <a id="myLink" href="../page/Services.php"><i class="fa fa-tools fa-1x"
                            style="color: #3CA788;"></i><span>Services</span></a>
                </div>
                <div class="nav-item mb-5">
                    <a id="myLink" href="../page/Utilisateur.php"><i
                            class="fa fa-user-circle fa-1x"></i><span>Utilisateurs</span></a>
                </div>
            </nav>
        </div>
    </div>
</div>
<?php
} else if ($_SESSION['SERVICE'] == 'User') {
?>
<div class="app-sidebar">
    <div class="sidebar-header" style="background-color: #00684A;">
        <a class="header-brand" href="../page/dashboard.php">
            <span class="text text-white">Stock Manager</span>
        </a>
    </div>

    <div class="sidebar-content mt-2">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main fw-bold" style="color: black;">
                <div class="nav-item">
                    <a id="myLink" href="../page/dashboard.php"><i class="fa fa-dashboard fa-2x "></i><span><b>Tableau
                                de
                                Bord</b></span></a>
                </div>
                <div class="nav-item">
                    <a id="myLink" href="../page/Produit.php"><i class="fa-solid fa-boxes-stacked fa-1x "
                            style="color: #3CA788;"></i><span>Produits</span></a>
                </div>
                <div class=" nav-item">
                    <a id="myLink" href="../page/Categorie.php"><i
                            class="fa-solid fa-list fa-1x"></i><span>Catégories</span></a>
                </div>
                <div class="nav-item">
                    <a id="myLink" href="../page/Approvisionnement.php"><i class="fa-solid fa-cart-shopping fa-1x"
                            style="color: #3CA788;"></i><span>Approvisionnements</span></a>
                </div>
                <div class="nav-item">
                    <a id="myLink" href="../page/Fournisseur.php"><i
                            class="fa fa-hand-holding-hand fa-1x"></i><span>Fournisseurs</span></a>
                </div>
            </nav>
        </div>
    </div>
</div>
<?php
} else if ($_SESSION['SERVICE'] == 'Simple User') {
?>
<div class="app-sidebar">
    <div class="sidebar-header" style="background-color: #00684A;">
        <a class="header-brand" href="../page/dashboard.php">
            <span class="text text-white">Stock Manager</span>
        </a>
    </div>

    <div class="sidebar-content mt-2">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main fw-bold">

                <div class="nav-item">
                    <a id="myLink" href="../page/dashboard.php"><i class="fa fa-dashboard fa-2x "></i><span><b>Tableau
                                de
                                Bord</b></span></a>
                </div>
                <div class="nav-item">
                    <a id="myLink" href="../page/Mouvement.php"><i class="fa-solid fa-boxes-packing fa-1x"
                            style="color: #3CA788;"></i><span>Mouvement
                            Stock</span></a>
                </div>
                <div class="nav-item">
                    <a id="myLink" href="../page/Client.php"><i
                            class="fa fa-people-group fa-1x"></i><span>Clients</span></a>
                </div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="fa fa-table-cells-large "></i><span>Rapports</span></a>
                    <div class="submenu-content">
                        <a href="../page/DetailVente.php" class="menu-item">Facture</a>
                        <a href="../page/rapportVente.php" class="menu-item">Vente</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<?php
}
?>
<!-- <script>
// Attend que le DOM soit entièrement chargé
document.addEventListener('DOMContentLoaded', function() {
    // Sélection de l'élément lien
    var myLink = document.getElementById('myLink');

    // Ajout de l'événement mouseover
    myLink.addEventListener('mouseover', function() {
        myLink.style.color = 'white'; // Changement de couleur lors du survol
    });

    // Ajout de l'événement mouseout
    myLink.addEventListener('mouseout', function() {
        myLink.style.color = 'black'; // Retour à la couleur initiale lorsque la souris quitte le lien
    });
});
</script> -->