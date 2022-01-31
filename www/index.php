<?php
session_start();
if(!$_SESSION['loggedin']){
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Favoriten</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <h1>Moin</h1>
    </body>
</html>