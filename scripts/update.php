<?php
require_once './mysqli.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])) {
    $user_id = $_SESSION['userData']['id'];

    $correo = $_POST['correo'];

    $base_url = '../upload/';

    $tmp = $_FILES['foto']['tmp_name'];

    $imgName = $_FILES['foto']['name'];

    $ext = pathinfo($imgName, PATHINFO_EXTENSION);

    $url = $base_url . "profile_$user_id." . $ext;

    move_uploaded_file($tmp, $url);

    $query = 'UPDATE  usuarios set `foto` = ?, correo = ? WHERE id = ?';
    $sql = 'SELECT * FROM usuarios WHERE id = ?';

    try {
        $stm = $mysqli->prepare($query);
        $stm->bind_param('ssi', $url, $correo, $user_id);
        $stm->execute();


        $stm1 = $mysqli->prepare($sql);
        $stm1->bind_param('i', $user_id);
        $stm1->execute();

        $rs = $stm1->get_result();
        $data = $rs->fetch_assoc();

        $_SESSION['userData'] = $data;

        header('location: ../profile.php');
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
}
