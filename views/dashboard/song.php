<div class="container-fluid">
    <div class="row justify-content-center">

        <h5 class="text-center mt-4">Dashboard</h5>

        <div class="col-lg-9 mt-4"> 

            <h5 class="text-center">Liste des chant militaire</h5>
            
            <table class="table table-responsive mt-4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Description</th>
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
                        <td><?= htmlentities($song->id_music) ?></td>
                        <td><?= htmlentities($song->title) ?></td>
                        <td><?= htmlentities($song->description) ?></td>
                        <td><?= htmlentities(date('d.m.Y à H:i', strtotime($song->created_at))) ?></td>
                        <td><?= htmlentities($song->pseudo) ?></td>
                        <td>
                            <a href="/controllers/dashboard/modify/updateSongCtrl.php"><img src="/public/assets/img/edit.png" alt=""  width="20"></a>
                            <a href="/controllers/dashboard/modify/deleteSongCtrl.php"><img src="/public/assets/img/delete.png" alt="" width="20"></i></a>
                        </td>
                        
                    </tr>
                <?php } ?>
                </tbody>
            </table>    
        </div>
    </div>
</div>