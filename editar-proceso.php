<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include_once 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtApellido'];
    $edad = $_POST['txtEdad'];

//Realizo una petición al server para que "actualize" la tabla persona 
    $sentencia = $bd -> prepare("UPDATE persona SET nombre = ?, apellido = ?, edad= ? WHERE codigo = ?;");
    $resultado = $sentencia-> execute([$nombre, $apellido, $edad, $codigo]);

//SI el resultado es verdadero se imprime "modificado" SINO se imprime "error"//
    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=modificado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    

?>