<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
</head>
<body>
    <form method="post">
        <h1>registro</h1>
        <label for="">Usuario</label>
        <input type="text" name="usuario" required><br><br>
        <label for="">Correo</label>
        <input type="email"  name="correo" required><br><br>
        <label for="">Contraseña</label>
        <input type="password" name="contraseña" required><br><br>
        <input type="submit" name="submit">
    </form>


    <?php
    #Conexion a bases de datos ("puerto", "root", "password", "nombre de base de datos")
    $conex = mysqli_connect("localhost:3305", "root", "", "proyect_inicio");

    #Validar la longitud de la contraseña no sea mayor a 8
    function validarLongitudContraseña($contraseña){
        if (strlen($contraseña)>0  && strlen($contraseña)<=8){
            return true;
        }else{
            return false;
        }
    }



    #Enviar datos a la bases de datos
    if (isset($_POST['submit'])){
        $contraseña = trim($_POST['contraseña']);
        if (validarLongitudContraseña($contraseña) && strlen($_POST['usuario']) >= 1 && strlen ($_POST['correo']) >=1){           
            $usuario = trim($_POST['usuario']);
            $correo = trim($_POST['correo']);
            #Envia datos a la base de datos
            $datos = "INSERT INTO registro(Nom_Usuario, Correo, Contraseña) VALUES ('$usuario','$correo','$contraseña')";
            $resultado = mysqli_query($conex,$datos);
            if($resultado){
                echo'enviado';
            }else{
                echo'No enviado';
            }
    }else{
        echo'La contraseña debe contener al menos 8 caracteres';
    }
}

    ?>
</body>
</html>