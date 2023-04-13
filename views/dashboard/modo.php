<div class="container-fluid">
    <div class="row justify-content-center">

        <h5 class="text-center mt-4">Dashboard</h5>

        <div class="col-lg-9 mt-4"> 
            <h5 class="text-center">Modération</h5>



            <h5 class="text-center">Les Evénements</h5>

            <table class="table table-responsive mt-4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Date d'ajout</th>
                        <th>Ville</th>
                        <th>Pseudo</th>
                        <th>Outils</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($events as $event) {
                    ?>
                        <tr>
                            <td><?= htmlentities($event['id_event']) ?></td>
                            <td><?= htmlentities($event['title']) ?></td>
                            <td><?= htmlentities($event['description']) ?></td>
                            <td><?= htmlentities(date('d.m.Y', strtotime($event['created_at']))) ?></td>
                            <td><?= htmlentities($event['address'])?>, <?= htmlentities($event['dep_name'])?> , <?= htmlentities($event['region_name'])?></td>
                            <td><?= htmlentities($event['pseudo']) ?></td>
                            <td>
                                <a href="/controllers/dashboard/validate/validate_event.php?id_event=<?=$event['id_event']?>"><img src="/public/assets/img/check.png" alt=""  width="20"></a>
                                <a href="/controllers/dashboard/delete/deleteEventCtrl.php?id_event=<?=$event['id_event']?>"><img src="/public/assets/img/clear.png" alt="" width="20"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <h5 class="text-center">Les Chants</h5>
            
            <table class="table table-responsive mt-4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Liens</th>
                        <th>Date d'ajout</th>
                        <th>Pseudo</th>
                        <th>Outils</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($songs as $song) {
                ?>
                    <tr>
                        <td><?= $song['id_music']?></td>
                        <td><?= $song['title'] ?></td>
                        <td><?= $song['description'] ?></td>
                        <td><a href=""><?= $song['links']?></a></td>
                        <td><?= date('d.m.Y à H:i', strtotime($song['created_at'])) ?></td>
                        <td><?= $song['pseudo'] ?></td>
                        <td>
                            <a href="/controllers/dashboard/validate/validate_song.php?id_music=<?=$song['id_music']?>"><img src="/public/assets/img/check.png" alt=""  width="20"></a>
                            <a href="/controllers/dashboard/delete/deleteSongCtrl.php?id_music=<?=$song['id_music']?>"><img src="/public/assets/img/clear.png" alt="" width="20"></i></a>
                        </td>
                        
                    </tr>
                <?php } ?>
                </tbody>
            </table>

            <h5 class="text-center">Les Commentaires</h5>


            <table class="table table-responsive mt-4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Commentaire</th>
                        <th>Pseudo</th>
                        <th>Date d'ajout</th>
                        <th>Id_event</th>
                        <th>Outils</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($comments as $comment) {
                    ?>
                        <tr>
                            <td><?= htmlentities($comment['id_comment']) ?></td>
                            <td><?= htmlentities($comment['comment']) ?></td>
                            <td><?= htmlentities($comment['pseudo']) ?></td>
                            <td><?= htmlentities(date('d.m.Y à H:i:s', strtotime($comment['created_at']))) ?></td>
                            <td><?= htmlentities($comment['id_event']) ?></td>
                            <td>

                                <a href="/controllers/dashboard/validate/validate_comment.php?id_comment=<?=$comment['id_comment']?>"><img src="/public/assets/img/check.png" alt=""  width="20"></a>
                                <a href="/controllers/dashboard/delete/deleteCommentCtrl.php?id_comment=<?=$comment['id_comment']?>"><img src="/public/assets/img/clear.png" alt="" width="20"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
                        