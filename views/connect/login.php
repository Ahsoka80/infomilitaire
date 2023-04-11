    <div class="container-fluid h-100"><!--CONTAINER START-->
        <div class="row h-100 align-items-center"><!--ROW START-->
            <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-10 offset-1"><!--COL START-->
                <div class="card cardLog" id=""><!--CARD START-->
                    <div class="card-body text-light">
                        <h5 class="card-title text-center">Connexion</h5>
                        <!--=======================FORM START===========================-->
                            <form method="POST" name='login'>
                                <div>
                                    <label for="emailOrPseudo">Email ou Pseudo * :</label>
                                    <input type="text" class="form-control" id="emailOrPseudo" name="emailOrPseudo" required>
                                    <small>E-mail ou pseudo oubliée ?</small>
                                    <small><?= $error['emailOrPseudo'] ?? '' ?></small>
                                </div>
                                <div>
                                    <label for="password">Mot de Passe * :</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <small>Mot de passe oubliée ?</small>
                                    <small><?= $error['password'] ?? '' ?></small>
                                </div>
                                <div class="form-check mt-2 mb-2">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">Se souvenir de moi</label>
                                </div>
                                <div class="text-center">
                                    <small>Vous n'avez pas de compte? <a href="../../controllers/connect/signUpCtrl.php">Créez en-un !</a></small>
                                </div>
                                <div class="text-end mt-4 text-center">
                                    <button type="submit" style="background-color: #FF0000;" class="btn btn-danger" >Se connecter</button>
                                </div>
                            </form>
                        <!--=======================FORM END===========================-->
                    </div>
                </div><!--CARD START-->
            </div><!--COL START-->  
        </div><!--ROW START-->
    </div><!--CONTAINER START-->
</main><!--MAIN START-->