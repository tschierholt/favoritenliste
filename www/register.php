<?php
session_start();

include_once 'utils/favoriten.php';

if ($_POST['register']) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $fav = new Favoriten();
    $fav->register($name, $email, $pass);

    header('Location: login.php');
    
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Favoriten Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="favstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="login-container">
        <h1 style="text-align: center; font-size: 2.6em;">Registrieren</h1>
        <form action="register.php" method="post" class="login-form">
            <label class="form-label" for="name">Name</label>
            <input class="form-field" id="name" type="text" name="name" placeholder="Vorname Nachname">
            <label class="form-label" for="email">E-Mail</label>
            <input class="form-field" id="email" type="email" name="email" placeholder="ihre@email.de" autocomplete="username">
            <label class="form-label" for="password">Passwort</label>
            <input class="form-field" id="password" type="password" name="password" placeholder="Passwort" autocomplete="current-password">
            <input class="form-button" type="submit" name="register" value="Registrieren">
        </form>
    </div>
</body>

</html>