<?php
$user = $_GET['user'];
$pass = $_GET['pass'];

// $mysqli = new mysqli("localhost", "root", "", "test");
// if ($mysqli->connect_errno) {
//     echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
// }

// /* Sentencia no preparada */
// $resultado = $mysqli->query("SELECT * FROM USERS where user='" . $user . "' and pass='" . $pass . "'");

// buscar user y pass
function searchuser($user, $pass)
{
   $mysqli = new mysqli("localhost", "root", "", "test");
    if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    /* Sentencia no preparada */
    $resultado = $mysqli->query("SELECT * FROM USERS where user='" . $user . "' and pass='" . $pass . "'");
    if ($resultado->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

if(searchuser($user, $pass)){
    echo "user y pass correctos";
    session_start();
    $_SESSION['user']=$user;
   header("Location: select_test.php");
}else{
    header("Location: loginform.php");
}