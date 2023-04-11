<div class="col-lg-4">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="/controllers/profile/profileCtrl.php">Profil</a>
        </li>
        <?php if ($user['id_role'] == 1){ ?>
        <li class="nav-item">
            <a class="nav-link" href="/controllers/dashboard/adminCtrl.php">Dashboard</a>
        </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link" href="">Notification</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/controllers/connect/logoutCtrl.php">Déconnexion</a>
        </li>
    </ul>
</div>