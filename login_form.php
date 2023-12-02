<?php
session_start();

if (isset($_SESSION['userData'])) {

    header('location: ./profile.php');

}  

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <h1>Iniciar Session</h1>
    <form action="./scripts/login.php" method="POST">
        <label for="correo">CORREO</label><br>
        <input type="email" name="correo" id="correo"><br><br>
        <label for="password">CONTRASEÑA</label><br>
        <input type="password" name="password" id="password"><br><br>
        <button type="submit">Login</button>
    </form>

</body>

</html>