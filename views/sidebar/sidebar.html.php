<div class="sidebar-menu">
    <ul>
        <li><a href='?controller=<?= $_SESSION['user_type'] ?>&action=index'>Accueil</a></li>
        <li><a href='?controller=<?= $_SESSION['user_type'] ?>&action=profil'>Profil</a></li>
        <?php if ($_SESSION['user_type'] === 'admin') { ?>
            <li><a href="?controller=formation&action=viewFormation">Formation</a></li>
            <li><a href="?controller=Promotion&action=viewPromotion">Promotion</a></li>
        <?php } ?>
        <?php if ($_SESSION['user_type'] === 'teacher') { ?>
            <li><a href="?controller=formation&action=viewFormation">Formation</a></li>
            <li><a href="?controller=student&action=viewClasses">Classes</a></li>
        <?php } ?>
        <?php if ($_SESSION['user_type'] === 'student') { ?>
            <li><a href="?controller=delay&action=viewDelay">Retards</a></li>
            <li><a href="?controller=absence&action=viewOwnAbsence">Absences</a></li>
        <?php } ?>
        <li><a href="?controller=login&action=logout">Déconnexion</a></li>
    </ul>
</div>