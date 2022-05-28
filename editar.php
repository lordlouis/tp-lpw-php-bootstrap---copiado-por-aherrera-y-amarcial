<!--Reutilizo el formulario del index.php-->
<?php include 'template/header.php' ?>

<!--SINO exite una variable que esta andando con get me mande un mensaje 'error'-->
<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }
    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];
//Aca selecciono de 'persona' el 'codigo'
    $sentencia = $bd->prepare("select * from persona where codigo = ?;");
    $sentencia-> execute([$codigo]);
//Guardo los datos que me lleguen
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
?>
<!--Container para el Form de editar los datos-->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar Datos:
                </div>
                <form class="p-4" method="POST" action="editar-proceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required
                         value="<?php echo $persona -> nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido: </label>
                        <input type="text" class="form-control" name="txtApellido" required
                        value="<?php echo $persona -> apellido; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad: </label>
                        <input type="number" class="form-control" name="txtEdad" required
                        value="<?php echo $persona -> edad; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona -> codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Modificar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'template/footer.php' ?>