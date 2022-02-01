<?php
session_start();
$_SESSION['loggedin'] = false;

include_once 'utils/favoriten.php';

if ($_POST['login']) {
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $fav = new Favoriten();
    $user = $fav->login($email, $pass);

    if (isset($user) && isset($user['id'])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['benutzerid'] = $user['id'];
        header('Location: index.php');
    }
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
        <h1 style="text-align: center; font-size: 2.6em;">Login</h1>
        <form action="login.php" method="post" class="login-form">
            <label class="form-label" for="email">E-Mail</label>
            <input class="form-field" id="email" type="email" name="email" placeholder="ihre@email.de">
            <label class="form-label" for="password">Passwort</label>
            <input class="form-field" id="password" type="password" name="password">
            <input class="form-button" type="submit" name="login" value="Login">
        </form>
        <p>Oder hier <a href="register.php" style="color: cornflowerblue;">registrieren</a></p>
    </div>
</body>

</html>