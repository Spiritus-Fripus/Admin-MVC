<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    <!-- CSS LAYOUT -->
    <link rel="stylesheet" href="/css/layout-style.css">
    <!-- CSS TEMPLATES -->
    <?php if (isset($cssFile)) { ?>
        <link rel="stylesheet" href="<?= $cssFile; ?>">
    <?php } ?>
    <!-- Ubuntu font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body>
    <!-- Burger-menu (hidden par défaut) -->
    <div class="burger-menu">
        <?php if (isset($sidebarTemplate)) { ?>
            <?php require $sidebarTemplate ?>
        <?php } ?>
    </div>

    <div class="grid-container">
        <!-- Header  -->
        <header class="header">
            <div class="header-l">
                <form action="" class="form-search">
                    <input id="search-bar" type="search" placeholder="Recherche">
                    <button type="button">
                        <span class="material-symbols-rounded">
                            search
                        </span>
                    </button>
                </form>
            </div>
            <div class="header-r">
                <?php require $icons ?>
            </div>
        </header>

        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="logo">
                <h1>ADMIN MNS</h1>
            </div>
            <div class="burger">
                <span class="material-symbols-rounded">
                    menu
                </span>
            </div>
            <div class="menu">
                <?php if (isset($sidebarTemplate)) { ?>
                    <?php require $sidebarTemplate ?>
                <?php } ?>
            </div>
            <div class="querie-button">
                <?php require $icons ?>
            </div>
        </aside>

        <!-- Main -->
        <main class="main-container">
            <div class="main-body">
                <?php if (isset($template)) { ?>
                    <?php require $template; ?>
                <?php } ?>
            </div>
        </main>

    </div>
    <script src="/js/burger-menu.js"></script>
</body>

</html>