<div class="container-fluid">
    <div class="d-flex justify-content-between">
        <div class="top-menu d-flex align-items-center">
            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
            <div class="header-search">
                <div class="input-group">
                    <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                    <input type="text" class="form-control">
                    <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                </div>
            </div>
            <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
        </div>
        <div class="top-menu d-flex align-items-center">
            <div class="dropdown mr-4">
                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i fa
                        class="fa fa-user-circle fa-2x text-secondary"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item text-success hover-0 "><i class=" fa fa-user-circle fa-xxl"></i><b>
                            <?= $_SESSION["postnom"] . " " . $_SESSION["prenom"] ?></b>
                    </a>
                    <a class="dropdown-item" disabled href=""><i class="ik ik-user dropdown-icon"></i>
                        Profile</a>
                    <a class="dropdown-item" href="../process/logout.php"><i class="ik ik-power dropdown-icon"></i>Se
                        Deconnecter</a>
                </div>

            </div>

        </div>

    </div>
</div>