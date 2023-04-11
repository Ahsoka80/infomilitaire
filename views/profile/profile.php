<div class="container-fluid">
    <div class="row justify-content-start">

        <?php include(__DIR__ . '/../templates/navbarparameter.php'); ?>

        <div class="col-lg-4">

            <h3 class="text-center">Profil</h3>
            <p> Pseudo : <?= $user['pseudo']?></p>        <a href=""><i class="fa-regular fa-pen"></i></a>
            <hr>
            <p> E-mail : <?= $user['email']?></p>         <a href=""><i class="fa-regular fa-pen"></i></a>
            <hr>
            <p type="password"> Mot de passe :</p>        <a href=""><i class="fa-regular fa-pen"></i></a>
            <hr>
            <div class="text-center">
                <button type="button" class="btn btn-danger">Désactiver</button>
                <button type="button" class="btn btn-danger">Supprimer</button>
            </div>
            
        </div>
    </div>

</div>

