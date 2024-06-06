<div class="sidebar-menu">
    <ul>
        <li><a href='?controller=<?= $_SESSION['user_type'] ?>&action=index'>Accueil</a></li>
        
        <?php if ($_SESSION['user_type'] === 'admin') { ?>
            <li><a href="?controller=formation&action=viewFormation">Formation</a></li>
            <li><a href="?controller=Promotion&action=viewPromotion">Promotion</a></li>
            <li><a href="?controller=user&action=viewuser">Créer user</a></li>
        <?php } ?>

        <?php if ($_SESSION['user_type'] === 'teacher') { ?>
            <li><a href="?controller=student&action=viewClasses">Classes</a></li>
        <?php } ?>

        <?php if ($_SESSION['user_type'] === 'student') { ?>
            <li><a href="?controller=delay&action=viewDelay">Retards</a></li>
            <li><a href="?controller=absence&action=viewOwnAbsence">Absences</a></li>
        <?php } ?>
    </ul>
</div>