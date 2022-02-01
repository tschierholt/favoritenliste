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
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="favstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1><?php echo $_SESSION['name'] ?></h1>
        <h3>Mein Listen</h3>
        
    </body>
</html>