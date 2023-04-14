<div class="container">
    <div class="row justify-content-center">
    <div class="col-lg-6 text-center mt-4">
        <h3 class="mb-5">Evènements nationaux</h3>

        <?php if( isset($_SESSION['user']) && $_SESSION['user'] !== null ) : ?>
            <button type="button" class="btn text-light" style="background-color: #ff0000;" data-bs-toggle="modal" data-bs-target="#formAddEvent">Ajouter un évenement</button>
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
                                    <label for="address">Région :</label>
                                    <select class="form-control" id="region" name="region" required onchange="ajax_dep();">
                                        <option selected disabled value="">Sélectionnez une région</option>
                                        <?php
                                            $pdo = Database::getInstance();

                                            $query = $pdo->prepare("SELECT * FROM regions");
                                            $query->execute();
                                            $query = $query->fetchall(PDO::FETCH_ASSOC);
                                            foreach( $query as $region )
                                            {
                                                echo "<option value=\"{$region["id_region"]}\">{$region["name"]}</option>";
                                            }
                                        ?>
                                    </select>
                                    <small><?= $errors['address']  ?? '' ?></small>
                                </div>
                                <div class="mt-1" id="div_dep">
                                </div>
                                <div class="mt-1" id="div_address">
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
        <?php foreach ($events as $event){
        ?>
        <div class="col-lg-8 mt-5 mb-5">
            <div class="card cardEvent">
                <div class="card-body">
                    <h5 class="card-title text-light"><?= $event['title'] ?></h5>
                    <p class="card-text text-light"><?= $event['address']?> , <?= $event['dep_name'] ?>  , <?= $event['region_name'] ?> le <?= date('d/m/Y à H:i', strtotime($event['dateHour'])) ?></p>
                    <p class="card-text text-light"><?= $event['description'] ?></p>
                    <div class="text-center">
                        <img src="/public/assets/img/Capture d’écran 2023-04-14 114107.png" alt="">
                    </div>
                    <p class="card-text text-light">Proposée par <?= $event['pseudo'] ?></p>
                    
                    <button name="toggle_btn"><img  src="/public/assets/img/bulle-de-discussion.png" alt="" width="30"></button>
                    <div class='text' id="text">
                        <form method="POST">
                            <input type="hidden" id="id_event" name="id_event" value="<?=$event["id_event"]?>">
                            <div>
                                
                            </div>
                            <div class="mt-3 col-lg-8">
                                <input type="text" class="form-control" id="comment" name="comment" placeholder="Ecrivez un commentaire" pattern="<?= REGEXP_COMMENT ?>" required>
                                
                                <small><?= $error['comment']  ?? '' ?></small>
                                <div class='col-lg-3'>
                                    <input class="btn btn-primary" type="submit" value="Envoyer">
                                </div>
                                
                            </div>
                        </form>
                        <hr>
                        <?php
                            foreach ($comments as $comment){ 
                                if( $comment["id_event"] == $event["id_event"] )
                                {
                        ?>
                        <div>
                            <p class="card-text text-light"><?= $comment['pseudo'] ?></p>
                            <p class="card-text text-light"><?= $comment['comment'] ?></p>
                            <hr class="text-light">
                        </div> 
                        <?php 
                                }    
                            } 
                        ?>
                    </div> 
                </div>
            </div>
        </div>
        <?php } ?>
        
    </div>
</div>