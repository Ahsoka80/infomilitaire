<div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-6 text-center mt-4">
            <h3 class="text-center">Chant Militaire</h3>
            <div class="row justify-content-center">
                <div class="col-lg-6 mt-2">

                <?php if( isset($_SESSION['user']) && $_SESSION['user'] !== null ) : ?>
                    <button type="button" class="btn text-light" style="background-color: #ff0000;" data-bs-toggle="modal" data-bs-target="#formAddEvent">Ajouter un chant</button>
                <?php else : ?>
                    <a href="/controllers/connect/loginCtrl.php"><button type="button" class="btn text-light" style="background-color: #ff0000;">Ajouter un chant</button></a>
                <?php endif; ?>
                
                    <!-- Modal -->
                    <div class="modal fade" id="formAddEvent" tabindex="-1" aria-labelledby="modalEvent" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form action="" method="POST">
                                        <div>
                                            <label for="title">Titre du chant :</label>
                                            <input type="text" class="form-control" id="title" name="title" pattern="<?= REGEXP_TITLE ?>" required>
                                            <small><?= $errors['title']  ?? '' ?></small>
                                        </div>
                                        <div class="mt-1">
                                            <label for="description">Description :</label>
                                            <input class="form-control" id="description" name="description" required>
                                            <small><?= $errors['description']  ?? '' ?></small>
                                        </div>
                                        <div class="mt-1">
                                            <label for="links">Liens :</label>
                                            <input type="text" class="form-control" id="links" name="links" pattern="<?= REGEXP_LINKS ?>" required>
                                            <small><?= $errors['links']  ?? '' ?></small>
                                        </div>
                                        <div class="mt-1">
                                            <button type="submit" class="btn text-light" style="background-color: #FF0000;">Valider</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                </div>      
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <?php foreach ($songs as $song) { ?>
        <div class="col-sm-6 col-md-6 col-lg-5">
            <div class="card cardSong mt-3 mb-3">
                <div class="card-body text-light">
                    <h5 class="card-title"><?= htmlentities($song->title) ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= htmlentities($song->description) ?></h6>
                    <p class="card-text"><a href="<?= htmlentities($song->links) ?>"><?= htmlentities($song->links) ?></a></p>
                    <p class="card-text">Ajoutée par <?= htmlentities($song->pseudo) ?></p>
                </div>
            </div>   
        </div>
        <?php } ?>
    </div> 
</div>