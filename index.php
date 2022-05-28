<!--La sentencia "include_once" incluye y evalúa el fichero especificado durante la ejecución del script//-->
<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
//Aca realizo la consulta 
    $sentencia = $bd -> query ("select * from persona");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<!--mt-5 significa el margen que le doy a la clase container-->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

<!--COMIENZO DE LAS ALERTAS -->
            <!--Inicio del Aviso de Error a la hora de completar los datos-->
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='error'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>OOPS!</strong> Te olvidaste del completar algún campo.
            </div>
            <?php
                }
            ?> 
            <!--Fin del Aviso de Error a la hora de completar datos-->

            <!--Comienzo del Aviso de Exito a la hora de hacer un registro-->
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Bien!</strong> Se registro Correctamente!.
            </div>
            <?php
                }
            ?>
            <!--Fin del Aviso de Exito a la hora de hacer un registro-->

            <!--Inicio del Aviso de Error a la hora de querer redireccionar directamente a modificar datos-->
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Error!</strong> Intentá de nuevo!.
            </div>
            <?php
                }
            ?>
            <!--Fin del Aviso de Error a la hora de querer redireccionar directamente a modificar datos-->

            <!--Inicio del Aviso de Modificacion de Datos-->
            <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='modificado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Modificado!</strong> Con exito!
            </div>
            <?php
                }
            ?>
             <!--Fin del Aviso de Modificacion de Datos-->

             <!--Inicio del Aviso de Borrado correctamente-->
             <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] =='eliminado'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Borrado!</strong> Se eliminó correctamente!
            </div>
            <?php
                }
             ?>
             <!--Fin del Aviso de Borrado correctamente-->
<!--FIN DE LAS ALERTAS-->

            <div class="card-header">
                Datos de la persona ingresada al sistema
            </div>
            <!--La clase p-4 hace referencia al padding(espacios internos)-->
            <div class="p-4">
                <table class="table aling-middle">
                    <thead>
                        <tr> <!--Utilizo el scope col para que el alcanze sea de la columna y evitar desbordes -->
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Edad</th>
                            <th scope="col" colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!--Configuración del Formulario A-->
                        <?php
                            foreach($persona as $dato){
                        ?>
                         <tr>
                            <td scope="row"><?php echo $dato->codigo; ?></td>
                            <td><?php echo $dato->nombre; ?></td>
                            <td><?php echo $dato->apellido; ?></td>
                            <td><?php echo $dato->edad; ?></td>
                            <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pen"></i></a></td>
                            <td><a onclick="confirm('Esta seguro de eliminar a este usuario?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash3"></a></i></td>
                        </tr>
                        <?php
                            }
                        ?>

                    </tbody>
                </table>
                
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar Datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido: </label>
                        <input type="text" class="form-control" name="txtApellido" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Edad: </label>
                        <input type="number" class="form-control" name="txtEdad" required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include 'template/footer.php' ?>


