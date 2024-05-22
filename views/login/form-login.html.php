<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/login-style.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h1><?= $title ?></h1>
        </div>
        <div class="formulaire">
            <form action="" method="POST">
                <label for="email"></label>
                <input type="email" placeholder="ex : a@a.com" name="email" class="input">
                </br>
                <label for="password"></label>
                <input type="password" name="password" placeholder="******" class="input">
                </br>
                <label for="send"></label>
                <button type="submit" value="ok" name="send" id="buttonformu">Se connecter</button>
                <div class="bodyfooter">
                    <a href="">Mot de passe oublié ?</a>
                </div>
            </form>
        </div>

    </div>
    <footer></footer>
</body>

</html>