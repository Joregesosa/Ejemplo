<?php
require_once './mysqli.php';


if($_SERVER['REQUEST_METHOD'] = 'POST'){
    $correo = $_POST['correo'];
    $password = $_POST['password'];
}


$query = 'INSERT INTO usuarios (`correo`, `password`) VALUES(?, ?)';
$sql = 'SELECT * FROM usuarios where correo = ?';

try {
   $stm = $mysqli->prepare($query);
   $stm->bind_param('ss', $correo, $password);
   $stm->execute();
    
   

   $stm1 = $mysqli->prepare($sql);
   $stm1->bind_param('s', $correo);
   $stm1->execute();

   $rs = $stm1->get_result();
   $data = $rs->fetch_assoc();

   session_start();

   $_SESSION['userData'] = $data;

   header('location: ../profile.php');

} catch ( mysqli_sql_exception $e) {
   echo $e->getMessage();
}