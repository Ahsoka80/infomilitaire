<div class="container">
    <div class="row">
        
        <div class="col-lg-12">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text"></p>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        
        <div class="col text-center">

        <?php if( isset($_SESSION['user']) && $_SESSION['user'] !== null ) : ?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formAddEvent">Ajouter un évenement</button>
        <?php else : ?>
            <a href="/controllers/connect/loginCtrl.php"><button type="button" class="btn btn-primary" >Ajouter un évenement</button></a>
        <?php endif; ?>

            <!-- Modal -->
            <div class="modal fade" id="formAddEvent" tabindex="-1" aria-labelledby="modalEvent" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form action="" method="POST">
                                <div>
                                    <label for="title">Titre de l'événement :</label>
                                    <input type="text" class="form-control" id="title" name="title" pattern="<?= REGEXP_TITLE ?>" required>
                                    <small><?= $errors['title']  ?? '' ?></small>
                                </div>
                                <div class="mt-1">
                                    <label for="address">Lieu :</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                    <small><?= $errors['address']  ?? '' ?></small>
                                </div>
                                <div class="mt-1">
                                    <label for="date">Date :</label>
                                    <input type="date" class="form-control" id="date" name="date" pattern="<?= REGEXP_DATE ?>" required>
                                    <small><?= $errors['date']  ?? '' ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="hour">Heure :</label>
                                    <input type="time" class="form-control"  id="hour" name="hour" pattern="<?= REGEXP_HOUR ?>" required/>
                                    <small><?= $errors['hour']  ?? '' ?></small>
                                </div>
                                <div class="mt-1">
                                    <label for="description">Description :</label>
                                    <textarea class="form-control" id="description" name="description" required></textarea>
                                    <small><?= $errors['description']  ?? '' ?></small>
                                </div>
                                <div class="mt-1">
                                    <button type="submit" class="btn text-light" style="background-color: #FF0000;">Valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>