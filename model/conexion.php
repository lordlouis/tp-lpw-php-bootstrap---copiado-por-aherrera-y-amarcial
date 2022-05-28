<?php 
$contrasena = "";
$usuario = "root";
$nombre_bd = "final";
 /*PDO es una clase y creo una instancia que la llamo bd, luego la llamo en el index,
 para hacer la consulta */
try {
    /*$conn=mysqli_connect("localhost", "root", "","final-tp-isiv");
    if(!$conn)
    die("Error");
    */

	$bd = new PDO (
		'mysql:host=localhost;
		dbname='.$nombre_bd,
		$usuario,
		$contrasena,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);

} catch (Exception $e) {
	echo "Problema con la conexion: ".$e->getMessage();
}
?>