<div class="sidebar-menu">
    <ul>
        <li><a href="<?= $_SESSION['user_type'] ?>">Accueil</a></li>

        <?php if ($_SESSION['user_type'] === 'admin') { ?>
            <li><a href="/formation">Formation</a></li>
            <li><a href="/promotion">Promotion</a></li>
            <li><a href="/user">User</a></li>
        <?php } ?>

        <?php if ($_SESSION['user_type'] === 'manager') { ?>
            <li><a href="">Classes</a></li>
            <li><a href="/formation">Formation</a></li>
            <li><a href="/promotion">Promotion</a></li>
        <?php } ?>

        <?php if ($_SESSION['user_type'] === 'student') { ?>
            <li><a href="/delay">Retards</a></li>
            <li><a href="/absence">Absences</a></li>
        <?php } ?>
    </ul>
</div>