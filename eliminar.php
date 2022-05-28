<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

//Hago una petición al server para eliminar de la tabla "persona" la columna "codigo"//
    $sentencia = $bd->prepare("DELETE FROM persona where codigo = ?;");
    $resultado = $sentencia->execute([$codigo]);

//SI el resultado es verdadero mi imprime "eliminado" SINO imprime "error"//
    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>