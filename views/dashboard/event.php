<div class="container-fluid">
    <div class="row justify-content-center">

        <h5 class="text-center mt-4">Dashboard</h5>

        <div class="col-lg-9 mt-4"> 
            <h5 class="text-center">Liste des évenements</h5>

            <table class="table table-responsive mt-4">
                <thead>
                    <tr>
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
                    foreach ($patients as $patient) {
                    ?>
                        <tr>
                            <td><?= htmlentities($patient->lastname) ?></td>
                            <td><?= htmlentities($patient->firstname) ?></td>
                            <td><?= htmlentities(date('d.m.Y', strtotime($patient->birthdate))) ?></td>
                            <td><?= htmlentities($patient->phone) ?></td>
                            <td><a href="mailto:<?= htmlentities($patient->mail) ?>"><?= htmlentities($patient->mail) ?></a></td>
                            <td>

                                <a href="/controllers/dashboard/modify/updateEventCtrl.php"><img src="/public/assets/img/edit.png" alt=""  width="20"></a>
                                <a href="/controllers/dashboard/delete/deleteEventCtrl.php"><img src="/public/assets/img/delete.png" alt="" width="20"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
                        