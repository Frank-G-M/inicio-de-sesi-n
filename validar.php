<?php
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['correo']=$correo;

include('db.php');

$consulta="SELECT*FROM registro WHERE correo='$correo'and contraseña='$contraseña'";
$resultado=mysqli_query($conex, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:home.php");
}else{
    ?>
    <?php
    include("index.php");
    ?>
    <h1>Error en la autentificacion</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conex);

?>