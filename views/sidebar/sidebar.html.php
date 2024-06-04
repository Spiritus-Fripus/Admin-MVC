<div class="sidebar-menu">
    <ul>
        <li><a href='?controller=<?= $_SESSION['user_type'] ?>&action=index'>Accueil</a></li>
        <li><a href='?controller=<?= $_SESSION['user_type'] ?>&action=profil'>Profil</a></li>
        <?php if ($_SESSION['user_type'] === 'admin') { ?>
            <li><a href="?controller=formation&action=viewFormation">Formation</a></li>
            <li><a href="?controller=student&action=viewStudent">Eleves</a></li>
        <?php } ?>
        <li><a href="?controller=login&action=logout">Logout</a></li>
    </ul>
</div>