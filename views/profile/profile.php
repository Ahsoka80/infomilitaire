<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-lg-4 mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Profil</h5>

                <p class="card-text"> Pseudo : <?= $user['pseudo']?> </p>

                <p class="card-text"> E-mail : <?= $user['email']?> </p>

                <p class="card-text">  Mot de passe : ******************** </p>
            </div>
            <div class="text-center mb-5">
                <button type="button" class="btn btn-danger">Supprimer</button>
            </div>
        </div>
            
        </div>
    </div>

</div>

