<?php
   //Aqui realizo una validación mediante la via POST
   //SI es que algún campo esta VACIO que se detenga y nos muestre un mensaje de 'error'
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) 
    || empty($_POST["txtApellido"]) || empty($_POST["txtEdad"])){
        header('Location: index.php?mensaje=error');
        exit();
    }
    
    include_once 'model/conexion.php';
    
//Guardo con variables los post 
    $nombre = $_POST ["txtNombre"];
    $apellido = $_POST ["txtApellido"];
    $edad = $_POST ["txtEdad"];

//Prepara la consulta para inserta dentro de la tabla persona(nombre,apellido,edad) el codigo no le pongo por que es autoincremental
    $sentencia = $bd ->prepare ("INSERT INTO persona (nombre,apellido,edad) VALUES (?,?,?);");
    $resultado = $sentencia->execute ([$nombre,$apellido,$edad]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    

?>
