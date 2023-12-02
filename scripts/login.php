<?php
require_once './mysqli.php';


if($_SERVER['REQUEST_METHOD'] = 'POST'){
    $correo = $_POST['correo'];
    $password = $_POST['password'];
}


 
$sql = 'SELECT * FROM usuarios where correo = ?';

try {
   $stm = $mysqli->prepare($sql);
   $stm->bind_param('s', $correo);
   $stm->execute();

   $rs = $stm->get_result();
   $data = $rs->fetch_assoc();
    if($data['password'] == $password){
        session_start();

        $_SESSION['userData'] = $data;
     
        header('location: ../profile.php');
    }else{
        header('location: ../login_form.php');
    }
  

} catch ( mysqli_sql_exception $e) {
   echo $e->getMessage();
}