<div class="container-fluid">
    <div class="row justify-content-center">

        <h5 class="text-center mt-4">Dashboard</h5>

        <div class="col-lg-9 mt-4"> 
            <h5 class="text-center">Liste des évenements</h5>

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
                                <a href="/controllers/dashboard/modify/updateEventCtrl.php"><img src="/public/assets/img/edit.png" alt=""  width="20"></a>
                                <a href="/controllers/dashboard/delete/deleteEventCtrl.php?id_event=<?=$event['id_event']?>"><img src="/public/assets/img/delete.png" alt="" width="20"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
                        