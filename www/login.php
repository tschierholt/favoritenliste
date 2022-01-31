<?php 
session_start();
$_SESSION['loggedin'] = false;

include_once 'utils/favoriten.php';

if($_POST['login']){
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $fav = new Favoriten();
    $user = $fav->login($email, $pass);

    if(isset($user) && isset($user['id'])){
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
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div>
            <form>
                
            </form>
        </div>
    </body>
</html>