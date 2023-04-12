<div class="container-fluid">
    <div class="row justify-content-center">

        <h5 class="text-center mt-4">Dashboard</h5>

        <div class="col-lg-9 mt-4"> 
            <h5 class="text-center">Liste des commentaires</h5>

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
                            <td><?= htmlentities($comment->id_comment) ?></td>
                            <td><?= htmlentities($comment->comment) ?></td>
                            <td><?= htmlentities($comment->pseudo) ?></td>
                            <td><?= htmlentities(date('d.m.Y à H:i:s', strtotime($comment->created_at))) ?></td>
                            <td><?= htmlentities($comment->id_event) ?></td>
                            <td>

                                <a href="/controllers/dashboard/modify/updateCommentCtrl.php"><img src="/public/assets/img/edit.png" alt=""  width="20"></a>
                                <a href="/controllers/dashboard/delete/deleteCommentCtrl.php?id_comment=<?=$comment->id_comment?>"><img src="/public/assets/img/delete.png" alt="" width="20"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>