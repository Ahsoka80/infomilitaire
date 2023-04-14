<nav class="navbar navbar-dark navbar-expand-lg"><!--NAVBAR START-->
    <div class="container-fluid"><!--CONTAINER START-->
        <a class="navbar-brand" href="../../controllers/homeCtrl.php">
            <h5>Info Militaire</h5>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto col-lg-8 justify-content-center"><!--UL START-->
                <li class="nav-item">
                    <a class="nav-link text-light text-center" aria-current="page" href="../../controllers/homeCtrl.php">Accueil</a>
                </li>
                <li class="nav-item dropdown text-light text-center">
                    <a class="nav-link dropdown-toggle text-light" role="button" data-bs-toggle="dropdown" aria-expanded="false">L'armée Française</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/controllers/corpsArmy/armyCtrl.php">Armée de Terre</a></li>
                        <li><a class="dropdown-item" href="/controllers/corpsArmy/airForceCtrl.php">Armée de l'air et de l'Espace</a></li>
                        <li><a class="dropdown-item" href="/controllers/corpsArmy/navyCtrl.php">Marine Nationale</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light text-center" href="/controllers/songCtrl.php">Chant Militaire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light text-center" href="/controllers/eventCtrl.php">Evènements Nationaux</a>
                </li>
            </ul><!--UL END-->

            <?php if( isset($_SESSION['user']) && $_SESSION['user'] !== null ) : ?>
                <div class="text-center">
                <div class="btn-group dropstart">
                    <button type="button" class="btn dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="imgProfile" src="/public/assets/img/istockphoto-1223671392-170667a.jpg" alt="" width="30">
                        <?= $user['pseudo'] ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/controllers/profile/profileCtrl.php">Profil</a></li>
                        <?php if ($user['id_role'] == 1){ ?>
                            <li><a class="dropdown-item" href="/controllers/dashboard/adminCtrl.php">Dashboard</a></li>
                        <?php } ?>
                        <li><a class="dropdown-item" href="">Notification</a></li>
                        <li><a class="dropdown-item" href="/controllers/connect/logoutCtrl.php">Déconnexion</a></li>
                    </ul>
                </div>  
                </div>
                <?php else : ?>

                <div class="text-center">
                    <a href="../../controllers/connect/loginCtrl.php"><button type="button" style="background-color: #ff0000;" class="btn btn-sm text-light">Connexion</button></a>
                </div>

            <?php endif; ?>

        </div>
    </div><!--CONTAINER END-->
</nav><!--NAVBAR END-->