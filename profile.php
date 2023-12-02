<?php
session_start();

if (isset($_SESSION['userData'])) {
    $user = $_SESSION['userData'];
} else {

    header('location: ./login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>WELCOME <?= $user['correo'] ?></h1><br><br>

    
    <?php if ($user['foto'] != '') : ?>
        <img src="<?= $user['foto'] ?>" alt="profile" width="200" height="200"><br><br>
    <?php endif; ?>

    <a href="./edit_profile.php">EDIT PROFILE</a><br><br>

    <a href="./scripts/logout.php">LOGOUT</a>
</body>

</html>