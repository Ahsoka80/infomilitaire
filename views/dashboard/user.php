<div class="container-fluid">
    <div class="row justify-content-center">

        <h5 class="text-center mt-4">Dashboard</h5>

        <div class="col-lg-9 mt-4"> 

            <h5 class="text-center">Liste des utilisateurs</h5>
            
            <table class="table table-responsive mt-4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pseudo</th>
                        <th>email</th>
                        <th>role_admin</th>
                        <th>Outils</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($users as $user) {
                    ?>
                        <tr>
                            <td><?= htmlentities($user->id_users) ?></td>
                            <td><?= htmlentities($user->pseudo) ?></td>
                            <td><?= htmlentities($user->email) ?></td>
                            <td><?= htmlentities($user->id_role) ?></td>
                            <td>
                                <a href="/controllers/dashboard/modify/updateUserCtrl.php"><img src="/public/assets/img/edit.png" alt=""  width="20"></a>
                                <a href="/controllers/dashboard/delete/deleteUserCtrl.php?user_id=<?=$user->id_users?>"><img src="/public/assets/img/delete.png" alt="" width="20"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>    
        </div>
    </div>
</div>