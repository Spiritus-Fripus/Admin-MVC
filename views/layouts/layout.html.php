<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    <!-- CSS -->
    <link rel="stylesheet" href="/css/layout-style.css">
    <!-- Ubuntu font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body>
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
                <span class="material-symbols-rounded">
                    shield_person
                </span>
                <span class="material-symbols-rounded">
                    notifications
                </span>
                <span class="material-symbols-rounded">
                    <a href="?controller=login&action=logout">
                        logout
                    </a>
                </span>
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
                <?php require $sidebarTemplate ?>
            </div>
            <div class="querie-button">
                <span class="material-symbols-rounded">
                    shield_person
                </span>
                <span class="material-symbols-rounded">
                    notifications
                </span>
                <span class="material-symbols-rounded">
                    <a href="?controller=login&action=logout">
                        logout
                    </a>
                </span>
            </div>
        </aside>

        <!-- Main -->
        <main class="main-container">
            <?php require $template; ?>
        </main>

    </div>
</body>

</html>