<?php /* @var string $cssFile */ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="<?= $cssFile; ?>">
    <!-- Ubuntu font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Protest+Strike&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <title>Admin MNS</title>
</head>

<body>
    <div class="maincontainer">
        <div class="container">
            <div class="leftbox">
                <div class="box">
                    <div class="logo"></div>
                    <p class="welcome hidden">
                        Bienvenue sur <b>ADMIN MNS.</b>
                    </p>
                    <form action="" method="POST">
                        <label for="email">
                        </label>
                        <input type="text" placeholder="Votre adresse mail" name="email" class="input" autocomplete="Adresse e-mail">
                        <label for="password">
                        </label>
                        <input type="password" name="password" placeholder="******" class="input">
                        <label for="send"></label>
                        <button type="submit" value="ok" name="send" id="buttonformu">
                            <span>Connexion</span>
                        </button>
                        <a href="">Mot de passe oublié ?</a>
                    </form>
                    <div class="welcometext candidate hidden">
                        <p>
                            Vous souhaitez candidater à une de nos formations ?
                        </p>
                        <div class="lien">
                            <button class="button" role="button">
                                <a href="?controller=candidate&action=viewcandidate">Par ici</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightbox">
                <div class="centerbox">
                    <p class="welcome">
                        Bienvenue sur <b>ADMIN MNS.</b>
                    </p>
                    <p class="welcometext connect">
                        Connectez vous à votre espace.
                    </p>
                    <div class="welcometext candidate">
                        <p>
                            Vous souhaitez candidater à une de nos formations ?
                        </p>
                        <div class="lien">
                            <button class="button" role="button">
                                <a href="">Par ici</a>
                            </button>
                        </div>
                    </div>

                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>