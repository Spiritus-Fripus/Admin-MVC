<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    <!-- CSS LAYOUT -->

    <link rel="stylesheet" href="/css/layout-style.css">

    <!-- CSS TEMPLATES -->

    <?php /** PHPDOC : @var mixed $cssFile */ ?>
    <?php if (isset($cssFiles) && is_array($cssFiles)) : ?>
        <?php foreach ($cssFiles as $cssFile) : ?>
            <link rel="stylesheet" href="<?= htmlspecialchars($cssFile); ?>">
        <?php endforeach ?>
    <?php endif ?>

    <!-- Ubuntu font -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <!-- Icon -->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <!-- Burger-menu (hidden par defaut) -->

    <div class="burger-menu">
        <?php /** PHP DOC : @var string $config */
        if (!empty($config['burgerMenu'])) :
            require_once $config['burgerMenu'];
        else :
            echo "Erreur : le menu burger n'est pas défini.";
        endif
        ?>
    </div>

    <div class="grid-container">
        <!-- Header  -->
        <header class="header-container">
            <div class="burger">
                <span class="material-symbols-rounded">
                    menu
                </span>
            </div>
            <div class="logo">
                <a href=/<?= htmlspecialchars($_SESSION['user_type']) ?>>
                    <h1>ADMIN MNS</h1>
                </a>
            </div>
            <div class="header-icons">
                <?php /** PHP DOC : @var string $config */
                if (!empty($config['icons'])) :
                    require_once $config['icons'];
                else :
                    echo "Erreur : les icônes d'en-tête ne sont pas définies.";
                endif
                ?>
            </div>
        </header>

        <!-- Main -->
        <main class="main-container">
            <div class="main-body">
                <?php /** PHP DOC : @var string $template */
                if (!empty($template)) :
                    require_once $template;
                else :
                    echo "Erreur : le template principal n'est pas défini.";
                endif
                ?>
            </div>
        </main>
    </div>

    <?php /** PHP DOC : @var string $jsFiles */ ?>
    <?php if (isset($jsFiles) && is_array($jsFiles)) : ?>
        <?php foreach ($jsFiles as $jsFile) : ?>
            <script src="<?= htmlspecialchars($jsFile) ?>"></script>
        <?php endforeach ?>
    <?php endif ?>
    <script src="/js/burger-menu.js"></script>
</body>

</html>