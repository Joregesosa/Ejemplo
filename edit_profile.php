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
    <title>Register</title>
</head>
<style>
    .cuadro {
        width: 120px;
        height: 120px;
        border-radius: 8px;
        background-size: contain;
        display: flex;
        align-items: center;
        justify-content: center;
        /* position: relative; */
    }
    .labe_tex{
        font-size: 18px;
        cursor: pointer;
    }
    .labe_tex:hover{
        text-decoration: underline;
    }

    .input_foto_container {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    #foto {
        display: none;
    }

    /* 
    .cuadro img{
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;

        
    } */
</style>

<body>

    <h1>Iniciar Session</h1>


    <form action="./scripts/update.php" method="POST" enctype="multipart/form-data">
        <div class="input_foto_container">
            <label for="foto">
                <div class="cuadro" style="background-image: url(<?php if($user['foto'] != '') echo $user['foto']?>);">

                    <img src="./assets/camera.svg" alt="" width="40px">
                </div>
            </label>

            <input type="file" name="foto" id="foto">
            <label for="foto" class="labe_tex">Select Fotografia</label>
        </div>
        <label for="foto">correo</label><br>
        <input type="email" name="correo" id="correo" value="<?= $user['correo'] ?>">

        <button type="submit">Enviar</button>
    </form>

</body>

</html>