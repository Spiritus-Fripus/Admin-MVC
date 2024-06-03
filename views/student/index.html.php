<div class="index-main-container">
    <h1>
        <?php if (isset($title)) { ?>
            <?= $title ?>
        <?php } ?>
    </h1>
    <h2>
        Debug $_SESSION:
        <hr>
        <?= "Mail= " . $_SESSION['user_mail'] . "<hr>" . "User_type= " . $_SESSION['user_type'] ?>
    </h2>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae at vero tempore non fuga ad quo temporibus reprehenderit corporis voluptatem, voluptate vel nobis, laboriosam qui a maxime voluptas, ipsa repellendus.
    </p>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae at vero tempore non fuga ad quo temporibus reprehenderit corporis voluptatem, voluptate vel nobis, laboriosam qui a maxime voluptas, ipsa repellendus.
    </p>
</div>