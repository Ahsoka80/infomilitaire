<div class="container-fluid">
    <div class="row justify-content-center">

        <h5 class="text-center mt-4">Dashboard</h5>

        <div class="col-lg-9 mt-4">

            <h5 class="text-center">Liste des utilisateurs</h5>
                <table class="table table-responsive mt-4">
                    <thead>
                        <tr>
                            <th>Pseudo</th>
                            <th>email</th>
                            <th>Outils</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($users as $user) {
                        ?>
                            <tr>
                                <td><?= htmlentities($user->pseudo) ?></td>
                                <td><?= htmlentities($user->email) ?></td>
                                <td>
                                    <a href=""><img src="/public/assets/img/edit.png" alt=""  width="20"></a>
                                    <a href=""><img src="/public/assets/img/delete.png" alt="" width="20"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>



            <h5 class="text-center">Liste des chants</h5>
                <table class="table table-responsive mt-4">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <!-- <th>Liens</th> -->
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
                                <td><?= htmlentities($song->title) ?></td>
                                <td><?= htmlentities($song->description) ?></td>
                                <!-- <td><?= htmlentities($song->mail) ?></td> -->
                                <td><?= htmlentities(date('d.m.Y à H:i', strtotime($song->created_at))) ?></td>
                                <td><?= htmlentities($song->pseudo) ?></td>
                                <td>
                                    <a href=""><img src="/public/assets/img/edit.png" alt=""  width="20"></a>
                                    <a href=""><img src="/public/assets/img/delete.png" alt="" width="20"></i></a>
                                </td>
                                
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>




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
                                        
                                        <a href=""><img src="/public/assets/img/edit.png" alt=""  width="20"></a>
                                        <a href=""><img src="/public/assets/img/delete.png" alt="" width="20"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            
        </div>
    </div>

</div>