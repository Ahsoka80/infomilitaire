<main><!--MAIN START-->
    <div class="container-fluid h-100"><!--CONTAINER START-->        
        <div class="row h-100 align-items-center"><!--ROW START-->
            <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-10 offset-1"><!--COL START-->
                <!-- errorMessage?> -->
                <div class="card cardLog"><!--CARD START-->
                    <div class="card-body text-light">
                        <h5 class="card-title text-center">Inscription</h5>
                        <p><?= $message ?? ''?></p>
                        <!--=======================FORM START===========================-->
                            <form method="POST" id="signUpForm">
                                <div>
                                    <label for="pseudo">Pseudo * :</label>
                                    <input type="text" class="form-control" id="pseudo" name="pseudo" required>
                                </div>
                                <div class="mt-1">
                                    <label for="email">Adresse e-mail * :</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mt-1">
                                    <label for="emailVerif">Confirmation Adresse e-mail * :</label>
                                    <input type="email" class="form-control" id="emailVerif" name="emailVerif" required>
                                </div>
                                <div class="mt-1">
                                    <label for="password">Mot de Passe* :</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mt-1">
                                    <label for="passwordVerif">Confirmation Mot de Passe * :</label>
                                    <input type="password" class="form-control" id="passwordVerif" name="passwordVerif" required>
                                </div>
                                <div class="check mt-2 mb-2">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked"> 
                                        <small>J'accepte&nbsp<a href="">les conditions d’utilisation et politique</a></small>
                                    </label>
                                </div>
                                <div class="col text-center mt-4">
                                    <button type="submit" style="background-color: #FF0000;" class="btn text-light">Envoyer</button>
                                </div>
                            </form>
                        <!--=======================FORM END===========================-->
                    </div>                
                </div><!--CARD END-->
            </div><!--COL END-->
        </div><!--ROW END-->
    </div><!--CONTAINER END--> 
</main><!--MAIN END-->